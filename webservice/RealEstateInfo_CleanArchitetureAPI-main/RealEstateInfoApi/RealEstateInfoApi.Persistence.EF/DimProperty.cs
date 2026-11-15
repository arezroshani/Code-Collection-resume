using System;
using System.Collections.Generic;

namespace RealEstateInfoApi.Persistence.EF;

public partial class DimProperty
{
    public long PropertyId { get; set; }

    public byte? PropertyUsageId { get; set; }

    public byte? PropertyTypeId { get; set; }

    public string? PostCode { get; set; }

    public int? RegionId { get; set; }

    public string? Address { get; set; }

    public short? RegistrationSectionId { get; set; }

    public string? PrimaryRegistrationPlaque { get; set; }

    public string? SecondaryRegistrationPlaque { get; set; }

    public string? FloorNo { get; set; }

    public short? BuildYear { get; set; }

    public bool? IsValid { get; set; }

    public string? Longitude { get; set; }

    public string? Latitude { get; set; }

    public decimal? Area { get; set; }

    public int? StateRegionId { get; set; }

    public int? InnerSourceId { get; set; }

    public int? InsertTime { get; set; }

    public int? UpdateTime { get; set; }

    public virtual TblInnerSource? InnerSource { get; set; }

    public virtual DimPropertyType? PropertyType { get; set; }

    public virtual DimPropertyUsage? PropertyUsage { get; set; }

    public virtual DimRegistrationSection? RegistrationSection { get; set; }
}
