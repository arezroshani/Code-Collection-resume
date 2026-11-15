using System;

namespace ShopRazorpage2.Models
{
    public class Review
    {
        public string UserName { get; set; } = "";
        public int Stars { get; set; } = 5; // 1 تا 5
        public string Comment { get; set; } = "";
        public DateTime Date { get; set; } = DateTime.Now;
    }
}
