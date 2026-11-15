namespace PersonsBasicInfoApi.Domain.Exceptions;

public static partial class Errors
{
    public static class NationalCode
    {
        public static readonly Error IsRequired = new("NationalCode.IsRequired", "کد ملی الزامی است.");

        public static readonly Error InvalidLength = new("NationalCode.InvalidLength", "کد ملی باید دقیقاً ۱۰ رقم باشد.");

        public static readonly Error InvalidChecksum = new("NationalCode.InvalidChecksum", "فرمت کد ملی وارد شده صحیح نمی‌باشد (خطا در محاسبه).");
    }
}
