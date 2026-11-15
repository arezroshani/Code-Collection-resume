using Microsoft.AspNetCore.Mvc.RazorPages;
using ShopRazorpage2.Models;
using ShopRazorpage2.Utils;
using System.Collections.Generic;

namespace ShopRazorpage2.Pages.Cart
{
    public class IndexModel : PageModel
    {
        public List<CartItem> CartItems { get; set; } = new();

        public void OnGet()
        {
            CartItems = HttpContext.Session.GetObjectFromJson<List<CartItem>>("Cart") ?? new List<CartItem>();
        }
    }
}
