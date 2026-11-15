using System;
using System.Collections.Generic;

namespace PersonsBasicInfoApi.Persistence.EF;

public partial class DimCompanyHistory
{
    public int KeyId { get; set; }

    public int CompanyHistoryId { get; set; }

    public DateTime LogDate { get; set; }

    public int CompanyId { get; set; }

    public string CorrectCompanyNationalCode { get; set; } = null!;

    public string StartDateTime { get; set; } = null!;

    public string? FinishDateTime { get; set; }

    public string? FinalCompanyName { get; set; }

    public string? CompanyLocation { get; set; }

    public string? CompanyPostalCode { get; set; }

    public string? CompanySubject { get; set; }

    public string? Assignment { get; set; }

    public string? CompanyInvestment { get; set; }

    public string? Address { get; set; }

    public string? AgentAddress { get; set; }

    public string? PostalCode { get; set; }

    public string? AgentPostalCode { get; set; }

    public int? PersonPostId { get; set; }

    public string? NewGazet { get; set; }

    public int? CompanyObjectStateId { get; set; }

    public string? ParentChanges { get; set; }

    public string? ChildChanges { get; set; }

    public string? PersonPostIds { get; set; }

    public byte? PersonSignatureStateId { get; set; }

    public string? CompanyName { get; set; }

    public int? CompanyKeyId { get; set; }

    public virtual DimCompany? CompanyKey { get; set; }

    public virtual DimCompanyObjectState? CompanyObjectState { get; set; }
}
