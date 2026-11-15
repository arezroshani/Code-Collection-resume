namespace WebApplication64.Middlewares
{
    public class CheckBrowserMiddleware
    {
        //میدل ور اول

        private readonly RequestDelegate _next;
        public CheckBrowserMiddleware(RequestDelegate next) => _next = next;

        public async Task InvokeAsync(HttpContext context)
        {
            var userAgent = context.Request.Headers["User-Agent"].ToString();

            if (userAgent.Contains("Firefox", StringComparison.OrdinalIgnoreCase))
            {
                await context.Response.WriteAsync("CheckBrowserMiddleware: You are using Firefox! \n ");
            }
            else if (userAgent.Contains("Chrome", StringComparison.OrdinalIgnoreCase))
            {
                await context.Response.WriteAsync("CheckBrowserMiddleware: You are using Chrome! \n ");
            }
            else
            {
                await context.Response.WriteAsync("CheckBrowserMiddleware: Unknown browser \n");
            }

            await _next(context);
        }
    }
}

