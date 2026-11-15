using NationalEntityRegistry.Domain.Common;
using System;
using System.Collections.Generic;
using System.Text;

namespace NationalEntityRegistryApi.Domain.Entities.People;

public class Nationality : BaseEntity
{
    public string Title { get; private set; }
}