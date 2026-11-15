using NationalEntityRegistry.Domain.Common;

namespace NationalEntityRegistryApi.Domain.ValueObjects.Companies;

public class CompanyIdentifier : ValueObject
{
    public string NationalCode { get; private set; } // از: CompanyNationalCode
    public string CorrectedNationalCode { get; private set; } // از: CorrectCompanyNationalCode
    // ... سازنده و منطق اعتبارسنجی
}
