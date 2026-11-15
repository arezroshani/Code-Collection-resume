namespace PersonsBasicInfoApi.Domain.Exceptions;

public static partial class Errors
{
    public static class Person
    {
        public static readonly Error NotFound = new("Person.NotFound", "شخص یافت نشد.");
    }
}
