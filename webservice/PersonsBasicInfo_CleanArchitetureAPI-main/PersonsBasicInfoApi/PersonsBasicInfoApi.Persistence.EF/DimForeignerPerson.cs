using System;
using System.Collections.Generic;

namespace PersonsBasicInfoApi.Persistence.EF;

public partial class DimForeignerPerson
{
    public int KeyId { get; set; }

    public int? ForeignerPersonId { get; set; }

    public string? IdentityCode { get; set; }

    public string? IdentityDocNumber { get; set; }

    public string? PersianFirstName { get; set; }

    public string? PersianLastName { get; set; }

    public string? PersianFatherName { get; set; }

    public string? AncestorName { get; set; }

    public DateOnly? BirthDate { get; set; }

    public int? BirthCountryId { get; set; }

    public int? BirthCityId { get; set; }

    public int? IdentityDocTypeId { get; set; }

    public int? NationalityId { get; set; }

    public bool? Gender { get; set; }

    public string? LatinFirstName { get; set; }

    public string? LatinLastName { get; set; }

    public string? LatinFatherName { get; set; }

    public DateOnly? DocumentIssueDate { get; set; }

    public DateOnly? DocumentExpireDate { get; set; }

    public int? SourceId { get; set; }

    public DateTime LastDate { get; set; }

    public bool? IsOrginal { get; set; }

    public string? InsertTime { get; set; }

    public string? IdentityCode2 { get; set; }

    public virtual DimLocation? BirthCity { get; set; }

    public virtual DimLocation? BirthCountry { get; set; }

    public virtual DimIdentityDocType? IdentityDocType { get; set; }

    public virtual DimNationality? Nationality { get; set; }
}
