namespace RealEstateInfoApi.Domain.Exceptions;

public partial class Errors
{
    public static class Address
    {
        public static readonly Error CityIsRequired = new("City.IsRequired", "نام شهر برای ادرس الزامی است ");
        public static readonly Error StreetIsRequired = new("Street.IsRequired", "نام خیابان برای ادرس الزامی است");
        public static readonly Error PostalCodeInvalidFormat = new("PostalCode.InvalidFormat", "فرمت کد پستی نامعتبر است");

    }
}
