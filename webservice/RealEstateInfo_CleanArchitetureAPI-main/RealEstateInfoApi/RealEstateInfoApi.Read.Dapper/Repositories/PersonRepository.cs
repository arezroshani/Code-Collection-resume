using Dapper;
using RealEstateInfoApi.Application.Query.Contracts.Data;
using RealEstateInfoApi.Application.Query.Contracts.Repositories;
using RealEstateInfoApi.Domain.Entities.Persons;
using RealEstateInfoApi.Domain.Entities.properties;
using RealEstateInfoApi.Domain.ValueObjects.person;
using  RealEstateInfoApi.Read.Dapper.Handlers;

// مطمئن شوید نیم‌اسپیس هندلرهای شما اینجا ایمپورت شده باشد، به عنوان مثال:
// using RealEstateInfoApi.Read.Dapper.Handlers; 
using static Dapper.SqlMapper;

namespace RealEstateInfoApi.Read.Dapper.Repositories;

public class PersonRepository : IPersonRepository
{
    private readonly ISqlConnectionFactory _sqlConnectionFactory;

    // ۱. ایجاد سازنده استاتیک برای ثبت Type Handlerها
    static PersonRepository()
    {
        SqlMapper.AddTypeHandler(new NationalCodeTypeHandler());
        SqlMapper.AddTypeHandler(new AddressTypeHandler());
    }

    // سازنده معمولی کلاس
    public PersonRepository(ISqlConnectionFactory sqlConnectionFactory)
    {
        _sqlConnectionFactory = sqlConnectionFactory;
    }

    public async Task<Person?> GetByNationalCodeAsync(NationalCode nationalCode, CancellationToken cancellationToken)
    {
        const string sql = @"
            SELECT * FROM DimPerson WHERE NationalCode2 = @NationalCodeValue;

            SELECT prop.*
            FROM DimProperty AS prop
            INNER JOIN FactResident AS res ON prop.PropertyId = res.PropertyId
            INNER JOIN DimPerson AS p ON res.ResidentPersonId = p.PersonId
            WHERE p.NationalCode2 = @NationalCodeValue;";

        using (var connection = _sqlConnectionFactory.CreateConnection())
        {
            using (var multi = await connection.QueryMultipleAsync(sql, new { NationalCodeValue = nationalCode.Value }))
            {
                var person = await multi.ReadFirstOrDefaultAsync<Person>();

                if (person != null)
                {
                    var properties = (await multi.ReadAsync<Property>()).ToList();
                    person.AddProperties(properties);
                }

                return person;
            }
        }
    }
}
