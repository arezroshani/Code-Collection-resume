using Microsoft.AspNetCore.Mvc;
using Microsoft.AspNetCore.Mvc.RazorPages;
using ShopRazorpage2.Data;
using ShopRazorpage2.Models;
using System;
using System.Collections.Generic;
using System.Linq;

namespace ShopRazorpage2.Pages.Products
{
    public class DetailsModel : PageModel
    {
        private readonly IProductRepository _repo;
        public Product Product { get; set; }

        // ???? 30 ??? ????
        private static readonly List<Review> AllReviews = new List<Review>
        {
new Review { UserName="Sara", Stars=5, Comment="\u06CC\u06A9 \u0647\u0641\u062A\u0647 \u0637\u0648\u0644 \u06A9\u0634\u06CC\u062F \u062A\u0627 \u0628\u0647 \u062F\u0633\u062A\u0645 \u0628\u0631\u0633\u0647 \u0648\u0644\u06CC \u0627\u0631\u0632\u0634\u0634 \u0631\u0648 \u062F\u0627\u0634\u062A :)", Date=DateTime.Parse("2025-09-01") },
new Review {
    UserName = "HESSAM",
    Stars = 4,
    Comment = "\u0627\u0648\u0644\u06CC\u0646 \u0641\u0631\u0648\u0634\u06AF\u0627\u0647 \u06A9\u06CC\u0641 \u0648 \u06A9\u0641\u0634\u06CC \u06A9\u0647 \u0627\u06CC\u0646\u0647\u0645\u0647 \u062A\u0646\u0648\u0639 \u0631\u0646\u06AF \u062F\u0627\u0631\u062F\u060C \u062A\u06CC\u0641\u0627\u0646\u06CC \u0647\u0645\u06CC\u0634\u0647 \u0645\u062A\u0639\u062C\u0628\u0645 \u0645\u06A9\u06CC\u0646\u0647 \u003A\u0029",
    Date = DateTime.Parse("2025-09-02")
},
new Review {
    UserName = "Leila",
    Stars = 5,
    Comment = "\u0645\u062D\u0635\u0648\u0644 \u0631\u0648 \u0645\u0631\u062C\u0648\u0639 \u06A9\u0631\u062F\u0645\u060C \u0644\u0637\u0641\u0627 \u0631\u0627\u0647\u0646\u0645\u0627\u06CC\u06CC \u06A9\u0646\u06CC\u062F \u0686\u062C\u0648\u0631\u06CC \u067E\u0648\u0644 \u0631\u0648 \u067E\u0633 \u0628\u06AF\u06CC\u0631\u0645.",
    Date = DateTime.Parse("2025-09-03")
},
    new Review { UserName="Mohammad", Stars=3, Comment="\u0642\u06CC\u0645\u062A \u0645\u0646\u0627\u0633\u0628 \u0628\u0648\u062F.", Date=DateTime.Parse("2025-09-04") },
new Review {
    UserName = "Gandom",
    Stars = 4,
    Comment = "\u0631\u0646\u06AF \u062E\u0627\u0635\u0634 \u062A\u0648\u062C\u0647\u0645 \u0631\u0648 \u062C\u0644\u0628 \u06A9\u0631\u062F.",
    Date = DateTime.Parse("2025-09-05")
},
new Review {
    UserName = "Ali",
    Stars = 5,
    Comment = "\u0627\u06CC\u0646 \u0645\u062F\u0644 \u062E\u06CC\u0644\u06CC \u0648\u0642\u062A\u0647 \u0627\u0632 \u0645\u062F \u0627\u0641\u062A\u0627\u062F\u0647 \u0627\u0633\u062A\u060C \u0627\u06AF\u0631 \u0628\u0631\u06AF\u0631\u062F\u0645 \u0639\u0642\u0628 \u0627\u0646\u062A\u062E\u0627\u0628\u0634 \u0646\u0645\u06CC\u06A9\u0646\u0645.",
    Date = DateTime.Parse("2025-09-06")
},
    new Review { UserName="Narges", Stars=5, Comment="\u062E\u06CC\u0644\u06CC \u0631\u0627\u062D\u062A \u0648 \u0646\u0631\u0645 \u0627\u0633\u062A.", Date=DateTime.Parse("2025-09-07") },
    new Review { UserName="Reza", Stars=4, Comment="\u0627\u0645\u06CC\u062F\u0648\u0627\u0631 \u06A9\u0645\u06CC \u0633\u0627\u06CC\u0632 \u06A9\u0648\u0686\u06A9 \u0627\u0633\u062A.", Date=DateTime.Parse("2025-09-08") },
new Review { UserName="Mahsa", Stars=5, Comment="\u0642\u06CC\u0645\u062A\u0634 \u0646\u0633\u0628\u062A \u0628\u0647 \u062C\u0627\u0647\u0627\u06CC \u062F\u06CC\u06AF\u0631\u0647 \u062E\u06CC\u0644\u06CC \u067E\u0627\u06CC\u06CC\u0646 \u0628\u0648\u062F.", Date=DateTime.Parse("2025-09-09") },
new Review { UserName="Amir", Stars=5, Comment="\u0645\u0645\u0646\u0648\u0646 \u0627\u0632 \u06A9\u06CC\u0641\u06CC\u062A \u062E\u0648\u0628\u062A\u0648\u0646 \u0627\u0646\u062A\u062E\u0627\u0628 \u0645\u0646 \u0647\u0645\u06CC\u0634\u0647 \u062A\u06CC\u0641\u0627\u0646\u06CC \u0645\u06CC\u0645\u0627\u0646\u062F :)))", Date=DateTime.Parse("2025-09-10") },
new Review {
    UserName = "romina",
    Stars = 5,
    Comment = "\u0627\u0632 \u0628\u0633\u062A\u0647 \u0628\u0646\u062F\u06CC \u0645\u062D\u0635\u0648\u0644\u0627\u062A \u0631\u0627\u0636\u06CC \u0628\u0648\u062F\u0645.",
    Date = DateTime.Parse("2025-09-11")
},
    new Review { UserName="Atefeh", Stars=4, Comment="\u0631\u0646\u06AF \u0648\u0627\u0642\u0639\u06CC \u06A9\u0645\u06CC \u0645\u062A\u0641\u0627\u0648\u062A \u0628\u0648\u062F.", Date=DateTime.Parse("2025-09-12") },
    new Review { UserName="Peyman", Stars=5, Comment="\u062E\u06CC\u0644\u06CC \u0631\u0627\u062D\u062A \u0648 \u0633\u0628\u06A9.", Date=DateTime.Parse("2025-09-13") },
    new Review { UserName="Sara", Stars=4, Comment="\u062F\u0648\u062e\u062a \u0648 \u0642\u06CC\u0645\u062A \u0639\u0627\u0644\u06CC \u0628\u0648\u062F.", Date=DateTime.Parse("2025-09-14") },
    new Review { UserName="SINA", Stars=5, Comment="\u0628\u0647\u062A\u0631\u06CC\u0646 \u062E\u0631\u06CC\u062F \u0627\u06CC\u0646 \u0645\u0627\u0647!", Date=DateTime.Parse("2025-09-15") },
new Review {
    UserName = "Maryam",
    Stars = 3,
    Comment = "\u0647\u0631 \u0631\u0648\u0632 \u0633\u0627\u06CC\u062A\u062A\u0648\u0646 \u0631\u0648 \u0686\u06A9 \u0645\u06CC\u06A9\u0646\u0645 \u0628\u0647 \u0627\u0645\u06CC\u062F \u0635\u0646\u062F\u0644 \u067E\u0631\u0648\u0627\u0646\u0647 \u0645\u062F\u0644 f011-\u060C \u0644\u0637\u0641\u0627 \u0645\u0648\u062C\u0648\u062F\u0634 \u06A9\u0646\u06CC\u0646.",
    Date = DateTime.Parse("2025-09-16")
},
    new Review { UserName="Niliy", Stars=5, Comment="\u0648\u0627\u0642\u0639\u0627\u064B \u0631\u0627\u062D\u062A \u0648 \u0632\u06CC\u0628\u0627.", Date=DateTime.Parse("2025-09-17") },
new Review {
    UserName = "Zahra",
    Stars = 4,
    Comment = "\u0648\u0627\u0642\u0639\u0627\u064B \u062A\u0646\u0648\u0639 \u06A9\u0627\u0631\u0627\u0634\u0648\u0646 \u0628\u0627\u0644\u0627\u0633\u062A\u060C \u0641\u0631\u0648\u0634\u06AF\u0627\u0647 \u0645\u0648\u0631\u062F \u0627\u0644\u0639\u0627\u0642\u0645 \u003A\u0029\u0029\u0029\u0029\u0029",
    Date = DateTime.Parse("2025-09-18")
},
    new Review { UserName="Reza", Stars=5, Comment="\u06A9\u06CC\u0641\u06CC\u062A \u0639\u0627\u0644\u06CC \u060C \u0627\u0631\u0632\u0634 \u062F\u0627\u0631\u062F.", Date=DateTime.Parse("2025-09-19") },
new Review {
    UserName = "Nafas",
    Stars = 3,
    Comment = "\u062E\u062F\u0627\u0631\u0648\u0634\u06A9\u0631 \u0645\u0631\u062C\u0648\u0639\u06CC \u062F\u0627\u0634\u062A\u0646 \u0627\u0635\u0644\u0627 \u0627\u0632 \u0645\u062F\u0644\u0634 \u062E\u0648\u0634\u0645 \u0646\u06CC\u0622\u0645\u062F.",
    Date = DateTime.Parse("2025-09-20")
},
    new Review { UserName="MMAMADAM", Stars=5, Comment="\u062F\u0648\u062e\u062a \u0648 \u0642\u06CC\u0645\u062A \u0639\u0627\u0644\u06CC!", Date=DateTime.Parse("2025-09-21") },
new Review {
    UserName = "Hossein",
    Stars = 4,
    Comment = "\u0645\u062D\u0635\u0648\u0644 \u0631\u0648 \u0628\u0647 \u0631\u0627\u062D\u062A\u06CC \u0628\u0631\u06AF\u0634\u062A \u0632\u062F\u0645\u060C \u0631\u0646\u06AF \u0642\u0631\u0645\u0632\u0634 \u0631\u0648 \u06AF\u0631\u0641\u062A\u0645.",
    Date = DateTime.Parse("2025-09-22")
},
    new Review { UserName="Narges", Stars=5, Comment="\u0628\u0633\u06CC\u0627\u0631 \u0631\u0627\u062D\u062A \u0648 \u0633\u0628\u06A9.", Date=DateTime.Parse("2025-09-23") },
new Review { UserName="Tanaz", Stars=4, Comment="\u0645\u062D\u0635\u0648\u0644 \u062E\u06CC\u0644\u06CC \u0632\u0648\u062F\u062A\u0631 \u0627\u0632 \u0686\u06CC\u0632\u06CC \u06A9\u0647 \u0641\u06CC\u06A9\u0631 \u0645\u06A9\u0631\u062F\u0645 \u0628\u0647 \u062F\u0633\u062A\u0645 \u0631\u0633\u06CC\u062F\u060C \u0642\u06CC\u0627\u0641\u062A\u0634\u0645 \u0639\u0627\u0644\u06CC \u0628\u0648\u062F.", Date=DateTime.Parse("2025-09-24") },
new Review {
    UserName = "Laeya",
    Stars = 5,
    Comment = "\u06A9\u06CC\u0641\u06CC\u062A \u062E\u06CC\u0644\u06CC \u0628\u0648\u062F.",
    Date = DateTime.Parse("2025-09-25")
},
new Review {
    UserName = "Tara",
    Stars = 3,
    Comment = "\u0627\u0632 \u062E\u0627\u0646\u0645 \u0641\u062A\u0627\u062D\u06CC \u067E\u0634\u062A\u06CC\u0628\u0627\u0646 \u0635\u0628\u0648\u0631 \u0633\u0627\u06CC\u062A \u062E\u06CC\u0644\u06CC \u0645\u0645\u0646\u0648\u0646\u0645.",
    Date = DateTime.Parse("2025-09-26")
},
new Review {
    UserName = "Mina",
    Stars = 5,
    Comment = "\u062F\u0648\u062E\u062A \u06A9\u0627\u0631 \u0648\u0627\u0642\u0639\u0627\u064B \u062A\u0645\u06CC\u0632 \u0648 \u0645\u062D\u06A9\u0645 \u0628\u0648\u062F.",
    Date = DateTime.Parse("2025-09-27")
},
new Review {
    UserName = "Rasta",
    Stars = 4,
    Comment = "\u0637\u0631\u062D \u0631\u0648\u0634 \u0628\u0647 \u0632\u06CC\u0628\u0627\u06CC\u06CC \u0639\u06A9\u0633 \u062F\u0627\u062E\u0644 \u0633\u0627\u06CC\u062A\u0647 \u003A\u0029",
    Date = DateTime.Parse("2025-09-28")
},
new Review {
    UserName = "Fatemeh",
    Stars = 5,
    Comment = "\u0627\u0631\u0633\u0627\u0644 \u0628\u0647 \u0634\u0647\u0631\u0633\u062A\u0627\u0646\u0634\u0648\u0646 \u062E\u06CC\u0644\u06CC \u0637\u0648\u0644 \u0645\u06CC\u06A9\u0634\u0647\u060C \u0628\u0639\u062F \u0627\u0632 \u06CC\u06A9 \u0647\u0641\u062A\u0647 \u0628\u0647 \u062F\u0633\u062A\u0645 \u0631\u0633\u06CC\u062F.",
    Date = DateTime.Parse("2025-09-29")
},
new Review {
    UserName = "King",
    Stars = 4,
    Comment = "\u0628\u0631\u0627\u06CC \u0647\u0645\u0633\u0631\u0645 \u062E\u0631\u06CC\u062F\u0645\u060C \u0627\u0645\u06CC\u062F\u0648\u0627\u0631\u0645 \u062E\u0648\u0634\u0634 \u0628\u06CC\u0627\u062F.",
    Date = DateTime.Parse("2025-09-30")
},
        };

        public DetailsModel(IProductRepository repo) => _repo = repo;

        public IActionResult OnGet(string slug)
        {
            if (string.IsNullOrWhiteSpace(slug))
                return RedirectToPage("./Index");

            Product = _repo.GetBySlug(slug);
            if (Product == null)
                return NotFound();

            // ????? ????? ????????? ???? ??? ?? Session
            if (!string.IsNullOrEmpty(Product.Category))
            {
                HttpContext.Session.SetString("LastClickedCategory", Product.Category);
            }

            // ??? Reviews null ???? ???????? ?????
            if (Product.Reviews == null)
                Product.Reviews = new List<Review>();

            // ????? ???? 3 ??? ?????? ?? ???? 30 ????
            if (Product.Reviews.Count == 0)
            {
                var random = new Random();
                Product.Reviews = AllReviews.OrderBy(x => random.Next()).Take(3).ToList();
            }

            return Page();
        }
    }
}
