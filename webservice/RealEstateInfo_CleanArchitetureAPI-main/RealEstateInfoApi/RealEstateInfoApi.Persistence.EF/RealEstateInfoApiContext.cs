using Microsoft.EntityFrameworkCore;
using RealEstateInfoApi.Domain.Entities.properties;
using RealEstateInfoApi.Domain.Entities.Persons;



namespace RealEstateInfoApi.Persistence.EF;

public partial class RealEstateInfoApiContext : DbContext
{
    public RealEstateInfoApiContext()
    {
    }

    public RealEstateInfoApiContext(DbContextOptions<RealEstateInfoApiContext> options)
        : base(options)
    {
    }

    public virtual DbSet<Person> Persons { get; set; }
    public virtual DbSet<Property> Properties { get; set; }
    public virtual DbSet<PropertyType> PropertyTypes { get; set; }
 
    public virtual DbSet<DimDate> DimDates { get; set; }

    public virtual DbSet<DimJobTitle> DimJobTitles { get; set; }


    public virtual DbSet<DimPersonType> DimPersonTypes { get; set; }

    

    public virtual DbSet<DimPropertyUsage> DimPropertyUsages { get; set; }

    public virtual DbSet<DimRegion> DimRegions { get; set; }

    public virtual DbSet<DimRegionType> DimRegionTypes { get; set; }

    public virtual DbSet<DimRegistrationArea> DimRegistrationAreas { get; set; }

    public virtual DbSet<DimRegistrationSection> DimRegistrationSections { get; set; }


    public virtual DbSet<TblInnerSource> TblInnerSources { get; set; }

    protected override void OnConfiguring(DbContextOptionsBuilder optionsBuilder)
        => optionsBuilder.UseSqlServer("Name=ConnectionStrings:DefaultConnection");

    protected override void OnModelCreating(ModelBuilder modelBuilder)
    {
        modelBuilder.ApplyConfigurationsFromAssembly(typeof(RealEstateInfoApiContext).Assembly);
        modelBuilder.Entity<DimDate>(entity =>
        {
            entity
                .HasNoKey()
                .ToTable("DimDate");

            entity.Property(e => e.MiladiDateName).HasMaxLength(50);
            entity.Property(e => e.MonthName).HasMaxLength(50);
            entity.Property(e => e.ShamsiDate).HasMaxLength(10);
        });

        modelBuilder.Entity<DimJobTitle>(entity =>
        {
            entity.HasKey(e => e.JobTitleId).HasName("PK__DimJobTi__35382FE98E48D399");

            entity.ToTable("DimJobTitle");

            entity.Property(e => e.JobTitleId).ValueGeneratedNever();
            entity.Property(e => e.IscoCode).HasMaxLength(50);
            entity.Property(e => e.Title).HasMaxLength(100);
        });

        //modelBuilder.Entity<DimPerson>(entity =>
        //{
        //    entity.HasKey(e => e.PersonId).HasName("PK__DimPerso__AA2FFBE5ACDE3341");

        //    entity.ToTable("DimPerson");

        //    entity.Property(e => e.PersonId).ValueGeneratedNever();
        //    entity.Property(e => e.BirthCertificateNo).HasMaxLength(30);
        //    entity.Property(e => e.FatherName).HasMaxLength(50);
        //    entity.Property(e => e.FirstName).HasMaxLength(500);
        //    entity.Property(e => e.LastName).HasMaxLength(150);
        //    entity.Property(e => e.NationalCode).HasMaxLength(20);
        //    entity.Property(e => e.NationalCode2).HasMaxLength(20);
        //    entity.Property(e => e.PhoneNumber).HasMaxLength(50);

        //    entity.HasOne(d => d.InnerSource).WithMany(p => p.DimPeople)
        //        .HasForeignKey(d => d.InnerSourceId)
        //        .OnDelete(DeleteBehavior.ClientSetNull)
        //        .HasConstraintName("FK_Person_InnerSource");

        //    entity.HasOne(d => d.JobTitle).WithMany(p => p.DimPeople)
        //        .HasForeignKey(d => d.JobTitleId)
        //        .HasConstraintName("FK_Person_JobTitle");

        //    entity.HasOne(d => d.PersonType).WithMany(p => p.DimPeople)
        //        .HasForeignKey(d => d.PersonTypeId)
        //        .HasConstraintName("FK_Person_PersonType");
        //});

        modelBuilder.Entity<DimPersonType>(entity =>
        {
            entity.HasKey(e => e.PersonTypeId).HasName("PK__DimPerso__D95DCAFD17334401");

            entity.ToTable("DimPersonType");

            entity.Property(e => e.PersonTypeId).ValueGeneratedNever();
            entity.Property(e => e.Title).HasMaxLength(50);
        });

        //modelBuilder.Entity<DimProperty>(entity =>
        //{
        //    entity.HasKey(e => e.PropertyId).HasName("PK__DimPrope__70C9A735BBFE6B95");

        //    entity.ToTable("DimProperty");

        //    entity.Property(e => e.PropertyId).ValueGeneratedNever();
        //    entity.Property(e => e.Address).HasMaxLength(1000);
        //    entity.Property(e => e.Area).HasColumnType("decimal(20, 3)");
        //    entity.Property(e => e.FloorNo).HasMaxLength(20);
        //    entity.Property(e => e.Latitude).HasMaxLength(20);
        //    entity.Property(e => e.Longitude).HasMaxLength(20);
        //    entity.Property(e => e.PostCode).HasMaxLength(20);
        //    entity.Property(e => e.PrimaryRegistrationPlaque).HasMaxLength(20);
        //    entity.Property(e => e.SecondaryRegistrationPlaque).HasMaxLength(20);

        //    entity.HasOne(d => d.InnerSource).WithMany(p => p.DimProperties)
        //        .HasForeignKey(d => d.InnerSourceId)
        //        .HasConstraintName("FK_Property_InnerSource");

        //    entity.HasOne(d => d.PropertyType).WithMany(p => p.DimProperties)
        //        .HasForeignKey(d => d.PropertyTypeId)
        //        .HasConstraintName("FK_Property_PropertyType");

        //    entity.HasOne(d => d.PropertyUsage).WithMany(p => p.DimProperties)
        //        .HasForeignKey(d => d.PropertyUsageId)
        //        .HasConstraintName("FK_Property_PropertyUsage");

        //    entity.HasOne(d => d.RegistrationSection).WithMany(p => p.DimProperties)
        //        .HasForeignKey(d => d.RegistrationSectionId)
        //        .HasConstraintName("FK_Property_RegistrationSection");
        //});

        //modelBuilder.Entity<DimPropertyType>(entity =>
        //{
        //    entity.HasKey(e => e.PropertyTypeId).HasName("PK__DimPrope__BDE14DB449D3A281");

        //    entity.ToTable("DimPropertyType");

        //    entity.Property(e => e.Title).HasMaxLength(50);
        //});

        modelBuilder.Entity<DimPropertyUsage>(entity =>
        {
            entity.HasKey(e => e.PropertyUsageId);

            entity.ToTable("DimPropertyUsage");

            entity.Property(e => e.Title).HasMaxLength(50);
        });

        modelBuilder.Entity<DimRegion>(entity =>
        {
            entity.HasKey(e => e.RegionId).HasName("PK__DimRegio__ACD844A32B131CD5");

            entity.ToTable("DimRegion");

            entity.Property(e => e.RegionId).ValueGeneratedNever();
            entity.Property(e => e.Code)
                .HasMaxLength(20)
                .IsUnicode(false);
            entity.Property(e => e.CreateTime).HasColumnType("datetime");
            entity.Property(e => e.NationalCode)
                .HasMaxLength(50)
                .IsUnicode(false);
            entity.Property(e => e.Path).HasMaxLength(1000);
            entity.Property(e => e.Title).HasMaxLength(75);

            entity.HasOne(d => d.ParentRegion).WithMany(p => p.InverseParentRegion)
                .HasForeignKey(d => d.ParentRegionId)
                .HasConstraintName("FK_Region_ParentRegion");

            entity.HasOne(d => d.RegionType).WithMany(p => p.DimRegions)
                .HasForeignKey(d => d.RegionTypeId)
                .OnDelete(DeleteBehavior.ClientSetNull)
                .HasConstraintName("FK_Region_RegionType");
        });

        modelBuilder.Entity<DimRegionType>(entity =>
        {
            entity.HasKey(e => e.RegionTypeId).HasName("PK__DimRegio__E7CC170BC844F1F0");

            entity.ToTable("DimRegionType");

            entity.Property(e => e.Title).HasMaxLength(50);
        });

        modelBuilder.Entity<DimRegistrationArea>(entity =>
        {
            entity.HasKey(e => e.RegistrationAreaId);

            entity.ToTable("DimRegistrationArea");

            entity.Property(e => e.RegistrationAreaId).ValueGeneratedNever();
            entity.Property(e => e.EstateRegistrationOrganizationCode)
                .HasMaxLength(50)
                .IsUnicode(false);
            entity.Property(e => e.Title).HasMaxLength(50);
        });

        modelBuilder.Entity<DimRegistrationSection>(entity =>
        {
            entity.HasKey(e => e.RegistrationSectionId);

            entity.ToTable("DimRegistrationSection");

            entity.Property(e => e.RegistrationSectionId).ValueGeneratedNever();
            entity.Property(e => e.EstateRegistrationOrganizationCode).HasMaxLength(50);
            entity.Property(e => e.Title).HasMaxLength(50);

            entity.HasOne(d => d.RegistrationArea).WithMany(p => p.DimRegistrationSections)
                .HasForeignKey(d => d.RegistrationAreaId)
                .OnDelete(DeleteBehavior.ClientSetNull)
                .HasConstraintName("FK_Section_Area");
        });

        //modelBuilder.Entity<FactResident>(entity =>
        //{
        //    entity
        //        .HasNoKey()
        //        .ToTable("FactResident");

        //    entity.HasOne(d => d.InnerSource).WithMany()
        //        .HasForeignKey(d => d.InnerSourceId)
        //        .HasConstraintName("FK_Resident_InnerSource");

        //    entity.HasOne(d => d.Property).WithMany()
        //        .HasForeignKey(d => d.PropertyId)
        //        .OnDelete(DeleteBehavior.ClientSetNull)
        //        .HasConstraintName("FK_Resident_Property");

        //    entity.HasOne(d => d.ResidentPerson).WithMany()
        //        .HasForeignKey(d => d.ResidentPersonId)
        //        .OnDelete(DeleteBehavior.ClientSetNull)
        //        .HasConstraintName("FK_Resident_Person");
        //});

        modelBuilder.Entity<TblInnerSource>(entity =>
        {
            entity.HasKey(e => e.InnerSourceId).HasName("PK__tblInner__88407092F44BB8F4");

            entity.ToTable("tblInnerSource");

            entity.Property(e => e.InnerSourceId).ValueGeneratedNever();
            entity.Property(e => e.SourceDescr).HasMaxLength(50);
        });

        OnModelCreatingPartial(modelBuilder);
    }

    partial void OnModelCreatingPartial(ModelBuilder modelBuilder);
}
