using Microsoft.AspNetCore.Builder;
using Microsoft.AspNetCore.Http;

var builder = WebApplication.CreateBuilder(args);
var app = builder.Build();

// Middleware 1: checking browser(firefox,chrome,...)
app.UseMiddleware<WebApplication64.Middlewares.CheckBrowserMiddleware>();


// Middleware 2:checking DeviceType(Mobile/Desktop)  inline
app.Use(async (context, next) =>
{
    var userAgent = context.Request.Headers["User-Agent"].ToString().ToLower();

    if (userAgent.Contains("mobile"))
    {
        await context.Response.WriteAsync("checking DeviceType middleware: Hello Mobile User! \n ");
    }
    else
    {
        await context.Response.WriteAsync("checking DeviceType middleware: Hello Desktop User! \n ");
    }

    await next.Invoke();
});

// Middleware 3:checking time(Morning/Afternoon/Evening) class
app.UseMiddleware<WebApplication64.Middlewares.TimeGreetingMiddleware>();

// Endpoint 
app.Run(async context =>
{
    await context.Response.WriteAsync("Endpoint: Hello \n");
});

app.Run();
