using NationalEntityRegistryApi.Domain.Common;
using System;
using System.Collections.Generic;
using System.Text;

namespace NationalEntityRegistryApi.Domain.Entities.Companies.Aggregate_Root;

public class CompanyDecision : AggregateRoot
{
    public string Title { get; private set; } // از: CompanyDecisionDescription
    public string Code { get; private set; } // از: CompanyDecisionCode
}
