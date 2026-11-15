using NationalEntityRegistry.Domain.Common;
using NationalEntityRegistryApi.Domain.ValueObjects.Companies;

namespace NationalEntityRegistryApi.Domain.Entities.Companies
{
    public class Gazette : BaseEntity // از جدول DimCompanyGazzet
    {
        public string BusinessId { get; private set; } // از: GazetteID

        //public GazetteType GazetteType { get; private set; } // از جدول مرجع GazetteType
        public string Title { get; private set; } // از: GazetteTitle
        public string Number { get; private set; } // از: GazetteNumber
        public string Source { get; private set; } // از: GazetteSource
        public string TextBody { get; private set; }
        public DateTime? RegistrationDate { get; private set; } // از: CompanyRegisterDate
        public Address Address { get; private set; } // ValueObject از: CompanyAddress, CompanyPostalCode
        public decimal? Investment { get; private set; } // از: CompanyInvestment
        public PublicationInfo Publication { get; private set; }
    }
}
