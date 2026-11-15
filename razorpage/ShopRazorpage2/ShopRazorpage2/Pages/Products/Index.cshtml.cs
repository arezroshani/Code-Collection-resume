using Microsoft.AspNetCore.Mvc;
using Microsoft.AspNetCore.Mvc.RazorPages;
using ShopRazorpage2.Data;
using ShopRazorpage2.Models;

namespace ShopRazorpage2.Pages.Products
{
    public class IndexModel : PageModel
    {
        private readonly IProductRepository _repo;

        public IndexModel(IProductRepository repo)
        {
            _repo = repo;
        }

        // لیست محصولات
        public List<Product> Products { get; set; } = new();

        // دسته‌بندی‌ها
        public IEnumerable<string> Categories { get; set; } = new List<string>();

        // جستجو و فیلتر
        [BindProperty(SupportsGet = true)]
        public string Search { get; set; }

        [BindProperty(SupportsGet = true)]
        public string Category { get; set; }

        // فیلتر محصولات تخفیف‌دار
        [BindProperty(SupportsGet = true)]
        public bool? Discounted { get; set; }

        // محدود کردن تعداد نتایج
        [BindProperty(SupportsGet = true)]
        public int? Take { get; set; }

        // یک Property واسط برای Razor
        public string SelectedCategory
        {
            get => Category;
            set => Category = value;
        }

        public void OnGet()
        {
            var items = _repo.GetAll().ToList();

            // 👇 مشخص کردن 10 محصول تخفیف خورده
            // شما می‌توانید این محصولات را با ID یا Slug مشخص کنید
            var discountedIds = new List<int> { 1, 3, 5, 7, 9, 11, 13, 15, 17, 19 }; // مثال
            foreach (var product in items.Where(p => discountedIds.Contains(p.Id)))
            {
                product.IsDiscounted = true;
                product.DiscountPrice = Math.Round(product.Price * 0.8M, 0); // 20٪ تخفیف
            }

            // جستجوی نام یا توضیحات
            if (!string.IsNullOrWhiteSpace(Search))
            {
                items = items.Where(p =>
                    (p.Name?.Contains(Search, StringComparison.OrdinalIgnoreCase) ?? false) ||
                    (p.Description?.Contains(Search, StringComparison.OrdinalIgnoreCase) ?? false)).ToList();
            }

            // فیلتر دسته‌بندی
            if (!string.IsNullOrWhiteSpace(Category))
            {
                items = items.Where(p =>
                    p.Category.Equals(Category, StringComparison.OrdinalIgnoreCase)).ToList();
            }

            // فیلتر محصولات تخفیف‌دار
            if (Discounted == true)
            {
                items = items.Where(p => p.IsDiscounted).ToList();
            }

            // محدود کردن تعداد
            if (Take.HasValue && Take.Value > 0)
            {
                items = items.Take(Take.Value).ToList();
            }

            Products = items;
            Categories = _repo.GetCategories();
        }

    }


}
