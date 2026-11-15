using Dapper;
using PersonsBasicInfoApi.Application.Query.Contracts.Data;
using PersonsBasicInfoApi.Application.Query.Contracts.Repositories;
using PersonsBasicInfoApi.Domain.Entities.Persons;
using PersonsBasicInfoApi.Domain.ValueObjects.person;
using PersonsBasicInfoApi.Read.Dapper.Handlers;
using static Dapper.SqlMapper;

namespace PersonsBasicInfoApi.Read.Dapper.Repositories;

public class PersonRepository : IPersonRepository
{
    private readonly ISqlConnectionFactory _sqlConnectionFactory;

    static PersonRepository()
    {  
        SqlMapper.AddTypeHandler(new NationalCodeTypeHandler());
    }

    public PersonRepository(ISqlConnectionFactory sqlConnectionFactory)
    {
        _sqlConnectionFactory = sqlConnectionFactory;
    }

    
    public async Task<Person?> GetFullDetailsByNationalCodeAsync(NationalCode nationalCode, CancellationToken cancellationToken)
    {
        const string sql = @"SELECT * FROM DimPerson WHERE NationalCode = @NationalCodeValue;";

        using (var connection = _sqlConnectionFactory.CreateConnection())
        {
            return await connection.QueryFirstOrDefaultAsync<Person>(sql, new { NationalCodeValue = nationalCode.Value });
        }
    }


    public async Task<string?> GetStatusByNationalCodeAsync(NationalCode nationalCode, CancellationToken cancellationToken)
    {
        

        const string sql = @"SELECT IsDead FROM DimPerson WHERE NationalCode = @NationalCodeValue;";

        using (var connection = _sqlConnectionFactory.CreateConnection())
        {
            

            var isDead = await connection.QueryFirstOrDefaultAsync<bool?>(sql, new { NationalCodeValue = nationalCode.Value });

           

            if (isDead == null) return "نامشخص";
            return isDead.Value ? "فوت شده" : "زنده";
        }
    }

}
