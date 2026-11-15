using Dapper;
using PersonsBasicInfoApi.Domain.ValueObjects.person;
using System.Data;

namespace PersonsBasicInfoApi.Read.Dapper.Handlers;

public class NationalCodeTypeHandler : SqlMapper.TypeHandler<NationalCode>
{
    public override NationalCode Parse(object value)
    {
        if (value is null || value is DBNull)
            throw new DataException("NationalCode cannot be null.");

        var stringValue = value.ToString();

        if (string.IsNullOrWhiteSpace(stringValue))
            throw new DataException("NationalCode cannot be empty.");

        var result = NationalCode.Create(stringValue);
        if (result.IsSuccess)
            return result.Value;

        throw new DataException($"Cannot parse NationalCode from value: '{stringValue}'");
    }

    public override void SetValue(IDbDataParameter parameter, NationalCode value)
    {
        parameter.Value = value.Value;
        parameter.DbType = DbType.String;
    }
}
