namespace ShopRazorpage2.Models
{
    public class CartItem
    {
        public int ProductId { get; set; }
        public string Name { get; set; } = "";
        public decimal Price { get; set; }               // قیمت اصلی قبل از تخفیف
        public int Quantity { get; set; } = 1;           // مقدار پیش‌فرض 1
        public string ImageUrl { get; set; } = "";

        // وضعیت و قیمت تخفیف (اگر محصول تخفیف داشته باشد)
        public bool IsDiscounted { get; set; } = false;
        public decimal? DiscountPrice { get; set; } = null;

        // قیمت واحد واقعی برای محاسبه‌ها
        public decimal UnitPrice => IsDiscounted && DiscountPrice.HasValue ? DiscountPrice.Value : Price;

        // مجموع قیمت (قیمت واحد * تعداد)
        public decimal Total => UnitPrice * Quantity;

        // کل مبلغ تخفیف برای این آیتم (اگر تخفیف موجود باشد)
        public decimal TotalDiscount => (IsDiscounted && DiscountPrice.HasValue) ? (Price - DiscountPrice.Value) * Quantity : 0m;
    }
}
