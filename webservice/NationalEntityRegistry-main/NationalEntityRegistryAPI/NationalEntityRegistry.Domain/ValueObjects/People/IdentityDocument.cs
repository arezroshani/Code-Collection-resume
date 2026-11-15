using NationalEntityRegistry.Domain.Common;
using NationalEntityRegistryApi.Domain.Entities.People;


namespace NationalEntityRegistryApi.Domain.ValueObjects.People;

public class IdentityDocument : ValueObject
{
    public IdentityDocumentType DocumentType { get; private set; }
    public string DocumentNumber { get; private set; } // از IdentityDocNo (نوع nvarchar)
    public string DocumentCode { get; private set; }//از IdentityCode
    public DateTime? IssueDate { get; private set; } // از IssueDate (نوع varchar)
    public DateTime? ExpireDate { get; private set; } // از ExpireDate (نوع varchar)


    //public IdentityDocument()
    //{
         
    //}

    // private constructor for EF

    //متد اعمال قوانین ساخت ابجکت ها
}
