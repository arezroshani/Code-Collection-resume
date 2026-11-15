using System;
using System.Collections.Generic;

namespace PersonsBasicInfoApi.Persistence.EF;

public partial class DimPerson
{
    public int KeyId { get; set; }

    public int? PersonId { get; set; }

    public short ValidType { get; set; }

    public string? NationalCode { get; set; }

    public string? FirstName { get; set; }

    public string? LastName { get; set; }

    public string? FatherName { get; set; }

    public bool? Gender { get; set; }

    public string? BirthDate { get; set; }

    public string? DeathDate { get; set; }

    public string? CertificateNo { get; set; }

    public string? CertSerial { get; set; }

    public string? CertSeries { get; set; }

    public int? BirthLocationId { get; set; }

    public int? IssueLocationId { get; set; }

    public DateTime LastDate { get; set; }

    public long? TimeStmp { get; set; }

    public int? SourceId { get; set; }

    public int InsertTime { get; set; }

    public bool? IsDead { get; set; }

    public string? FatherNc { get; set; }

    public string? MotherNc { get; set; }

    public string? MotherName { get; set; }

    public string? Idcard { get; set; }

    public string? NationalCode2 { get; set; }

    public virtual DimLocation? BirthLocation { get; set; }

    public virtual DimLocation? IssueLocation { get; set; }
}
