using System;
using System.Collections.Generic;

namespace RealEstateInfoApi.Persistence.EF;

public partial class TblInnerSource
{
    public int InnerSourceId { get; set; }

    public int SourceId { get; set; }

    public string SourceDescr { get; set; } = null!;

    public virtual ICollection<DimPerson> DimPeople { get; set; } = new List<DimPerson>();

    public virtual ICollection<DimProperty> DimProperties { get; set; } = new List<DimProperty>();
}
