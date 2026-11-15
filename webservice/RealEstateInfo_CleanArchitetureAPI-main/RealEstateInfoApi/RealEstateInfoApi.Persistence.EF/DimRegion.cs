using System;
using System.Collections.Generic;

namespace RealEstateInfoApi.Persistence.EF;

public partial class DimRegion
{
    public int RegionId { get; set; }

    public int? ParentRegionId { get; set; }

    public string Title { get; set; } = null!;

    public byte RegionTypeId { get; set; }

    public string? Code { get; set; }

    public string? Path { get; set; }

    public int? RootRegionId { get; set; }

    public string? NationalCode { get; set; }

    public bool IsActive { get; set; }

    public bool IsNew { get; set; }

    public DateTime? CreateTime { get; set; }

    public virtual ICollection<DimRegion> InverseParentRegion { get; set; } = new List<DimRegion>();

    public virtual DimRegion? ParentRegion { get; set; }

    public virtual DimRegionType RegionType { get; set; } = null!;
}
