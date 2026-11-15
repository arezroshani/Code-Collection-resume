using ShopRazorpage2.Models; 

namespace ShopRazorpage2.Data
{
    public interface IProductRepository
    {
        IEnumerable<Product> GetAll();
        Product GetBySlug(string slug);
        Product GetById(int id); // ← متد جدید اضافه شد
        IEnumerable<string> GetCategories();
        void Add(Product product);
    }
}
