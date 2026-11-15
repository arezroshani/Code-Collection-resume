
using RealEstateInfoApi.Domain.Common;
using RealEstateInfoApi.Domain.ValueObjects.Properties;
using System.Net;

namespace RealEstateInfoApi.Domain.Entities.properties;

public class Property: BaseEntity<long>
{
    public string Title { get; private set; }
    public decimal Area { get; private set; }
    public Address Address { get; private set; }
    public string? Description { get; private set; }

    public int PropertyTypeId { get; private set; }
    public int TransactionTypeId { get; private set; }

  
    public PropertyType PropertyType { get; private set; }
    public TransactionType TransactionType { get; private set; }


    // سازنده private برای EF Core
    private Property() { }
}
