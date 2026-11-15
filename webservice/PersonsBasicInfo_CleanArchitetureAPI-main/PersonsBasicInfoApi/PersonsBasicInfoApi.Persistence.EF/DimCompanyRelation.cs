using System;
using System.Collections.Generic;

namespace PersonsBasicInfoApi.Persistence.EF;

public partial class DimCompanyRelation
{
    public int CompanyRelationId { get; set; }

    public int? CompanyId { get; set; }

    public int? RelCompanyId { get; set; }

    public int? RelPersonKeyId { get; set; }

    public string? RelCode { get; set; }

    public string? NotExistFullName { get; set; }

    public string? PersonTypeDesc { get; set; }

    public string? PersonPostDesc { get; set; }

    public string? PersonSignatureStateDesc { get; set; }

    public string? AgentStartDate { get; set; }

    public string? AgentEndDate { get; set; }

    public string? PersonAttendanceStatusDesc { get; set; }

    public string? PersonStateDesc { get; set; }

    public DateTime? Lastdate { get; set; }

    public int? CompanyKeyId { get; set; }

    public int? RelCompanyKeyId { get; set; }

    public int? PersonDurationTypeId { get; set; }

    public string? PositionStartDate { get; set; }

    public string? PositionEndDate { get; set; }

    public string? EndDateValidity { get; set; }

    public int? RelForeignPersonKeyId { get; set; }

    public bool? IsAgent { get; set; }

    public virtual DimCompany? CompanyKey { get; set; }
}
