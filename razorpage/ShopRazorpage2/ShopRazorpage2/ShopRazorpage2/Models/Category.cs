using System.ComponentModel.DataAnnotations;

namespace ShopRazorpage2.Models
{
    public class Category
    {
        public int Id { get; set; }   // شناسه یکتا (به درد می‌خوره برای مدیریت)

        [Required, StringLength(100)]
        public string Name { get; set; } = string.Empty;

        // برای URL ها (مثلاً: "کتاب‌های-جدید")
        [StringLength(150)]
        public string Slug { get; set; } = string.Empty;

        // توضیح کوتاه (اختیاری)
        [StringLength(500)]
        public string? Description { get; set; }

        // لیست محصولات این دسته (در آینده اگر لازم شد)
        public List<Product> Products { get; set; } = new();
    }
}
