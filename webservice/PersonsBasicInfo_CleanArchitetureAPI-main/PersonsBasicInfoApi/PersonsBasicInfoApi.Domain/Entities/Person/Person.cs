using PersonsBasicInfoApi.Domain.Common;
using PersonsBasicInfoApi.Domain.ValueObjects.person;
namespace PersonsBasicInfoApi.Domain.Entities.Persons;

public class Person : BaseEntity<long>
{
    public NationalCode NationalCode { get; private set; }
    public NationalCode? NationalCode2 { get; private set; }
    public string FirstName { get; private set; }
    public string LastName { get; private set; }

    
    private Person() { }

    
    public Person(NationalCode nationalCode, NationalCode? nationalCode2, string firstName, string lastName)
    {
        NationalCode = nationalCode;
        NationalCode2 = nationalCode2;
        FirstName = firstName;
        LastName = lastName;
    }

    
    public void UpdateSecondaryNationalCode(NationalCode? nationalCode2)
    {
        NationalCode2 = nationalCode2;
    }

    
    public void UpdateName(string firstName, string lastName)
    {
        FirstName = firstName;
        LastName = lastName;
    }
}
