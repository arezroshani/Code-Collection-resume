using Microsoft.AspNetCore.Mvc;
using Microsoft.AspNetCore.Mvc.RazorPages;
using ShopRazorpage2.Models;
using ShopRazorpage2.Utils; // حتما اضافه کن

namespace ShopRazorpage2.Pages.Cart
{
    public class RemoveModel : PageModel
    {
        public IActionResult OnPost(int productId)
        {
            var cart = HttpContext.Session.GetObjectFromJson<List<CartItem>>("Cart") ?? new List<CartItem>();
            var item = cart.FirstOrDefault(x => x.ProductId == productId);
            if (item != null)
                cart.Remove(item);

            HttpContext.Session.SetObjectAsJson("Cart", cart);
            return RedirectToPage("/Cart/Index");
        }
    }
}
