using System;

// کلاس رویداد
public class PriceChangedEventArgs : EventArgs
{
    public decimal LastPrice { get; }
    public decimal NowPrice { get; }

    public PriceChangedEventArgs(decimal lastPrice, decimal nowPrice)
    {
        LastPrice = lastPrice;
        NowPrice = nowPrice;
    }
}

public class Broadcaster
{
    public event EventHandler<PriceChangedEventArgs> PriceChanged;
    private decimal price;

    public decimal Price
    {
        get => price;
        set
        {
            if (price == value) return; //exit if nothing has changed     
            var args = new PriceChangedEventArgs(price, value);
            price = value;
            PriceChanged?.Invoke(this, args); //fire event   
        }
    }
}

public class Subscriber

{
    private readonly string filePath = Path.Combine(AppDomain.CurrentDomain.BaseDirectory, "PriceChangeLog.txt");

    public void OnPriceChanged(object sender, PriceChangedEventArgs e)
    {
        string message = $"Price changed from {e.LastPrice} to {e.NowPrice}";

        Console.WriteLine($"Price changed from {e.LastPrice} to {e.NowPrice}");
        Console.WriteLine(message);
        File.AppendAllText(filePath, message + "\n"); // ذخیره در فایل
    }
}

public class Program
{
    public static void Main()
    {
        Broadcaster b = new();
        Subscriber s = new();
        b.PriceChanged += s.OnPriceChanged;
        b.Price = 9;
    }
}
