using System;
using System.Collections.Generic;
using Microsoft.EntityFrameworkCore;


namespace PersonsBasicInfoApi.Persistence.EF;


public partial class PersonsDbContext : DbContext
{
    public PersonsDbContext()
    {
    }

    public PersonsDbContext(DbContextOptions<PersonsDbContext> options)
        : base(options)
    {
    }

    public virtual DbSet<DimCompany> DimCompanies { get; set; }

    public virtual DbSet<DimCompanyDecision> DimCompanyDecisions { get; set; }

    public virtual DbSet<DimCompanyGazzet> DimCompanyGazzets { get; set; }

    public virtual DbSet<DimCompanyHistory> DimCompanyHistories { get; set; }

    public virtual DbSet<DimCompanyObjectState> DimCompanyObjectStates { get; set; }

    public virtual DbSet<DimCompanyRegistrationOrgan> DimCompanyRegistrationOrgans { get; set; }

    public virtual DbSet<DimCompanyRelation> DimCompanyRelations { get; set; }

    public virtual DbSet<DimCompanyType> DimCompanyTypes { get; set; }

    public virtual DbSet<DimForeignerPerson> DimForeignerPeople { get; set; }

    public virtual DbSet<DimIdentityDocType> DimIdentityDocTypes { get; set; }

    public virtual DbSet<DimLocation> DimLocations { get; set; }

    public virtual DbSet<DimLocationType> DimLocationTypes { get; set; }

    public virtual DbSet<DimNationality> DimNationalities { get; set; }

    public virtual DbSet<DimPerson> DimPeople { get; set; }

    protected override void OnConfiguring(DbContextOptionsBuilder optionsBuilder)
#warning To protect potentially sensitive information in your connection string, you should move it out of source code. You can avoid scaffolding the connection string by using the Name= syntax to read it from configuration - see https://go.microsoft.com/fwlink/?linkid=2131148. For more guidance on storing connection strings, see https://go.microsoft.com/fwlink/?LinkId=723263.
        => optionsBuilder.UseSqlServer("Server=.;Database=PersonsBasicInfoAPI;Trusted_Connection=True;TrustServerCertificate=True");

    protected override void OnModelCreating(ModelBuilder modelBuilder)
    {
        modelBuilder.Entity<DimCompany>(entity =>
        {
            entity.HasKey(e => e.KeyId);

            entity.ToTable("DimCompany");

            entity.Property(e => e.KeyId).ValueGeneratedNever();
            entity.Property(e => e.ActivityEndDateShamsi)
                .HasMaxLength(10)
                .IsUnicode(false);
            entity.Property(e => e.CityRegionDescription).HasMaxLength(50);
            entity.Property(e => e.CompanyDecisionDescription).HasMaxLength(50);
            entity.Property(e => e.CompanyDissolutionDate)
                .HasMaxLength(10)
                .IsUnicode(false);
            entity.Property(e => e.CompanyId).HasColumnName("CompanyID");
            entity.Property(e => e.CompanyName).HasMaxLength(250);
            entity.Property(e => e.CompanyNationalCode).HasMaxLength(20);
            entity.Property(e => e.CompanyObjectStateDescription).HasMaxLength(50);
            entity.Property(e => e.CompanyRegistrationOrganDescription).HasMaxLength(100);
            entity.Property(e => e.CompanyTypeDescription).HasMaxLength(150);
            entity.Property(e => e.CorrectCompanyId).HasColumnName("CorrectCompanyID");
            entity.Property(e => e.CorrectCompanyNationalCode).HasMaxLength(20);
            entity.Property(e => e.CurrencyTypeDescription).HasMaxLength(50);
            entity.Property(e => e.GazetteActivity).HasMaxLength(500);
            entity.Property(e => e.GazetteSignatureAuthority).HasMaxLength(500);
            entity.Property(e => e.IssuanceDateShamsi)
                .HasMaxLength(10)
                .IsUnicode(false);
            entity.Property(e => e.ManagerNationalCode).HasMaxLength(20);
            entity.Property(e => e.ParentCompanyNationalCode).HasMaxLength(30);
            entity.Property(e => e.RegisterDateShamsi)
                .HasMaxLength(10)
                .IsUnicode(false);
            entity.Property(e => e.RegisterNumber).HasMaxLength(20);
            entity.Property(e => e.ValidityEndDate)
                .HasMaxLength(10)
                .IsUnicode(false);

            entity.HasOne(d => d.CompanyDecision).WithMany(p => p.DimCompanies)
                .HasForeignKey(d => d.CompanyDecisionId)
                .HasConstraintName("FK_DimCompany_DimCompanyDecision");

            entity.HasOne(d => d.CompanyRegistrationOrgan).WithMany(p => p.DimCompanies)
                .HasForeignKey(d => d.CompanyRegistrationOrganId)
                .HasConstraintName("FK_DimCompany_DimCompanyRegistrationOrgan");

            entity.HasOne(d => d.CompanyType).WithMany(p => p.DimCompanies)
                .HasForeignKey(d => d.CompanyTypeId)
                .HasConstraintName("FK_DimCompany_DimCompanyType");
        });

        modelBuilder.Entity<DimCompanyDecision>(entity =>
        {
            entity.HasKey(e => e.CompanyDecisionId);

            entity.ToTable("DimCompanyDecision");

            entity.Property(e => e.CompanyDecisionId)
                .ValueGeneratedNever()
                .HasColumnName("CompanyDecisionID");
            entity.Property(e => e.CompanyDecisionCode)
                .HasMaxLength(5)
                .IsUnicode(false);
            entity.Property(e => e.CompanyDecisionDescription).HasMaxLength(50);
        });

        modelBuilder.Entity<DimCompanyGazzet>(entity =>
        {
            entity.HasKey(e => e.GazetteId).HasName("PK__DimCompa__24AE5F9B6746DC65");

            entity.ToTable("DimCompanyGazzet");

            entity.Property(e => e.GazetteId)
                .ValueGeneratedNever()
                .HasColumnName("GazetteID");
            entity.Property(e => e.CompanyAddress).HasMaxLength(300);
            entity.Property(e => e.CompanyCompareName).HasMaxLength(200);
            entity.Property(e => e.CompanyInvestment).HasMaxLength(80);
            entity.Property(e => e.CompanyLifeTime).HasMaxLength(50);
            entity.Property(e => e.CompanyName).HasMaxLength(200);
            entity.Property(e => e.CompanyNationalCode).HasMaxLength(12);
            entity.Property(e => e.CompanyNewCompareName).HasMaxLength(200);
            entity.Property(e => e.CompanyNewName).HasMaxLength(200);
            entity.Property(e => e.CompanyNewNationalCode).HasMaxLength(14);
            entity.Property(e => e.CompanyNewRegisterNumber).HasMaxLength(30);
            entity.Property(e => e.CompanyNewSearchName).HasMaxLength(200);
            entity.Property(e => e.CompanyNewspaper).HasMaxLength(150);
            entity.Property(e => e.CompanyPostalCode).HasMaxLength(15);
            entity.Property(e => e.CompanyRegisterNumber).HasMaxLength(40);
            entity.Property(e => e.CompanySearchName).HasMaxLength(200);
            entity.Property(e => e.CompanyTypeId).HasColumnName("CompanyTypeID");
            entity.Property(e => e.GazetteDb).HasColumnName("GazetteDB");
            entity.Property(e => e.GazetteNumber).HasMaxLength(300);
            entity.Property(e => e.GazetteSource).HasMaxLength(500);
            entity.Property(e => e.GazetteSourceNumber).HasMaxLength(300);
            entity.Property(e => e.GazetteTitle).HasMaxLength(550);
            entity.Property(e => e.GazetteTypeId).HasColumnName("GazetteTypeID");
            entity.Property(e => e.InternalModifiedDate).HasPrecision(0);
            entity.Property(e => e.InvestmentCurrencyTypeId).HasColumnName("InvestmentCurrencyTypeID");
            entity.Property(e => e.NewsPaperCityType).HasMaxLength(50);
            entity.Property(e => e.NewsPaperNumber).HasMaxLength(300);
            entity.Property(e => e.NewsPaperPageNumber).HasMaxLength(10);
            entity.Property(e => e.Proceedings).HasMaxLength(300);
            entity.Property(e => e.RrklinkId).HasColumnName("RRKLinkID");
            entity.Property(e => e.ShortGazetteBody).HasMaxLength(320);

            entity.HasOne(d => d.Company).WithMany(p => p.DimCompanyGazzets)
                .HasForeignKey(d => d.CompanyId)
                .HasConstraintName("FK_DimCompanyGazzet_DimCompany");
        });

        modelBuilder.Entity<DimCompanyHistory>(entity =>
        {
            entity.HasKey(e => e.KeyId).HasName("PK__DimCompa__21F5BE47B3CB39EE");

            entity.ToTable("DimCompanyHistory");

            entity.Property(e => e.KeyId).ValueGeneratedNever();
            entity.Property(e => e.AgentPostalCode).HasMaxLength(100);
            entity.Property(e => e.ChildChanges).HasMaxLength(100);
            entity.Property(e => e.CompanyHistoryId).HasColumnName("CompanyHistoryID");
            entity.Property(e => e.CompanyId).HasColumnName("CompanyID");
            entity.Property(e => e.CompanyInvestment).HasMaxLength(100);
            entity.Property(e => e.CompanyLocation).HasMaxLength(500);
            entity.Property(e => e.CompanyName).HasMaxLength(250);
            entity.Property(e => e.CompanyObjectStateId).HasColumnName("CompanyObjectStateID");
            entity.Property(e => e.CompanyPostalCode).HasMaxLength(100);
            entity.Property(e => e.CompanySubject).HasMaxLength(4000);
            entity.Property(e => e.CorrectCompanyNationalCode)
                .HasMaxLength(50)
                .IsUnicode(false);
            entity.Property(e => e.FinalCompanyName).HasMaxLength(250);
            entity.Property(e => e.FinishDateTime)
                .HasMaxLength(10)
                .IsUnicode(false);
            entity.Property(e => e.LogDate).HasColumnType("datetime");
            entity.Property(e => e.NewGazet).HasMaxLength(100);
            entity.Property(e => e.ParentChanges).HasMaxLength(100);
            entity.Property(e => e.PersonPostId).HasColumnName("PersonPostID");
            entity.Property(e => e.PersonPostIds)
                .HasMaxLength(100)
                .HasColumnName("PersonPostIDs");
            entity.Property(e => e.PersonSignatureStateId).HasColumnName("PersonSignatureStateID");
            entity.Property(e => e.PostalCode).HasMaxLength(100);
            entity.Property(e => e.StartDateTime)
                .HasMaxLength(10)
                .IsUnicode(false);

            entity.HasOne(d => d.CompanyKey).WithMany(p => p.DimCompanyHistories)
                .HasForeignKey(d => d.CompanyKeyId)
                .HasConstraintName("FK_DimCompanyHistory_DimCompany");

            entity.HasOne(d => d.CompanyObjectState).WithMany(p => p.DimCompanyHistories)
                .HasForeignKey(d => d.CompanyObjectStateId)
                .HasConstraintName("FK_DimCompanyHistory_DimCompanyObjectState");
        });

        modelBuilder.Entity<DimCompanyObjectState>(entity =>
        {
            entity.HasKey(e => e.CompanyObjectStateId).HasName("PK__DimCompa__257336380533E409");

            entity.ToTable("DimCompanyObjectState");

            entity.Property(e => e.CompanyObjectStateId)
                .ValueGeneratedNever()
                .HasColumnName("CompanyObjectStateID");
            entity.Property(e => e.CompanyObjectStateCode)
                .HasMaxLength(6)
                .IsUnicode(false);
            entity.Property(e => e.CompanyObjectStateDescription).HasMaxLength(20);
            entity.Property(e => e.CreationDateTime).HasColumnType("datetime");
        });

        modelBuilder.Entity<DimCompanyRegistrationOrgan>(entity =>
        {
            entity.HasKey(e => e.CompanyRegistrationOrganId).HasName("PK__DimCompa__875855637C7B2473");

            entity.ToTable("DimCompanyRegistrationOrgan");

            entity.Property(e => e.CompanyRegistrationOrganId).ValueGeneratedNever();
            entity.Property(e => e.CompanyRegistrationOrganCode).HasMaxLength(20);
            entity.Property(e => e.CompanyRegistrationOrganName).HasMaxLength(100);
        });

        modelBuilder.Entity<DimCompanyRelation>(entity =>
        {
            entity.HasKey(e => e.CompanyRelationId).HasName("PK__DimCompa__B76A507C3CD99C7F");

            entity.ToTable("DimCompanyRelation");

            entity.Property(e => e.CompanyRelationId).ValueGeneratedNever();
            entity.Property(e => e.AgentEndDate)
                .HasMaxLength(10)
                .IsUnicode(false);
            entity.Property(e => e.AgentStartDate)
                .HasMaxLength(10)
                .IsUnicode(false);
            entity.Property(e => e.EndDateValidity)
                .HasMaxLength(10)
                .IsUnicode(false);
            entity.Property(e => e.Lastdate).HasColumnType("datetime");
            entity.Property(e => e.NotExistFullName).HasMaxLength(100);
            entity.Property(e => e.PersonAttendanceStatusDesc).HasMaxLength(100);
            entity.Property(e => e.PersonDurationTypeId).HasColumnName("PersonDurationTypeID");
            entity.Property(e => e.PersonPostDesc).HasMaxLength(100);
            entity.Property(e => e.PersonSignatureStateDesc).HasMaxLength(100);
            entity.Property(e => e.PersonStateDesc).HasMaxLength(100);
            entity.Property(e => e.PersonTypeDesc).HasMaxLength(10);
            entity.Property(e => e.PositionEndDate)
                .HasMaxLength(10)
                .IsUnicode(false);
            entity.Property(e => e.PositionStartDate)
                .HasMaxLength(10)
                .IsUnicode(false);
            entity.Property(e => e.RelCode).HasMaxLength(30);

            entity.HasOne(d => d.CompanyKey).WithMany(p => p.DimCompanyRelations)
                .HasForeignKey(d => d.CompanyKeyId)
                .HasConstraintName("FK_DimCompanyRelation_DimCompany");
        });

        modelBuilder.Entity<DimCompanyType>(entity =>
        {
            entity.HasKey(e => e.CompanyTypeId).HasName("PK__DimCompa__0601993878C30CFD");

            entity.ToTable("DimCompanyType");

            entity.Property(e => e.CompanyTypeId)
                .ValueGeneratedNever()
                .HasColumnName("CompanyTypeID");
            entity.Property(e => e.CompanyTypeDescription).HasMaxLength(100);
            entity.Property(e => e.ParentCompanyTypeId).HasColumnName("ParentCompanyTypeID");

            entity.HasOne(d => d.ParentCompanyType).WithMany(p => p.InverseParentCompanyType)
                .HasForeignKey(d => d.ParentCompanyTypeId)
                .HasConstraintName("FK_DimCompanyType_DimCompanyType");
        });

        modelBuilder.Entity<DimForeignerPerson>(entity =>
        {
            entity.HasKey(e => e.KeyId).HasName("PK__DimForei__21F5BE477E4F0A39");

            entity.ToTable("DimForeignerPerson");

            entity.Property(e => e.KeyId).ValueGeneratedNever();
            entity.Property(e => e.AncestorName).HasMaxLength(50);
            entity.Property(e => e.IdentityCode)
                .HasMaxLength(50)
                .IsUnicode(false);
            entity.Property(e => e.IdentityCode2).HasMaxLength(30);
            entity.Property(e => e.IdentityDocNumber)
                .HasMaxLength(50)
                .IsUnicode(false);
            entity.Property(e => e.InsertTime)
                .HasMaxLength(10)
                .IsUnicode(false);
            entity.Property(e => e.LastDate).HasColumnType("datetime");
            entity.Property(e => e.LatinFatherName).HasMaxLength(50);
            entity.Property(e => e.LatinFirstName).HasMaxLength(50);
            entity.Property(e => e.LatinLastName).HasMaxLength(50);
            entity.Property(e => e.PersianFatherName).HasMaxLength(150);
            entity.Property(e => e.PersianFirstName).HasMaxLength(150);
            entity.Property(e => e.PersianLastName).HasMaxLength(150);
            entity.Property(e => e.SourceId).HasColumnName("SourceID");

            entity.HasOne(d => d.BirthCity).WithMany(p => p.DimForeignerPersonBirthCities)
                .HasForeignKey(d => d.BirthCityId)
                .HasConstraintName("FK_DimForeignerPerson_BirthCity");

            entity.HasOne(d => d.BirthCountry).WithMany(p => p.DimForeignerPersonBirthCountries)
                .HasForeignKey(d => d.BirthCountryId)
                .HasConstraintName("FK_DimForeignerPerson_BirthCountry");

            entity.HasOne(d => d.IdentityDocType).WithMany(p => p.DimForeignerPeople)
                .HasForeignKey(d => d.IdentityDocTypeId)
                .HasConstraintName("FK_DimForeignerPerson_DimIdentityDocType");

            entity.HasOne(d => d.Nationality).WithMany(p => p.DimForeignerPeople)
                .HasForeignKey(d => d.NationalityId)
                .HasConstraintName("FK_DimForeignerPerson_DimNationality");
        });

        modelBuilder.Entity<DimIdentityDocType>(entity =>
        {
            entity.HasKey(e => e.IdentityDocTypeId).HasName("PK__DimIdent__71C6EC85D2D82554");

            entity.ToTable("DimIdentityDocType");

            entity.Property(e => e.IdentityDocTypeId).ValueGeneratedNever();
            entity.Property(e => e.IdentityDocTypeName).HasMaxLength(50);
            entity.Property(e => e.LastDate).HasColumnType("datetime");
        });

        modelBuilder.Entity<DimLocation>(entity =>
        {
            entity.HasKey(e => e.LocationId).HasName("PK__DimLocat__E7FEA497EA6B53D5");

            entity.ToTable("DimLocation");

            entity.Property(e => e.LocationId).ValueGeneratedNever();
            entity.Property(e => e.LastDate).HasColumnType("datetime");
            entity.Property(e => e.LocationLatinName).HasMaxLength(150);
            entity.Property(e => e.LocationName).HasMaxLength(150);

            entity.HasOne(d => d.LocationParent).WithMany(p => p.InverseLocationParent)
                .HasForeignKey(d => d.LocationParentId)
                .HasConstraintName("FK_DimLocation_DimLocation");

            entity.HasOne(d => d.LocationType).WithMany(p => p.DimLocations)
                .HasForeignKey(d => d.LocationTypeId)
                .OnDelete(DeleteBehavior.ClientSetNull)
                .HasConstraintName("FK_DimLocation_DimLocationType");
        });

        modelBuilder.Entity<DimLocationType>(entity =>
        {
            entity.HasKey(e => e.LocationTypeId).HasName("PK__DimLocat__737D32F92B90C290");

            entity.ToTable("DimLocationType");

            entity.Property(e => e.LocationTypeId).ValueGeneratedNever();
            entity.Property(e => e.LastDate).HasColumnType("datetime");
            entity.Property(e => e.LocationTypeName).HasMaxLength(50);
        });

        modelBuilder.Entity<DimNationality>(entity =>
        {
            entity.HasKey(e => e.NationalityId).HasName("PK__DimNatio__F628E744C26459C3");

            entity.ToTable("DimNationality");

            entity.Property(e => e.NationalityId).ValueGeneratedNever();
            entity.Property(e => e.NationalityLatinName).HasMaxLength(50);
            entity.Property(e => e.NationalityName).HasMaxLength(50);
        });

        modelBuilder.Entity<DimPerson>(entity =>
        {
            entity.HasKey(e => e.KeyId).HasName("PK__DimPerso__21F5BE47C4122E72");

            entity.ToTable("DimPerson");

            entity.Property(e => e.KeyId).ValueGeneratedNever();
            entity.Property(e => e.BirthDate)
                .HasMaxLength(10)
                .IsUnicode(false);
            entity.Property(e => e.CertSerial)
                .HasMaxLength(50)
                .IsUnicode(false);
            entity.Property(e => e.CertSeries).HasMaxLength(20);
            entity.Property(e => e.CertificateNo).HasMaxLength(20);
            entity.Property(e => e.DeathDate)
                .HasMaxLength(10)
                .IsUnicode(false);
            entity.Property(e => e.FatherName).HasMaxLength(100);
            entity.Property(e => e.FatherNc)
                .HasMaxLength(20)
                .IsUnicode(false)
                .HasColumnName("FatherNC");
            entity.Property(e => e.FirstName).HasMaxLength(100);
            entity.Property(e => e.Idcard)
                .HasMaxLength(100)
                .HasColumnName("IDCard");
            entity.Property(e => e.LastDate).HasColumnType("datetime");
            entity.Property(e => e.LastName).HasMaxLength(100);
            entity.Property(e => e.MotherName).HasMaxLength(100);
            entity.Property(e => e.MotherNc)
                .HasMaxLength(20)
                .IsUnicode(false)
                .HasColumnName("MotherNC");
            entity.Property(e => e.NationalCode)
                .HasMaxLength(50)
                .IsUnicode(false);
            entity.Property(e => e.NationalCode2)
                .HasMaxLength(20)
                .IsUnicode(false);

            entity.HasOne(d => d.BirthLocation).WithMany(p => p.DimPersonBirthLocations)
                .HasForeignKey(d => d.BirthLocationId)
                .HasConstraintName("FK_DimPerson_BirthLocation");

            entity.HasOne(d => d.IssueLocation).WithMany(p => p.DimPersonIssueLocations)
                .HasForeignKey(d => d.IssueLocationId)
                .HasConstraintName("FK_DimPerson_IssueLocation");
        });

        OnModelCreatingPartial(modelBuilder);
    }

    partial void OnModelCreatingPartial(ModelBuilder modelBuilder);
}
