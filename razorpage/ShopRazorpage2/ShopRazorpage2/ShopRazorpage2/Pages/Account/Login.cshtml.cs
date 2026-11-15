using Microsoft.AspNetCore.Mvc;
using Microsoft.AspNetCore.Mvc.RazorPages;
using System.Collections.Generic;
using System.Linq;

namespace ShopRazorpage2.Pages.Account
{
    public class LoginModel : PageModel
    {
        [BindProperty] public string UsernameOrEmail { get; set; }
        [BindProperty] public string Password { get; set; }

        public string ErrorMessage { get; set; }

        // ???? ???? ?????? ?? ?? Register.cshtml.cs ?????
        private static List<RegisterModel.UserModel> Users => RegisterModel.Users;

        public void OnGet()
        {
        }

        public IActionResult OnPost()
        {
            if (string.IsNullOrWhiteSpace(UsernameOrEmail) || string.IsNullOrWhiteSpace(Password))
            {
                ErrorMessage = "???? ?????? ???? ?? ????!";
                return Page();
            }

            var user = Users.FirstOrDefault(u =>
                (u.Username == UsernameOrEmail || u.Email == UsernameOrEmail) && u.Password == Password);

            if (user == null)
            {
                ErrorMessage = "??? ?????? ?? ??? ???? ?????? ???!";
                return Page();
            }

            // ????? ?? Session
            HttpContext.Session.SetString("Username", user.Username);

            // ???????? ?? Checkout
            return RedirectToPage("/Cart/Checkout");
        }
    }
}
