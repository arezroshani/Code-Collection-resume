using Microsoft.AspNetCore.Mvc;
using Microsoft.AspNetCore.Mvc.RazorPages;
using ShopRazorpage2.Models;
using ShopRazorpage2.Utils; // حتما اضافه شود

namespace ShopRazorpage2.Pages.Cart
{
    public class UpdateQuantityModel : PageModel
    {
        public IActionResult OnGet(int productId, int quantity)
        {
            if (quantity < 1) quantity = 1;

            var cart = HttpContext.Session.GetObjectFromJson<List<CartItem>>("Cart") ?? new List<CartItem>();
            var item = cart.FirstOrDefault(x => x.ProductId == productId);
            if (item != null)
                item.Quantity = quantity;

            HttpContext.Session.SetObjectAsJson("Cart", cart);
            return RedirectToPage("/Cart/Index");
        }
    }
}
