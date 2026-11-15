using System;
using System.Collections.Generic;

namespace PersonsBasicInfoApi.Persistence.EF;

public partial class DimCompany
{
    public int KeyId { get; set; }

    public int? CompanyId { get; set; }

    public int? CorrectCompanyId { get; set; }

    public string? ParentCompanyNationalCode { get; set; }

    public string? CompanyNationalCode { get; set; }

    public string? CorrectCompanyNationalCode { get; set; }

    public string? CompanyName { get; set; }

    public string? ActivityEndDateShamsi { get; set; }

    public string? IssuanceDateShamsi { get; set; }

    public string? RegisterDateShamsi { get; set; }

    public string? RegisterNumber { get; set; }

    public int? CompanyTypeId { get; set; }

    public string? CompanyTypeDescription { get; set; }

    public string? CompanyRegistrationOrganDescription { get; set; }

    public string? CompanyObjectStateDescription { get; set; }

    public bool? IsBranch { get; set; }

    public string? ValidityEndDate { get; set; }

    public bool? TaxRestricted { get; set; }

    public DateOnly? LastCompanyDecisionDate { get; set; }

    public int? BranchCount { get; set; }

    public string? CompanyDecisionDescription { get; set; }

    public long? GazetteStock { get; set; }

    public string? GazetteActivity { get; set; }

    public string? ManagerNationalCode { get; set; }

    public DateOnly? LastGazetteDate { get; set; }

    public string? GazetteSignatureAuthority { get; set; }

    public string? CurrencyTypeDescription { get; set; }

    public int? ActivityGazetteId { get; set; }

    public int? SignatureAuthorityGazetteId { get; set; }

    public string? CityRegionDescription { get; set; }

    public int? PersonsCount { get; set; }

    public int? PersonsInspectionCount { get; set; }

    public int? PersonsDirectorsCount { get; set; }

    public int? PersonsStockholderCount { get; set; }

    public DateOnly? CreationDateTime { get; set; }

    public DateOnly? ModifyDateTime { get; set; }

    public int? CompanyRegistrationOrganId { get; set; }

    public int? CompanyDecisionId { get; set; }

    public string? CompanyDissolutionDate { get; set; }

    public virtual DimCompanyDecision? CompanyDecision { get; set; }

    public virtual DimCompanyRegistrationOrgan? CompanyRegistrationOrgan { get; set; }

    public virtual DimCompanyType? CompanyType { get; set; }

    public virtual ICollection<DimCompanyGazzet> DimCompanyGazzets { get; set; } = new List<DimCompanyGazzet>();

    public virtual ICollection<DimCompanyHistory> DimCompanyHistories { get; set; } = new List<DimCompanyHistory>();

    public virtual ICollection<DimCompanyRelation> DimCompanyRelations { get; set; } = new List<DimCompanyRelation>();
}
