using NationalEntityRegistryApi.Domain.Common;
using NationalEntityRegistryApi.Domain.ValueObjects.People;


namespace NationalEntityRegistryApi.Domain.Entities.People.Aggregate_Root;

public class ForeignerPerson : AggregateRoot
{
    public FullName PersianFullName { get; private set; }
    public FullName LatinFullName { get; private set; }

    public string PersianFatherName { get; private set; }
    public string LatinFatherName { get; private set; }

    public IdentityDocument IdentityDocument { get; private set; }

    public long NationalityId { get; private set; }
    public Nationality Nationality { get; private set; }


    public DateTime BirthDate { get; private set; }
    public long BirthCountryId { get; private set; }
    public Region BirthCountry { get; private set; }

    public long BirthCityId { get; private set; }
    public Region BirthCity { get; private set; }
}