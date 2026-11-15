using MediatR;
using Microsoft.EntityFrameworkCore;
using MyCmsProject.Application.Behaviors;
using MyCmsProject.Domain.Entities;
using MyCmsProject.Infrastructure.Persistence; // DbContext
using System.Reflection;

var builder = WebApplication.CreateBuilder(args);

// ----------------------------
// Add Services
// ----------------------------

// DbContext ? InMemory 
builder.Services.AddDbContext<AppDbContext>(options =>
    options.UseInMemoryDatabase("MyCmsDb")
);

// MediatR (CQRS)
builder.Services.AddMediatR(cfg =>
    cfg.RegisterServicesFromAssembly(Assembly.GetExecutingAssembly())
);

// Controllers + Razor Pages
builder.Services.AddControllers();
builder.Services.AddRazorPages();

// Swagger
builder.Services.AddEndpointsApiExplorer();
builder.Services.AddSwaggerGen();

// ----------------------------
// Build App
// ----------------------------

builder.Services.AddTransient(typeof(IPipelineBehavior<,>), typeof(ValidationBehavior<,>));

var app = builder.Build();

// Middleware
if (app.Environment.IsDevelopment())
{
    app.UseDeveloperExceptionPage();
    app.UseSwagger();
    app.UseSwaggerUI(c =>
    {
        c.SwaggerEndpoint("/swagger/v1/swagger.json", "MyCmsProject API V1");
        c.RoutePrefix = "management"; // Swagger ?? /management
    });
}
else
{
    app.UseExceptionHandler("/Error");
    app.UseHsts();
}

app.UseHttpsRedirection();
app.UseStaticFiles();

app.UseRouting();

app.UseAuthorization();

// Map Controllers (API endpoints)
app.MapControllers();

// Map Razor Pages (UI Theme)
app.MapRazorPages();

// ----------------------------
// Root ? Swagger
// ----------------------------
app.MapGet("/", () => Results.Redirect("/management/index.html"));

// ----------------------------
// Seed ????? ???? Post
using (var scope = app.Services.CreateScope())
{
    var context = scope.ServiceProvider.GetRequiredService<AppDbContext>();

    if (!context.Posts.Any())
    {
        var catTech = new Category { Name = "Technology" };
        var catLife = new Category { Name = "Lifestyle" };
        var tagCsharp = new Tag { Name = "C#" };
        var tagDotnet = new Tag { Name = ".NET" };

        var post1 = new Post
        {
            Title = "First Post",
            Content = "This is a real CMS-style post with categories and tags.",
            Categories = new List<Category> { catTech, catLife },
            Tags = new List<Tag> { tagCsharp, tagDotnet },
            Comments = new List<Comment>
            {
                new Comment { Content = "Great article!", UserId = Guid.NewGuid() },
                new Comment { Content = "Waiting for more posts!", UserId = Guid.NewGuid() }
            },
            UserId = Guid.NewGuid()
        };

        context.Posts.Add(post1);
        context.SaveChanges();
    }
}

app.Run();
