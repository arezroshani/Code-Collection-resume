using NationalEntityRegistryApi.Domain.Common;
using NationalEntityRegistryApi.Domain.Entities.Companies;
using NationalEntityRegistryApi.Domain.ValueObjects.Companies;


namespace NationalEntityRegistryApi.Domain.Entities.Companies.Aggregate_Root;

public class Company : AggregateRoot
{
    // شناسه کسب‌وکار از سیستم منبع
    public string BusinessId { get; private set; } // از: CompanyID (نوع: nvarchar) -> نام برای شفافیت تغییر کرد

    // نام اصلی شرکت
    public string Name { get; private set; } // از: CompanyName

    // شناسه ملی و شناسه ملی اصلاح شده
    public CompanyIdentifier Identifier { get; private set; } // ValueObject از: CompanyNationalCode, CorrectCompanyNationalCode

    // شماره ثبت
    public string RegistrationNumber { get; private set; } // از: RegisterNumber

    // تاریخ‌ها
    public DateTime? IssueDate { get; private set; } // از: IssuanceDateShamsi (نوع: varchar) -> به DateTime? تبدیل شد
    public DateTime? RegistrationDate { get; private set; } // از: RegisterDateShamsi (نوع: varchar) -> به DateTime? تبدیل شد
    public DateTime? DissolutionDate { get; private set; } // از: CompanyDissolutionDate

    // آیا شعبه است؟
    public bool IsBranch { get; private set; }

    // تعداد شعبه‌ها
    public int BranchCount { get; private set; }

    // سهام ثبت شده در روزنامه رسمی
    public long StockInGazette { get; private set; } // از: GazetteStock 

    // موجودیت‌های مرجع (Lookup Entities)
    public CompanyType CompanyType { get; private set; }
    public CompanyRegistrationOrgan RegistrationOrgan { get; private set; }
    public CompanyObjectState State { get; private set; }
    public CompanyDecision LastDecision { get; private set; }  // از: CompanyDecisionDescription

}
