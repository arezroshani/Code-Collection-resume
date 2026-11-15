
using Microsoft.EntityFrameworkCore;
using Microsoft.EntityFrameworkCore.Metadata.Builders;
using RealEstateInfoApi.Domain.Entities.Persons;
using RealEstateInfoApi.Domain.ValueObjects.person;

namespace RealEstateInfoApi.Persistence.Configurations;

public class PersonConfiguration : IEntityTypeConfiguration<Person>
{
    public void Configure(EntityTypeBuilder<Person> builder)
    {
        builder.ToTable("DimPerson");

        builder.HasKey(p => p.Id);
        builder.Property(p => p.Id).HasColumnName("PersonId");

        builder.Property(p => p.NationalCode)
               .HasConversion(nc => nc.Value, val => NationalCode.Create(val).Value)
               .HasColumnName("NationalCode")
               .HasMaxLength(20)
               .IsRequired();

        builder.Property(p => p.NationalCode2)
               .HasConversion(
                   nc => nc != null ? nc.Value : null,
                   val => val != null ? NationalCode.Create(val).Value : null)
               .HasColumnName("NationalCode2")
               .HasMaxLength(20);

        builder.Property(p => p.FirstName).HasColumnName("FirstName");
        builder.Property(p => p.LastName).HasColumnName("LastName");

        builder.HasMany(p => p.Properties)
               .WithMany()
               .UsingEntity(j => j.ToTable("FactResident"));

        builder.Navigation(p => p.Properties)
               .UsePropertyAccessMode(PropertyAccessMode.Field)
               .HasField("_properties");
    }
}
