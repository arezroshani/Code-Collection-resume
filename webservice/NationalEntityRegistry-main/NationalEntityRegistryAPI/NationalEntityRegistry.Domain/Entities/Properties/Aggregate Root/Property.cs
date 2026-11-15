
using NationalEntityRegistryApi.Domain.ValueObjects.Properties;
using NationalEntityRegistryApi.Domain.Common;

namespace NationalEntityRegistryApi.Domain.Entities.Properties.Aggregate_Root;

public class Property : AggregateRoot
{
    public Address Address { get; private set; }
    public Coordinates Coordinates { get; private set; }
    public Plaque Plaque { get; private set; }
    public decimal Area { get; private set; }
    public int? BuildYear { get; private set; } // از BuildYear (نوع smallint)

    public long PropertyTypeId { get; private set; }
    public PropertyType PropertyType { get; private set; }

    public long PropertyUsageId { get; private set; }
    public PropertyUsage Usage { get; private set; }
}