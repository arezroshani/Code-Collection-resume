using System;
using System.Collections.Generic;

namespace PersonsBasicInfoApi.Persistence.EF;

public partial class DimCompanyDecision
{
    public int CompanyDecisionId { get; set; }

    public string CompanyDecisionDescription { get; set; } = null!;

    public string CompanyDecisionCode { get; set; } = null!;

    public virtual ICollection<DimCompany> DimCompanies { get; set; } = new List<DimCompany>();
}
