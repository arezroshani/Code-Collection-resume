using NationalEntityRegistry.Domain.Common;
using System;
using System.Collections.Generic;
using System.Text;

namespace NationalEntityRegistryApi.Domain.ValueObjects.People;

public class FullName : ValueObject
{
    public string FirstName { get; private set; }
    public string LastName { get; private set; }
}
