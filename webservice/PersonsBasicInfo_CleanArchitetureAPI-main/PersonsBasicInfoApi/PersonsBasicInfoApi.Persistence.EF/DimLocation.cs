using System;
using System.Collections.Generic;

namespace PersonsBasicInfoApi.Persistence.EF;

public partial class DimLocation
{
    public int LocationId { get; set; }

    public int? LocationParentId { get; set; }

    public string LocationName { get; set; } = null!;

    public int LocationTypeId { get; set; }

    public string? LocationLatinName { get; set; }

    public DateTime LastDate { get; set; }

    public virtual ICollection<DimForeignerPerson> DimForeignerPersonBirthCities { get; set; } = new List<DimForeignerPerson>();

    public virtual ICollection<DimForeignerPerson> DimForeignerPersonBirthCountries { get; set; } = new List<DimForeignerPerson>();

    public virtual ICollection<DimPerson> DimPersonBirthLocations { get; set; } = new List<DimPerson>();

    public virtual ICollection<DimPerson> DimPersonIssueLocations { get; set; } = new List<DimPerson>();

    public virtual ICollection<DimLocation> InverseLocationParent { get; set; } = new List<DimLocation>();

    public virtual DimLocation? LocationParent { get; set; }

    public virtual DimLocationType LocationType { get; set; } = null!;
}
