using NationalEntityRegistry.Domain.Common;
using System;
using System.Collections.Generic;
using System.Text;

namespace NationalEntityRegistryApi.Domain.ValueObjects.People;

public class NationalCode : ValueObject
{
    public string Value { get; private set; } // از NationalCode (نوع nvarchar)
}
