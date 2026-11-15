using NationalEntityRegistry.Domain.Common;

namespace NationalEntityRegistryApi.Domain.Entities.Companies;

public class CompanyType : BaseEntity
{
    public string Title { get; private set; } // از Name (نوع nvarchar)
}
