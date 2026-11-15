using System;
using System.Collections.Generic;

namespace RealEstateInfoApi.Persistence.EF;

public partial class DimPropertyType
{
    public byte PropertyTypeId { get; set; }

    public string? Title { get; set; }

    public byte DisplayOrder { get; set; }

    public virtual ICollection<DimProperty> DimProperties { get; set; } = new List<DimProperty>();
}
