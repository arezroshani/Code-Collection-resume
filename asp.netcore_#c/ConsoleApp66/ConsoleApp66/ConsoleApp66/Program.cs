using System;
using System.Collections.Generic;


var intervals = new List<Interval>                        //ساخت لیستی از آبجکت‌های کلاس Interval
{
    new Interval(1, 3),
    new Interval(2, 6),
    new Interval(8, 10),
    new Interval(15, 18)
};

var merged = MergeIntervals(intervals);             //  فراخوانی متد ادغام


Console.WriteLine("Baze nahaei:");          // چاپ خروجی

foreach (var interval in merged)                //چاپ بازه های نهایی بعد از ادغام 
{
    Console.WriteLine(interval);
}



List<Interval> MergeIntervals(List<Interval> intervals)            //ورودی لیستی از بازه‌هایی که بررسی و ادغام می شوند است 
{
    if (intervals == null || intervals.Count == 0)          //"اگه هیچ بازه‌ای برای بررسی وجود نداره، یه لیست خالی بده بیرون.
        return new List<Interval>();

    intervals.Sort((a, b) => a.Start.CompareTo(b.Start));

    var merged = new List<Interval>();          // لیستی برای ذخیره‌ی بازه‌های نهایی
    var current = intervals[0];           // بازه‌ی اول رو به عنوان بازه فعلی انتخاب می‌کنیم


    for (int i = 1; i < intervals.Count; i++)            //حلقه برای بررسی همپوشانی بازه فعلی با بعدی
    {
        var next = intervals[i];              // بازه بعدی که می‌خوایم بررسی کنیم

        if (current.End >= next.Start)                         // اگر هم‌پوشانی وجود داشته باشه
        {
            current.End = Math.Max(current.End, next.End);                     // ادغام: پایان بازه رو بزرگ‌تر می‌کنیم
        }
        else
        {
            merged.Add(current);                      // اگر هم‌پوشانی نداشت، بازه فعلی رو ذخیره کن
            current = next;                       // و بازه بعدی رو به عنوان بازه فعلی قرار بده
        }
    }

    merged.Add(current);          // آخرین بازه رو هم اضافه می‌کنیم ، ممکنه جا مونده باشه
    return merged;             // لیست نهایی بازه‌ها رو برمی‌گردونیم
}


class Interval
{
    public int Start { get; set; }               // مقدار شروع بازه
    public int End { get; set; }             // مقدار پایان بازه

    public Interval(int start, int end)         // سازنده
    {
        Start = start;
        End = end;
    }

    public override string ToString()           // متد برای نمایش خروجی به صورت بازه
    {
        return $"[{Start}, {End}]";
    }
}

