using System;
using System.Collections.Generic;

namespace PersonsBasicInfoApi.Persistence.EF;

public partial class DimCompanyObjectState
{
    public int CompanyObjectStateId { get; set; }

    public string? CompanyObjectStateDescription { get; set; }

    public string? CompanyObjectStateCode { get; set; }

    public byte? CompanyObjectState { get; set; }

    public DateTime? CreationDateTime { get; set; }

    public byte? CompanyObjectStateInterval { get; set; }

    public virtual ICollection<DimCompanyHistory> DimCompanyHistories { get; set; } = new List<DimCompanyHistory>();
}
