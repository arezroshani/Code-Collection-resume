using NationalEntityRegistry.Domain.Common;

namespace NationalEntityRegistryApi.Domain.Entities.People;

public class IdentityDocumentType : BaseEntity
{
    public string Title { get; private set; }
}
