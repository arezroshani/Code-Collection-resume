using System;
using System.Collections.Generic;

namespace RealEstateInfoApi.Persistence.EF;

public partial class DimPerson
{
    public long PersonId { get; set; }

    public int? PersonTypeId { get; set; }

    public string? NationalCode { get; set; }

    public string? NationalCode2 { get; set; }

    public string? BirthCertificateNo { get; set; }

    public bool? GenderId { get; set; }

    public string? FirstName { get; set; }

    public string? LastName { get; set; }

    public string? FatherName { get; set; }

    public string? PhoneNumber { get; set; }

    public byte? MarriageStatusId { get; set; }

    public int? JobTitleId { get; set; }

    public int? BirthCityRegionId { get; set; }

    public int? BirthStateRegionId { get; set; }

    public int InnerSourceId { get; set; }

    public int? BirthDate { get; set; }

    public int? DeathDate { get; set; }

    public int? InsertTime { get; set; }

    public virtual TblInnerSource InnerSource { get; set; } = null!;

    public virtual DimJobTitle? JobTitle { get; set; }

    public virtual DimPersonType? PersonType { get; set; }
}
