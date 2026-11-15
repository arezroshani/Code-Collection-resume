using Microsoft.EntityFrameworkCore;
using Microsoft.EntityFrameworkCore.Metadata.Builders;
using RealEstateInfoApi.Domain.Entities.properties;

namespace RealEstateInfoApi.Infrastructure.Presistance.Configurations.Properties;

public class PropertyTypeConfiguration : IEntityTypeConfiguration<PropertyType>
{
    public void Configure(EntityTypeBuilder<PropertyType> builder)
    {
        builder.ToTable("DimPropertyType");

        builder.HasKey(pt => pt.Id);
        builder.Property(pt => pt.Id)
            .HasColumnName("PropertyTypeId");

        // پراپرتی Name در کلاس ما، به ستون Title در دیتابیس نگاشت میشود
        builder.Property(pt => pt.Name)
            .HasColumnName("Title")
            .HasMaxLength(255)
            .IsRequired();
    }
}
