using System;
using System.Collections.Generic;

namespace RealEstateInfoApi.Persistence.EF;

public partial class FactResident
{
    public long ResidentId { get; set; }

    public long ResidentPersonId { get; set; }

    public long PropertyId { get; set; }

    public DateOnly? FromDate { get; set; }

    public DateOnly? ToDate { get; set; }

    public byte? ResidentStatusId { get; set; }

    public byte? ResidentTypeId { get; set; }

    public int? InnerSourceId { get; set; }

    public int? InsertTime { get; set; }

    public int? UpdateTime { get; set; }

    public bool? IsOwner { get; set; }

    public DateOnly? OwnerFromDate { get; set; }

    public DateOnly? OwnerToDate { get; set; }

    public virtual TblInnerSource? InnerSource { get; set; }

    public virtual DimProperty Property { get; set; } = null!;

    public virtual DimPerson ResidentPerson { get; set; } = null!;
}
