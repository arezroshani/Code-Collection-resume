
using RealEstateInfoApi.Domain.Common;
using RealEstateInfoApi.Domain.Exceptions;
using System.Text.RegularExpressions;

namespace RealEstateInfoApi.Domain.ValueObjects.Properties;

public class Address: ValueObject
{
    public string City { get; private set; }
    public string Street { get; private set; }
    public string PostalCode { get; private set; }

    private Address() { }

    private Address(string city, string street, string postalCode)
    {
        City = city;
        Street = street;
        PostalCode = postalCode;

    }

    public static Address Create(string city, string street, string postalCode)
    {
        if (string.IsNullOrWhiteSpace(city))
        {
            throw new DomainException(Errors.Address.CityIsRequired);
        }

        if (string.IsNullOrWhiteSpace(street))
        {
            throw new DomainException(Errors.Address.StreetIsRequired);
        }

        if (string.IsNullOrWhiteSpace(postalCode) || !Regex.IsMatch(postalCode, @"^\d{10}$"))
        {
            throw new DomainException(Errors.Address.PostalCodeInvalidFormat);
        }

        return new Address(city, street, postalCode);
    }
    public override string ToString()
    {
         return $"{City},{Street},{PostalCode}";
    }
    public override IEnumerable<object> GetEqualityComponents()
    {
        yield return City;
        yield return Street;
        yield return PostalCode;
    }
}
