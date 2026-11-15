using Microsoft.AspNetCore.Mvc;
using Microsoft.AspNetCore.Mvc.RazorPages;
using ShopRazorpage2.Data;
using ShopRazorpage2.Models;
using ShopRazorpage2.Utils; // ???? SessionExtensions
using System;
using System.Collections.Generic;
using System.Linq;

namespace ShopRazorpage2.Pages
{
    public class IndexModel : PageModel
    {
        private readonly IProductRepository _repo;

        public IndexModel(IProductRepository repo)
        {
            _repo = repo;
        }

        public List<Product> Products { get; set; } = new List<Product>();
        public List<Product> RecommendedProducts { get; set; } = new List<Product>();
        public List<string> Categories { get; set; } = new List<string>();
        public int CartCount { get; set; } = 0;

        [BindProperty(SupportsGet = true)]
        public string SelectedCategory { get; set; } = string.Empty;

        [BindProperty]
        public int ProductId { get; set; }

        public void OnGet()
        {
            LoadProducts();
            LoadCartCount();
        }

        public IActionResult OnPostAddToCart()
        {
            var cart = HttpContext.Session.GetObjectFromJson<List<CartItem>>("Cart") ?? new List<CartItem>();
            var product = _repo.GetAll().FirstOrDefault(p => p.Id == ProductId);

            if (product != null)
            {
                var item = cart.FirstOrDefault(c => c.ProductId == ProductId);
                if (item != null)
                {
                    item.Quantity++;
                }
                else
                {
                    cart.Add(new CartItem
                    {
                        ProductId = product.Id,
                        Name = product.Name,
                        Price = product.Price,
                        ImageUrl = product.ImageUrl,
                        Quantity = 1
                    });
                }
            }

            HttpContext.Session.SetObjectAsJson("Cart", cart);
            LoadCartCount();

            return RedirectToPage();
        }

        private void LoadProducts()
        {
            Categories = _repo.GetCategories()?.ToList() ?? new List<string>();
            var allProducts = _repo.GetAll()?.ToList() ?? new List<Product>();

            if (!string.IsNullOrWhiteSpace(SelectedCategory))
            {
                Products = allProducts
                    .Where(p => p.Category?.Equals(SelectedCategory, StringComparison.OrdinalIgnoreCase) ?? false)
                    .ToList();
            }
            else
            {
                Products = allProducts
                    .OrderBy(p => Guid.NewGuid())
                    .Take(8)
                    .ToList();
            }

            var lastClickedCategory = HttpContext.Session.GetString("LastClickedCategory");
            if (!string.IsNullOrEmpty(lastClickedCategory))
            {
                RecommendedProducts = allProducts
                    .Where(p => p.Category == lastClickedCategory)
                    .OrderBy(p => Guid.NewGuid())
                    .Take(4)
                    .ToList();
            }
        }

        private void LoadCartCount()
        {
            var cart = HttpContext.Session.GetObjectFromJson<List<CartItem>>("Cart") ?? new List<CartItem>();
            CartCount = cart.Sum(c => c.Quantity);
        }
    }
}
