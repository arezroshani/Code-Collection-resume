using System;
using System.Collections.Generic;

namespace RealEstateInfoApi.Persistence.EF;

public partial class DimPropertyUsage
{
    public byte PropertyUsageId { get; set; }

    public string? Title { get; set; }

    public int? DisplayOrder { get; set; }

    public virtual ICollection<DimProperty> DimProperties { get; set; } = new List<DimProperty>();
}
