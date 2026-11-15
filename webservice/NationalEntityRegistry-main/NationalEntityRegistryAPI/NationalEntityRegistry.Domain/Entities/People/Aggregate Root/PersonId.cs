
using NationalEntityRegistry.Domain.Common;

namespace NationalEntityRegistryApi.Domain.Entities.People.Aggregate_Root;

public class PersonId:ValueObject
{
    public Guid Value { get; }

}
