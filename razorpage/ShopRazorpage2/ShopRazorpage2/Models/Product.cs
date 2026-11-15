using System;
using System.Collections.Generic;
using System.ComponentModel.DataAnnotations;

namespace ShopRazorpage2.Models
{
    public class Product
    {
        public int Id { get; set; }

        [Required, StringLength(150)]
        public string Name { get; set; } = "";

        // slug generated on Add
        public string Slug { get; set; } = "";

        [Range(0, double.MaxValue)]
        public decimal Price { get; set; }

        public string Description { get; set; } = "";

        public string ImageUrl { get; set; } = "";

        [Required]
        public string Category { get; set; } = "";

        // برای تخفیف: اگر true باشه و DiscountPrice مقدار داشته باشه، تخفیف اعمال میشه
        public bool IsDiscounted { get; set; } = false;

        [Range(0, double.MaxValue)]
        public decimal? DiscountPrice { get; set; } = null;

        // لیست نظرات محصول
        public List<Review> Reviews { get; set; } = new List<Review>();

        // ---- محاسبات کمکی ----
        // قیمت واحد که باید در سبد استفاده شود (قیمت بعد از تخفیف یا قیمت اصلی)
        public decimal UnitPrice => IsDiscounted && DiscountPrice.HasValue ? DiscountPrice.Value : Price;

        // مبلغ تخفیف به ازای هر واحد (مثلاً 20k)
        public decimal DiscountAmountPerUnit => IsDiscounted && DiscountPrice.HasValue ? Price - DiscountPrice.Value : 0m;

        // درصد تخفیف (مثال: 20 => 20%)
        public int? DiscountPercent
        {
            get
            {
                if (IsDiscounted && DiscountPrice.HasValue && Price > 0)
                {
                    return (int)Math.Round((Price - DiscountPrice.Value) / Price * 100m);
                }
                return null;
            }
        }
    }
}
