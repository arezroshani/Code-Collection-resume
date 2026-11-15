namespace RealEstateInfoApi.Domain.Exceptions;

public partial class Errors
{
    public partial class Person
    {
        public static readonly Error NotFound = new("Person.NotFound", "شخصی با این کد ملی یافت نشد");
    }
}
