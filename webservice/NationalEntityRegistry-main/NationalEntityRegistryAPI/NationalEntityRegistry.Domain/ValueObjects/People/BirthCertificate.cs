using NationalEntityRegistry.Domain.Common;
using System;
using System.Collections.Generic;
using System.Text;

namespace NationalEntityRegistryApi.Domain.ValueObjects.People;

public class BirthCertificate : ValueObject
{
    public string Number { get; private set; }    // از CertficateNo
    public string Serial { get; private set; }    // از CertSerial
    public string Series { get; private set; }    // از CertSeries
    public long IssueRegionId { get; private set; } // از IssueLocationId

    // Constructor and validation logic here...
}

