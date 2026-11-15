using Microsoft.AspNetCore.Mvc;
using Microsoft.AspNetCore.Mvc.RazorPages;
using System.Collections.Generic;

namespace ShopRazorpage2.Pages.Account
{
    public class RegisterModel : PageModel
    {
        public class UserModel
        {
            public string Username { get; set; }
            public string Email { get; set; }
            public string Password { get; set; }
        }

        // ? ????? ???? ??????? ?? public ? static ???????
        public static List<UserModel> Users { get; } = new List<UserModel>();

        [BindProperty] public string Username { get; set; }
        [BindProperty] public string Email { get; set; }
        [BindProperty] public string Password { get; set; }
        [BindProperty] public string ConfirmPassword { get; set; }

        public string ErrorMessage { get; set; }

        public void OnGet() { }

        public IActionResult OnPost()
        {
            if (string.IsNullOrWhiteSpace(Username) || string.IsNullOrWhiteSpace(Email) ||
                string.IsNullOrWhiteSpace(Password) || string.IsNullOrWhiteSpace(ConfirmPassword))
            {
                ErrorMessage = "???? ?????? ???? ?? ????!";
                return Page();
            }

            if (Password != ConfirmPassword)
            {
                ErrorMessage = "??? ???? ? ????? ?? ????? ????!";
                return Page();
            }

            Users.Add(new UserModel
            {
                Username = Username,
                Email = Email,
                Password = Password
            });

            return RedirectToPage("./Login");
        }
    }
}
