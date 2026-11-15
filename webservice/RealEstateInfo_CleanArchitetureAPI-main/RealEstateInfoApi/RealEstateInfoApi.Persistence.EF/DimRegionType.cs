using System;
using System.Collections.Generic;

namespace RealEstateInfoApi.Persistence.EF;

public partial class DimRegionType
{
    public byte RegionTypeId { get; set; }

    public string? Title { get; set; }

    public virtual ICollection<DimRegion> DimRegions { get; set; } = new List<DimRegion>();
}
