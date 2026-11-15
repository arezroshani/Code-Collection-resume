using NationalEntityRegistry.Domain.Common;

namespace NationalEntityRegistryApi.Domain.Entities.Properties;

public class RegistrationSection : BaseEntity
{
    public string Title { get; private set; }
    public long RegistrationAreaId { get; private set; }
    public RegistrationArea RegistrationArea { get; private set; }
}
