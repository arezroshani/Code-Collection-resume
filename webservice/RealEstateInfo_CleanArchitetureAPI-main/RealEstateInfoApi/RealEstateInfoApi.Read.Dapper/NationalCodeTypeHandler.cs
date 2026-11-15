using Dapper;
using RealEstateInfoApi.Domain.ValueObjects.person; 
using System.Data;

namespace RealEstateInfoApi.Read.Dapper.Handlers;

public class NationalCodeTypeHandler : SqlMapper.TypeHandler<NationalCode>
{
    // این متد به Dapper یاد می‌دهد که چطور آبجکت NationalCode را بخواند و از string بسازد
    public override NationalCode Parse(object value)
    {
        if (value == null || value is DBNull)
            return null;

        var stringValue = value.ToString();

        
        var result = NationalCode.Create(stringValue);
        if (result.IsSuccess)
        {
            return result.Value;
        }

        throw new DataException($"Cannot parse NationalCode from value: '{stringValue}'");
    }

    public override void SetValue(IDbDataParameter parameter, NationalCode value)
    {
        parameter.Value = value?.Value;
        parameter.DbType = DbType.String;
    }
}
