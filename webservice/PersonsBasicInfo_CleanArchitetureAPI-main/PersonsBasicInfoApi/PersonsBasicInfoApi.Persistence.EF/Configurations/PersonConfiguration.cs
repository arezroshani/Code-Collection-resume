using Microsoft.EntityFrameworkCore;
using Microsoft.EntityFrameworkCore.Metadata.Builders;
using PersonsBasicInfoApi.Domain.Entities.Persons;
using PersonsBasicInfoApi.Domain.ValueObjects.person;

namespace PersonsBasicInfoApi.Persistence.EF.Configurations;

public class PersonConfiguration : IEntityTypeConfiguration<Person>
{
    public void Configure(EntityTypeBuilder<Person> builder)
    {
        
        builder.ToTable("DimPerson");

        
        builder.HasKey(p => p.Id);
        builder.Property(p => p.Id).HasColumnName("PersonId");

     
        builder.Property(p => p.NationalCode)
               .HasConversion(
                   nc => nc.Value,
                   val => NationalCode.Create(val).Value)
               .HasColumnName("NationalCode")
               .HasMaxLength(10) 
               .IsRequired();

        
        builder.Property(p => p.NationalCode2)
               .HasConversion(
                   nc => nc != null ? nc.Value : null,
                   val => val != null ? NationalCode.Create(val).Value : null)
               .HasColumnName("NationalCode2")
               .HasMaxLength(10);

        
        builder.Property(p => p.FirstName)
               .HasColumnName("FirstName")
               .HasMaxLength(200);

        builder.Property(p => p.LastName)
               .HasColumnName("LastName")
               .HasMaxLength(200);

       
    }
}
