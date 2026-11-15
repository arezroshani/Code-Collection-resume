

namespace NationalEntityRegistry.Domain.Common
{
    public abstract class BaseEntity
    {
        public long Id { get; protected set; } // از KeyId, PersonId, CompanyId و ... (نوع int یا bigint)
    }
}
