using NationalEntityRegistry.Domain.Common;
using System;
using System.Collections.Generic;
using System.Text;

namespace NationalEntityRegistryApi.Domain.ValueObjects.Companies;

public class CompanyObjectStateId:ValueObject
{
    public Guid Value { get; }
}
