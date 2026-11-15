using NationalEntityRegistryApi.Domain.Common;


namespace NationalEntityRegistryApi.Domain.Entities.Companies.Aggregate_Root;

public class CompanyType : AggregateRoot
{
    // Id از AggregateRoot
    public string Title { get; private set; } // از: CompanyTypeDescription -> نام Title برای سازگاری در UI
    public int? ParentCompanyTypeId { get; private set; } // ParentCompanyTypeID
}
