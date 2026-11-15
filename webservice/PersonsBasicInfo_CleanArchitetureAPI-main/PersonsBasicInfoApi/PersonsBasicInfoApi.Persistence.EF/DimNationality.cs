using System;
using System.Collections.Generic;

namespace PersonsBasicInfoApi.Persistence.EF;

public partial class DimNationality
{
    public int NationalityId { get; set; }

    public string? NationalityName { get; set; }

    public string? NationalityLatinName { get; set; }

    public virtual ICollection<DimForeignerPerson> DimForeignerPeople { get; set; } = new List<DimForeignerPerson>();
}
