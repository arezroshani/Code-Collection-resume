using NationalEntityRegistryApi.Domain.Common;
using NationalEntityRegistryApi.Domain.Enums;
using NationalEntityRegistryApi.Domain.ValueObjects.People;

namespace NationalEntityRegistryApi.Domain.Entities.People;

public class Person : AggregateRoot
{
    public FullName FullName { get; private set; }
    public NationalCode NationalCode { get; private set; }
    public Gender Gender { get; private set; }
    public DateTime? BirthDate { get; private set; }
    public DateTime? DeathDate { get; private set; }
    public bool IsDead => DeathDate.HasValue;

    // اطلاعات والدین
    public string FatherName { get; private set; }
    public NationalCode FatherNationalCode { get; private set; }
    public string MotherName { get; private set; }
    public NationalCode MotherNationalCode { get; private set; }

    // اطلاعات شناسنامه به عنوان یک Value Object
    public BirthCertificate Certificate { get; private set; }

    // محل تولد
    public long? BirthCityRegionId { get; private set; }
    public Region BirthCityRegion { get; private set; }

    public string OldNationalCardNumber { get; private set; }

}