using NationalEntityRegistryApi.Domain.Common;
using NationalEntityRegistryApi.Domain.Entities.People;
using NationalEntityRegistryApi.Domain.ValueObjects.Companies;


namespace NationalEntityRegistryApi.Domain.Entities.Properties.Aggregate_Root;

public class Residency : AggregateRoot
{
    public long PropertyId { get; private set; }
    public Property Property { get; private set; }

    public long PersonId { get; private set; }
    public Person Person { get; private set; }

    public DateRange ResidencyPeriod { get; private set; } // از FromDate, ToDate (نوع date)
    public bool IsOwner { get; private set; }
    public DateRange OwnershipPeriod { get; private set; } // از OwnerFromDate, OwnerToDate (نوع date)
}
