using System.Data;
using System.Reflection;
using Dapper;
using RealEstateInfoApi.Domain.ValueObjects.Properties;

namespace RealEstateInfoApi.Read.Dapper.Handlers;

public class AddressTypeHandler : SqlMapper.TypeHandler<Address>
{
    // متد ذخیره در دیتابیس (اصلاح شده)
    public override void SetValue(IDbDataParameter parameter, Address value)
    {
        parameter.Value = value != null ? (object)value.ToString() : DBNull.Value;
    }

    // متد خواندن از دیتابیس
    public override Address Parse(object value)
    {
        if (value == null || value is DBNull)
            return null;

        var addressStr = value.ToString();

        var parts = addressStr.Split(new[] { ',' }, StringSplitOptions.RemoveEmptyEntries);

        string city = string.Empty;
        string street = string.Empty;
        string postalCode = string.Empty;

        if (parts.Length >= 3)
        {
            city = parts[0].Trim();
            street = parts[1].Trim();
            postalCode = parts[2].Trim();
        }
        else if (parts.Length == 2)
        {
            street = parts[0].Trim();
            city = parts[1].Trim();
        }
        else if (parts.Length == 1)
        {
            street = parts[0].Trim();
        }

        var constructor = typeof(Address).GetConstructor(
            BindingFlags.Instance | BindingFlags.NonPublic,
            null,
            new[] { typeof(string), typeof(string), typeof(string) },
            null);

        if (constructor == null)
        {
            throw new InvalidOperationException("سازنده خصوصی کلاس Address یافت نشد.");
        }

        return (Address)constructor.Invoke(new object[] { city, street, postalCode });
    }
}
