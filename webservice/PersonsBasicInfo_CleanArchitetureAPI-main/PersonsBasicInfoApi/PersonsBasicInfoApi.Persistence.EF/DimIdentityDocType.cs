using System;
using System.Collections.Generic;

namespace PersonsBasicInfoApi.Persistence.EF;

public partial class DimIdentityDocType
{
    public int IdentityDocTypeId { get; set; }

    public string IdentityDocTypeName { get; set; } = null!;

    public DateTime LastDate { get; set; }

    public virtual ICollection<DimForeignerPerson> DimForeignerPeople { get; set; } = new List<DimForeignerPerson>();
}
