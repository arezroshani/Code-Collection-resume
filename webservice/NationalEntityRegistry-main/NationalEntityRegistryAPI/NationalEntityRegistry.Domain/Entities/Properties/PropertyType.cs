using NationalEntityRegistry.Domain.Common;

namespace NationalEntityRegistryApi.Domain.Entities.Properties;

public class PropertyType : BaseEntity
{
    public string Title { get; private set; }
}
