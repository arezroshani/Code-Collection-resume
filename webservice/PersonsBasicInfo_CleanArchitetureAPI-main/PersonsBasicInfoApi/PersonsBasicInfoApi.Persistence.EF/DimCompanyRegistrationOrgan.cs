using System;
using System.Collections.Generic;

namespace PersonsBasicInfoApi.Persistence.EF;

public partial class DimCompanyRegistrationOrgan
{
    public int CompanyRegistrationOrganId { get; set; }

    public string CompanyRegistrationOrganName { get; set; } = null!;

    public string? CompanyRegistrationOrganCode { get; set; }

    public virtual ICollection<DimCompany> DimCompanies { get; set; } = new List<DimCompany>();
}
