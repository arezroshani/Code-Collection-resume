using NationalEntityRegistry.Domain.Common;


namespace NationalEntityRegistryApi.Domain.ValueObjects.Companies;

public class DateRange : ValueObject
{
    public DateTime StartDate { get; private set; }
    public DateTime? EndDate { get; private set; }
    // ... سازنده و منطق اعتبارسنجی (مثلا EndDate > StartDate)
}
