using NationalEntityRegistry.Domain.Common;
using NationalEntityRegistryApi.Domain.ValueObjects.Companies;

namespace NationalEntityRegistryApi.Domain.Entities.Companies;

public class CompanyAffiliation : BaseEntity // از جدول DimCompanyRelation
{
    public long PersonBusinessId { get; private set; } // از: RelPersonKeyId
    public string PersonFullName { get; private set; } // از: NotExistFullName
    public string Role { get; private set; } // از: PersonTypeDesc
    public string Position { get; private set; } // از: PersonPostDesc
    public string SignatureStatus { get; private set; } // از: PersonSignatureStateDesc
    public string AttendanceStatus { get; private set; } // از: PersonAttendanceStatusDesc
    public DateRange Term { get; private set; } // ValueObject از: AgentStartDate, AgentEndDate
}