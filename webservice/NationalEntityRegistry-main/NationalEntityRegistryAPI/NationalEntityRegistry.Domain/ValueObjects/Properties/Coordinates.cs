using NationalEntityRegistry.Domain.Common;
using System;
using System.Collections.Generic;
using System.Text;

namespace NationalEntityRegistryApi.Domain.ValueObjects.Properties;

public class Coordinates : ValueObject
{
    public double Latitude { get; private set; } // از Latitude (نوع varchar)
    public double Longitude { get; private set; } // از Longitude (نوع varchar)
}
