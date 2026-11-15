using System;
using System.Collections.Generic;

namespace PersonsBasicInfoApi.Persistence.EF;

public partial class DimCompanyGazzet
{
    public int GazetteId { get; set; }

    public int? CompanyId { get; set; }

    public int? NewCompanyId { get; set; }

    public long? RrklinkId { get; set; }

    public int? GazetteTypeId { get; set; }

    public DateOnly? GazetteDate { get; set; }

    public string? NewsPaperCityType { get; set; }

    public string? NewsPaperPageNumber { get; set; }

    public string? NewsPaperNumber { get; set; }

    public DateOnly? NewsPaperDate { get; set; }

    public string? GazetteSource { get; set; }

    public string? GazetteNumber { get; set; }

    public string? GazetteSourceNumber { get; set; }

    public string? ShortGazetteBody { get; set; }

    public string? GazetteTitle { get; set; }

    public string? CompanyName { get; set; }

    public string? CompanySearchName { get; set; }

    public string? CompanyCompareName { get; set; }

    public string? CompanyRegisterNumber { get; set; }

    public int? CompanyTypeId { get; set; }

    public string? CompanyNationalCode { get; set; }

    public DateOnly? CompanyRegisterDate { get; set; }

    public string? CompanyAddress { get; set; }

    public string? CompanyPostalCode { get; set; }

    public string? CompanyInvestment { get; set; }

    public string? CompanyNewspaper { get; set; }

    public int? CompanyCityId { get; set; }

    public int? InvestmentCurrencyTypeId { get; set; }

    public DateOnly? ProceedingsDate { get; set; }

    public DateOnly? ReceivedDate { get; set; }

    public string? Proceedings { get; set; }

    public bool IsBranch { get; set; }

    public bool? ChangedName { get; set; }

    public bool? ChangedType { get; set; }

    public bool? ChangedRegisterNumber { get; set; }

    public string? CompanyNewRegisterNumber { get; set; }

    public string? CompanyNewNationalCode { get; set; }

    public DateOnly? CompanyNewRegisterDate { get; set; }

    public int? CompanyNewCityId { get; set; }

    public int? CompanyNewTypeId { get; set; }

    public string? CompanyNewName { get; set; }

    public string? CompanyNewSearchName { get; set; }

    public string? CompanyNewCompareName { get; set; }

    public string? CompanyLifeTime { get; set; }

    public DateOnly? CompanyDissolutionDate { get; set; }

    public byte GazetteStateId { get; set; }

    public byte? GazetteDb { get; set; }

    public bool IsRepeat { get; set; }

    public DateTime? ModifiedDate { get; set; }

    public DateTime? InternalModifiedDate { get; set; }

    public virtual DimCompany? Company { get; set; }
}
