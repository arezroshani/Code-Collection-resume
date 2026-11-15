using System;
using System.Collections.Generic;

namespace RealEstateInfoApi.Persistence.EF;

public partial class DimJobTitle
{
    public int JobTitleId { get; set; }

    public string Title { get; set; } = null!;

    public string? IscoCode { get; set; }

    public virtual ICollection<DimPerson> DimPeople { get; set; } = new List<DimPerson>();
}
