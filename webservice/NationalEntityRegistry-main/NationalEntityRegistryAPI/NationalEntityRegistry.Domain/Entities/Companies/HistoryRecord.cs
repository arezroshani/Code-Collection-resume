using NationalEntityRegistry.Domain.Common;
using NationalEntityRegistryApi.Domain.Entities.People.Aggregate_Root;
using NationalEntityRegistryApi.Domain.Enums.Companies;
using NationalEntityRegistryApi.Domain.ValueObjects.Companies;

namespace NationalEntityRegistryApi.Domain.Entities.Companies;

public class HistoryRecord : BaseEntity // از جدول DimCompanyHistory
{
    public DateTime LogDate { get; private set; }
    public DateRange Period { get; private set; } // ValueObject از: StartDate, FinishDate
    public string CompanyName { get; private set; } // از: FinalCompanyName
    public Address CompanyAddress { get; private set; }
    public Address AgentAddress { get; private set; }

    public string Subject { get; private set; } // از: CompanySubject
    public decimal? Investment { get; private set; } // از: CompanyInvestment
    public CompanyStatus State { get; private set; } // از: CompanyObjectStateID

    public PersonId AuthorizingPersonId { get; private set; } // شناسه شخصی که تغییر را ثبت کرده

}
