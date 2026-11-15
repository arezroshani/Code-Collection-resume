using System;
using System.Collections.Generic;

namespace RealEstateInfoApi.Persistence.EF;

public partial class DimDate
{
    public string ShamsiDate { get; set; } = null!;

    public int IntShamsiDate { get; set; }

    public DateOnly MiladiDate { get; set; }

    public string? MiladiDateName { get; set; }

    public short MiladiYear { get; set; }

    public byte QuarterNumber { get; set; }

    public string? MonthName { get; set; }

    public short DayOfYear { get; set; }

    public byte DayOfMonth { get; set; }

    public byte DayOfWeek { get; set; }

    public byte WeekOfYear { get; set; }

    public byte MonthOfYear { get; set; }

    public int? IntMiladiDate { get; set; }
}
