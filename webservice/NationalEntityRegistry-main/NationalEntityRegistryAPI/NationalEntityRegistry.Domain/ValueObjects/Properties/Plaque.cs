using NationalEntityRegistry.Domain.Common;
using System;
using System.Collections.Generic;
using System.Text;

namespace NationalEntityRegistryApi.Domain.ValueObjects.Properties;

public class Plaque : ValueObject
{
    public string Primary { get; private set; } // از PrimaryRegistrationPlaque (نوع nvarchar)
    public string Secondary { get; private set; } // از SecondaryRegistrationPlaque (نوع nvarchar)
}