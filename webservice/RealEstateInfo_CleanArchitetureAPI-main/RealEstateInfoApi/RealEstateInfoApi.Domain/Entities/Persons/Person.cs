
using RealEstateInfoApi.Domain.Common;
using RealEstateInfoApi.Domain.Entities.properties;
using RealEstateInfoApi.Domain.ValueObjects.person;

namespace RealEstateInfoApi.Domain.Entities.Persons;

public class Person:BaseEntity<long>
{
    public NationalCode NationalCode { get; private set; }
    public NationalCode? NationalCode2 { get; private set; }
    public string FirstName { get; private set; }
    public string LastName { get; private set; }

    private readonly List<Property> _properties = new();
    public IReadOnlyList<Property> Properties => _properties.AsReadOnly();

    private Person() { }

    public Person(NationalCode nationalCode,string firstName,string lastName)
    {
        NationalCode = nationalCode;
        FirstName = firstName;
        LastName = lastName;
    }

    public void AddProperties(IEnumerable<Property> properties)
    {
        if (properties == null) return;
        _properties.Clear(); // لیست قبلی را پاک می‌کنیم
        _properties.AddRange(properties); // آیتم‌های جدید را اضافه می‌کنیم
    }


}
