using PersonsBasicInfoApi.Domain.Common;
using PersonsBasicInfoApi.Domain.Exceptions;

namespace PersonsBasicInfoApi.Domain.ValueObjects.person;

public sealed class NationalCode : ValueObject
{
    

    public string Value { get; } = string.Empty;

    private NationalCode() { }

    private NationalCode(string value)
    {
        Value = value;
    }

    public static Result<NationalCode> Create(string nationalCode)
    {
        if (string.IsNullOrWhiteSpace(nationalCode))
            return Result<NationalCode>.Failure(Errors.NationalCode.IsRequired);

        nationalCode = nationalCode.Trim();

        if (nationalCode.Length != 10)
            return Result<NationalCode>.Failure(Errors.NationalCode.InvalidLength);

        if (!IsValid(nationalCode))
            return Result<NationalCode>.Failure(Errors.NationalCode.InvalidChecksum);

        return Result<NationalCode>.Success(new NationalCode(nationalCode));
    }

    private static bool IsValid(string nationalCode)
    {
        if (!nationalCode.All(char.IsDigit)) return false;
        if (new string(nationalCode[0], 10) == nationalCode) return false;

        var parts = nationalCode.Select(c => int.Parse(c.ToString())).ToArray();
        var lastDigit = parts[9];
        var sum = 0;

        for (int i = 0; i < 9; i++)
        {
            sum += parts[i] * (10 - i);
        }

        var remainder = sum % 11;
        if (remainder < 2) return lastDigit == remainder;

        return lastDigit == (11 - remainder);
    }

    

    public override IEnumerable<object> GetEqualityComponents()
    {
        yield return Value;
    }

    public override string ToString() => Value;
}
