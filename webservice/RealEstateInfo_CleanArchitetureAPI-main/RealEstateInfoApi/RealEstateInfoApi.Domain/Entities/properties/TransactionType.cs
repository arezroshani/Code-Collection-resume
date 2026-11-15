using RealEstateInfoApi.Domain.Common;

namespace RealEstateInfoApi.Domain.Entities.properties;

public class TransactionType:BaseEntity<int>
{

    public string Name { get; private set; }
    private TransactionType() { }
}
