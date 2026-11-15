
using Microsoft.EntityFrameworkCore;
using Microsoft.EntityFrameworkCore.Metadata.Builders;
using RealEstateInfoApi.Domain.Entities.properties;
using RealEstateInfoApi.Domain.ValueObjects.Properties; 

namespace RealEstateInfoApi.Persistence.EF.Configurations;

public class PropertyConfiguration : IEntityTypeConfiguration<Property>
{
    public void Configure(EntityTypeBuilder<Property> builder)
    {
        builder.ToTable("DimProperty");

        builder.HasKey(p => p.Id);
        builder.Property(p => p.Id).HasColumnName("PropertyId");

        builder.Property(p => p.Area).HasColumnName("Area");

        builder.Property(p => p.Address)
     .HasConversion(
         address => address.ToString(),
         value => Address.Create(value.Split(',')[0], value.Split(',')[1], value.Split(',')[2]))
     .HasColumnName("Address");


        builder.Property(p => p.PropertyTypeId).HasColumnName("PropertyTypeId");

        builder.HasOne(p => p.PropertyType)
               .WithMany()
               .HasForeignKey(p => p.PropertyTypeId);

        // --- هشدار: عدم تطابق با دیتابیس ---
        // این پراپرتی ها در انتیتی دامین شما وجود دارند ولی در جدول DimProperty موجود نیستند.
        // EF Core به طور پیش فرض تلاش میکند آنها را بسازد.
        // با استفاده از Ignore به EF Core می گوییم که این پراپرتی ها را در نگاشت به دیتابیس نادیده بگیرد.
        builder.Ignore(p => p.Title);
        builder.Ignore(p => p.Description);
        builder.Ignore(p => p.TransactionTypeId);
        builder.Ignore(p => p.TransactionType);
    }


}
