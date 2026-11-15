using System;
using System.Collections.Generic;

namespace RealEstateInfoApi.Persistence.EF;

public partial class DimRegistrationArea
{
    public short RegistrationAreaId { get; set; }

    public string Title { get; set; } = null!;

    public int StateRegionld { get; set; }

    public string? EstateRegistrationOrganizationCode { get; set; }

    public virtual ICollection<DimRegistrationSection> DimRegistrationSections { get; set; } = new List<DimRegistrationSection>();
}
