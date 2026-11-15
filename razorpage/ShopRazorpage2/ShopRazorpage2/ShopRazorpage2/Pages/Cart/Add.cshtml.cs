using Microsoft.AspNetCore.Mvc;
using Microsoft.AspNetCore.Mvc.RazorPages;
using ShopRazorpage2.Data;
using ShopRazorpage2.Models;
using ShopRazorpage2.Utils;
using System.Linq;
using System.Collections.Generic;

namespace ShopRazorpage2.Pages.Cart
{
    public class AddModel : PageModel
    {
        private readonly IProductRepository _repo;

        public AddModel(IProductRepository repo)
        {
            _repo = repo;
        }

        [BindProperty]
        public int ProductId { get; set; }

        public IActionResult OnPost()
        {
            var product = _repo.GetAll().FirstOrDefault(p => p.Id == ProductId);
            if (product == null)
                return NotFound();

            var cart = HttpContext.Session.GetObjectFromJson<List<CartItem>>("Cart")
                       ?? new List<CartItem>();

            var existingItem = cart.FirstOrDefault(x => x.ProductId == ProductId);
            if (existingItem != null)
            {
                existingItem.Quantity += 1; // 👈 فقط یک واحد به محصول موجود اضافه می‌کنیم
            }
            else
            {
                cart.Add(new CartItem
                {
                    ProductId = product.Id,
                    Name = product.Name,
                    Price = product.Price,
                    Quantity = 1,   // 👈 همیشه برای محصول جدید مقدار پیش‌فرض ۱
                    ImageUrl = product.ImageUrl,
                    IsDiscounted = product.IsDiscounted,
                    DiscountPrice = product.DiscountPrice
                });
            }

            HttpContext.Session.SetObjectAsJson("Cart", cart);

            return RedirectToPage("/Cart/Index");
        }
    }
}
