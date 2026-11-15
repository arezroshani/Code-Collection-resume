using Microsoft.AspNetCore.Mvc;
using Microsoft.AspNetCore.Mvc.RazorPages;
using ShopRazorpage2.Data;
using ShopRazorpage2.Models;
using System.ComponentModel.DataAnnotations;

namespace ShopRazorpage2.Pages.Products
{
    public class CreateModel : PageModel
    {
        private readonly IProductRepository _repo;
        public IEnumerable<string> Categories { get; set; } = new List<string>();

        public CreateModel(IProductRepository repo) => _repo = repo;

        [BindProperty]
        public InputModel Input { get; set; } = new();

        public void OnGet()
        {
            Categories = _repo.GetCategories();
        }

        public IActionResult OnPost()
        {
            Categories = _repo.GetCategories();
            if (!ModelState.IsValid) return Page();

            var product = new Product
            {
                Name = Input.Name,
                Price = Input.Price,
                Description = Input.Description,
                ImageUrl = string.IsNullOrWhiteSpace(Input.ImageUrl) ? "/images/placeholder.png" : Input.ImageUrl,
                Category = Input.Category // ? ??? ?? ????? ?????? ??? ??????? ???????
            };

            _repo.Add(product);
            TempData["SuccessMessage"] = "????? ?? ?????? ????? ?? ?";
            return RedirectToPage("/Products/Index");
        }

        public class InputModel
        {
            [Required(ErrorMessage = "??? ????? ?????? ???")]
            [StringLength(150, ErrorMessage = "??? ????? ????????? ??? ?? 150 ??????? ????")]
            public string Name { get; set; }

            [Required(ErrorMessage = "???? ?????? ???")]
            [Range(0, double.MaxValue, ErrorMessage = "???? ???? ???? ????")]
            public decimal Price { get; set; }

            public string Description { get; set; }

            [Url(ErrorMessage = "???? ????? ????? ????")]
            public string ImageUrl { get; set; }

            [Required(ErrorMessage = "?????? ????????? ?????? ???")]
            public string Category { get; set; }
        }
    }
}
