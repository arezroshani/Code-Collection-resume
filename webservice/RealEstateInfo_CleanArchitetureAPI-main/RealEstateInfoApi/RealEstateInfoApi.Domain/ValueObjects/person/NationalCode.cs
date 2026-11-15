using RealEstateInfoApi.Domain.Common;
using RealEstateInfoApi.Domain.Exceptions;

namespace RealEstateInfoApi.Domain.ValueObjects.person;

public class NationalCode : ValueObject
{
    public string Value { get; private set; }

    private NationalCode() { }

    private NationalCode(string value)
    {
        Value = value;
    }

    public static Result<NationalCode> Create(string value)

    {
        var trimmedValue = value?.Trim(); // حذف فاصله‌های اضافی
        if (string.IsNullOrWhiteSpace(value))
        {
            return Result<NationalCode>.Failure(Errors.NationalCode.IsRequired);
        }

        if (value.Length != 10)
        {
            return Result<NationalCode>.Failure(Errors.NationalCode.InvalidFormat);
        }
        if (trimmedValue.Length != 10)
        {
            return Result<NationalCode>.Failure(Errors.NationalCode.InvalidFormat);
        }

        return Result<NationalCode>.Success(new NationalCode(value));
    }

    public override IEnumerable<object> GetEqualityComponents()
    {
        yield return Value;
    }
}
