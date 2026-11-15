using ShopRazorpage2.Models;
using ShopRazorpage2.Utils;

namespace ShopRazorpage2.Data
{
    public class InMemoryProductRepository : IProductRepository
    {
        private readonly List<Product> _products = new();
        private readonly HashSet<string> _categories = new(StringComparer.OrdinalIgnoreCase);

        public IEnumerable<Product> GetAll() => _products.OrderBy(p => p.Name);

        public Product GetBySlug(string slug) => _products.FirstOrDefault(p => p.Slug == slug);

        // ✅ متد جدید اضافه شد
        public Product GetById(int id) => _products.FirstOrDefault(p => p.Id == id);

        public IEnumerable<string> GetCategories() => _categories.OrderBy(c => c);

        public void Add(Product product)
        {
            // set id
            product.Id = _products.Any() ? _products.Max(p => p.Id) + 1 : 1;

            // generate unique slug
            var baseSlug = SlugHelper.GenerateSlug(product.Name);
            var slug = baseSlug;
            int i = 1;
            while (_products.Any(p => p.Slug == slug))
            {
                slug = $"{baseSlug}-{i++}";
            }
            product.Slug = slug;

            // default image
            if (string.IsNullOrWhiteSpace(product.ImageUrl))
            {
                product.ImageUrl = "/images/placeholder.png";
            }

            _products.Add(product);
            if (!string.IsNullOrWhiteSpace(product.Category))
                _categories.Add(product.Category);
        }

        public void Remove(int id)
        {
            var product = _products.FirstOrDefault(p => p.Id == id);
            if (product != null)
            {
                _products.Remove(product);
                // اگر دسته‌بندی دیگه استفاده نشد، حذفش کن
                if (!_products.Any(p => p.Category == product.Category))
                    _categories.Remove(product.Category);
            }
        }

        public void Update(Product updated)
        {
            var index = _products.FindIndex(p => p.Id == updated.Id);
            if (index != -1)
                _products[index] = updated;
        }

        public InMemoryProductRepository()
        {
            Add(new Product { Name = "کفش مجلسی زنانه مدل سندال", Price = 420000, Category = "کفش مجلسی زنانه", Description = "کفش رسمی زنانه", ImageUrl = "/images/DSC.jpg" });
            Add(new Product { Name = "کفش مردانه مدل سهند", Price = 450000, Category = "کفش مجلسی مردانه", Description = "کفش رسمی مردانه", ImageUrl = "/images/jdj.webp" });
            Add(new Product { Name = "کفش مجلسی زنانه مدل وِژ", Price = 420000, Category = "کفش مجلسی زنانه", Description = "کفش رسمی زنانه", ImageUrl = "/images/8mm.webp" });
            Add(new Product { Name = "کیف گوچی", Price = 220000, Category = "کیف", Description = "کیف کوچک روزمره", ImageUrl = "/images/mv.webp" });
            Add(new Product { Name = "کیف پرادا", Price = 220000, Category = "کیف", Description = "کیف کوچک روزمره", ImageUrl = "/images/jdj6.jpg" });
            Add(new Product { Name = "کیف شانل", Price = 350000, Category = "کیف", Description = "کیف زنانه شیک", ImageUrl = "/images/ea.webp" });
            Add(new Product { Name = "کیف لویی ویتون", Price = 220000, Category = "کیف", Description = "کیف کوچک روزمره", ImageUrl = "/images/yae.jpg" });
            Add(new Product { Name = "کفش مجلسی زنانه", Price = 420000, Category = "کفش مجلسی زنانه", Description = "کفش رسمی زنانه", ImageUrl = "/images/hu1ml.jpg" });
            Add(new Product { Name = "کفش مجلسی زنانه مدل اسپیرال", Price = 420000, Category = "کفش مجلسی زنانه", Description = "کفش رسمی زنانه", ImageUrl = "/images/nal.jpg" });
            Add(new Product { Name = "کفش مجلسی زنانه مدل ارکید", Price = 420000, Category = "کفش مجلسی زنانه", Description = "کفش رسمی زنانه", ImageUrl = "/images/shik.jpg" });
            Add(new Product { Name = "کفش مجلسی زنانه مدل لیلیوم", Price = 420000, Category = "کفش مجلسی زنانه", Description = "کفش رسمی زنانه", ImageUrl = "/images/fifi.jpg" });
            Add(new Product { Name = "صندل زنانه مدل ساحلی", Price = 180000, Category = "صندل زنانه", Description = "صندل راحتی تابستانی", ImageUrl = "/images/71JUf-QioZL.jpg" });
            Add(new Product { Name = "صندل زنانه مدل جیانویتو روسی", Price = 200000, Category = "صندل زنانه", Description = "صندل اسپرت زنانه", ImageUrl = "/images/71UnZLC9X2L.jpg" });
            Add(new Product { Name = " کفش مجلسی زنانه مدل استیلتو", Price = 420000, Category = "کفش مجلسی زنانه", Description = "کفش رسمی زنانه", ImageUrl = "/images/ajj.webp" });
            Add(new Product { Name = "صندل زنانه مدل پروانه ای ", Price = 200000, Category = "صندل زنانه", Description = "صندل اسپرت زنانه", ImageUrl = "/images/jiji.jpg" });
            Add(new Product { Name = "کفش مجلسی زنانه مدل کلاسیک", Price = 420000, Category = "کفش مجلسی زنانه", Description = "کفش رسمی زنانه", ImageUrl = "/images/jshj.jpeg" });
            Add(new Product { Name = "  صندل زنانه مدل گلوریا", Price = 200000, Category = "صندل زنانه", Description = "صندل اسپرت زنانه", ImageUrl = "/images/sinin_.jpg", });

          

            Add(new Product { Name = "صندل زنانه مدل فالکونری", Price = 200000, Category = "صندل زنانه", Description = "صندل اسپرت زنانه", ImageUrl = "/images/sjbns.webp" });
            Add(new Product { Name = "کفش مجلسی زنانه مدل کت-هیل", Price = 420000, Category = "کفش مجلسی زنانه", Description = "کفش رسمی زنانه", ImageUrl = "/images/buted.jpg" });
            Add(new Product { Name = "صندل زنانه مدل دیور", Price = 200000, Category = "صندل زنانه", Description = "صندل اسپرت زنانه", ImageUrl = "/images/hum.jpg" });
            Add(new Product { Name = "صندل زنانه مدل میسونی", Price = 200000, Category = "صندل زنانه", Description = "صندل اسپرت زنانه", ImageUrl = "/images/kaka0.jpg" });
            Add(new Product { Name = "صندل زنانه مدل ساشا فایو", Price = 200000, Category = "صندل زنانه", Description = "صندل اسپرت زنانه", ImageUrl = "/images/yahoo1.jpg" });
            Add(new Product { Name = "صندل زنانه مدل سالواتوره", Price = 200000, Category = "صندل زنانه", Description = "صندل اسپرت زنانه", ImageUrl = "/images/poco1.webp" });
            Add(new Product { Name = "کفش اسپرت مدل دیادورا", Price = 250000, Category = "کفش اسپرت", Description = "کفش راحتی ورزشی", ImageUrl = "/images/jgd.jpg" });
            Add(new Product { Name = "کفش اسپرت مدل اسکای", Price = 250000, Category = "کفش اسپرت", Description = "کفش راحتی ورزشی", ImageUrl = "/images/sport.webp" });
            Add(new Product { Name = "کفش اسپرت مدل بوته‌گا", Price = 250000, Category = "کفش اسپرت", Description = "کفش راحتی ورزشی", ImageUrl = "/images/lilf.jpg" });
            Add(new Product { Name = "کفش اسپرت مدل پاورلایف", Price = 250000, Category = "کفش اسپرت", Description = "کفش راحتی ورزشی", ImageUrl = "/images/blue.jpg" });
            Add(new Product { Name = "کفش اسپرت مدل فلکس", Price = 250000, Category = "کفش اسپرت", Description = "کفش راحتی ورزشی", ImageUrl = "/images/white.jpg" });
            Add(new Product { Name = "کفش اسپرت مدل کُنیورس", Price = 250000, Category = "کفش اسپرت", Description = "کفش راحتی ورزشی", ImageUrl = "/images/tell.jpg" });
            Add(new Product { Name = "کفش مجلسی مردانه", Price = 450000, Category = "کفش مجلسی مردانه", Description = "کفش رسمی مردانه", ImageUrl = "/images/ive.webp" });
            Add(new Product { Name = "کفش مجلسی مردانه", Price = 450000, Category = "کفش مجلسی مردانه", Description = "کفش رسمی مردانه", ImageUrl = "/images/sghh.jpg" });
            Add(new Product { Name = "کفش مردانه ال سی وایکیکی", Price = 450000, Category = "کفش مجلسی مردانه", Description = "کفش رسمی مردانه", ImageUrl = "/images/adef.jpg" });
            Add(new Product { Name = "کفش مجلسی مردانه", Price = 450000, Category = "کفش مجلسی مردانه", Description = "کفش رسمی مردانه", ImageUrl = "/images/large.webp" });
            Add(new Product { Name = "کفش اسپرت مدل مِردوکس", Price = 250000, Category = "کفش اسپرت", Description = "کفش راحتی ورزشی", ImageUrl = "/images/wolf.webp" });
            Add(new Product { Name = "کفش اسپرت مدل هیلفیگر", Price = 250000, Category = "کفش اسپرت", Description = "کفش راحتی ورزشی", ImageUrl = "/images/ogab.jpg" });
            Add(new Product { Name = "کفش اسپرت مدل مونکلر", Price = 250000, Category = "کفش اسپرت", Description = "کفش راحتی ورزشی", ImageUrl = "/images/goods.jpeg" });
            Add(new Product { Name = "کفش مجلسی مردانه مدل هوگان", Price = 450000, Category = "کفش مجلسی مردانه", Description = "کفش رسمی مردانه", ImageUrl = "/images/S25_MensLP_Cat_BestSellers.webp" });
            Add(new Product { Name = "کفش مجلسی زنانه مدل میول", Price = 420000, Category = "کفش مجلسی زنانه", Description = "کفش رسمی زنانه", ImageUrl = "/images/sjgja.jpg" });
            Add(new Product { Name = "کفش اسپرت مدل ریکو", Price = 250000, Category = "کفش اسپرت", Description = "کفش راحتی ورزشی", ImageUrl = "/images/original.jpeg" });
            Add(new Product { Name = "کفش مجلسی زنانه مدل دورسی", Price = 420000, Category = "کفش مجلسی زنانه", Description = "کفش رسمی زنانه", ImageUrl = "/images/snin.jpg" });
            Add(new Product { Name = "کفش مجلسی زنانه مدل چانکی هیل", Price = 420000, Category = "کفش مجلسی زنانه", Description = "کفش رسمی زنانه", ImageUrl = "/images/zkj.jpg" });
            Add(new Product { Name = "کفش اسپرت مدل بالنسیاگا", Price = 250000, Category = "کفش اسپرت", Description = "کفش راحتی ورزشی", ImageUrl = "/images/v6f.webp" });
            Add(new Product { Name = "کفش اسپرت مدل اسکچرز", Price = 250000, Category = "کفش اسپرت", Description = "کفش راحتی ورزشی", ImageUrl = "/images/Chg.jpg" });
        }
    }
}
