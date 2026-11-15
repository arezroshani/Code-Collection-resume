using System;
using System.Collections.Generic;

namespace PersonsBasicInfoApi.Persistence.EF;

public partial class DimCompanyType
{
    public int CompanyTypeId { get; set; }

    public int? ParentCompanyTypeId { get; set; }

    public string CompanyTypeDescription { get; set; } = null!;

    public virtual ICollection<DimCompany> DimCompanies { get; set; } = new List<DimCompany>();

    public virtual ICollection<DimCompanyType> InverseParentCompanyType { get; set; } = new List<DimCompanyType>();

    public virtual DimCompanyType? ParentCompanyType { get; set; }
}
