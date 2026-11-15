using System;
using System.Collections.Generic;

namespace RealEstateInfoApi.Persistence.EF;

public partial class DimPersonType
{
    public int PersonTypeId { get; set; }

    public string Title { get; set; } = null!;

    public virtual ICollection<DimPerson> DimPeople { get; set; } = new List<DimPerson>();
}
