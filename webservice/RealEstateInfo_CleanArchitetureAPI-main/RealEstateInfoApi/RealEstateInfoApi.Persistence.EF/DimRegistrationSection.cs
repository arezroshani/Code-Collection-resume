using System;
using System.Collections.Generic;

namespace RealEstateInfoApi.Persistence.EF;

public partial class DimRegistrationSection
{
    public short RegistrationSectionId { get; set; }

    public short RegistrationAreaId { get; set; }

    public string Title { get; set; } = null!;

    public string? EstateRegistrationOrganizationCode { get; set; }

    public virtual ICollection<DimProperty> DimProperties { get; set; } = new List<DimProperty>();

    public virtual DimRegistrationArea RegistrationArea { get; set; } = null!;
}
