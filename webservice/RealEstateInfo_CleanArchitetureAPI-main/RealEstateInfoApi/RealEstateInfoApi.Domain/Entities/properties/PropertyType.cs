using RealEstateInfoApi.Domain.Common;

namespace RealEstateInfoApi.Domain.Entities.properties;

public class PropertyType:BaseEntity<int>
{
    public string Name { get; private set; }
    private PropertyType() { }

}
