using Microsoft.AspNetCore.Builder;
using Microsoft.Extensions.DependencyInjection;
using Microsoft.Extensions.Hosting;
using ShopRazorpage2.Data;
using ShopRazorpage2.Models;

var builder = WebApplication.CreateBuilder(args);

// Razor Pages
builder.Services.AddRazorPages();

// In-memory repository (singleton so data persists while app runs)
builder.Services.AddSingleton<IProductRepository, InMemoryProductRepository>();

// ===== ???? ???? Session =====
builder.Services.AddDistributedMemoryCache(); // ???? ???? ??????? Session
builder.Services.AddSession(options =>
{
    options.IdleTimeout = TimeSpan.FromMinutes(30); // ??? ???? ?????? Session
    options.Cookie.HttpOnly = true;
    options.Cookie.IsEssential = true;
});

var app = builder.Build();

if (!app.Environment.IsDevelopment())
{
    app.UseExceptionHandler("/Error");
}

app.UseStaticFiles();
app.UseRouting();

// ===== ????? ???? Middleware Session =====
app.UseSession();

app.UseAuthorization();

app.MapRazorPages();

app.Run();
