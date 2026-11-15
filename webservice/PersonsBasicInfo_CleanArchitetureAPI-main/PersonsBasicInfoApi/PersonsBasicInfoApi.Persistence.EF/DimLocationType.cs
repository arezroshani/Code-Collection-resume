using System;
using System.Collections.Generic;

namespace PersonsBasicInfoApi.Persistence.EF;

public partial class DimLocationType
{
    public int LocationTypeId { get; set; }

    public string LocationTypeName { get; set; } = null!;

    public DateTime LastDate { get; set; }

    public virtual ICollection<DimLocation> DimLocations { get; set; } = new List<DimLocation>();
}
