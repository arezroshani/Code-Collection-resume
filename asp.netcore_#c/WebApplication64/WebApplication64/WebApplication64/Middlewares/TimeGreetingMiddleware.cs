namespace WebApplication64.Middlewares
{
    public class TimeGreetingMiddleware
    {
        //میدل ور دوم
        private readonly RequestDelegate _next;
        public TimeGreetingMiddleware(RequestDelegate next) => _next = next;

        public async Task InvokeAsync(HttpContext context)
        {
            var hour = DateTime.Now.Hour;

            if (hour >= 5 && hour < 12)
            {
                await context.Response.WriteAsync("TimeGreetingMiddleware: Good Morning! \n");
            }
            else if (hour >= 12 && hour < 18)
            {
                await context.Response.WriteAsync("TimeGreetingMiddleware: Good Afternoon! \n ");
            }
            else
            {
                await context.Response.WriteAsync("TimeGreetingMiddleware: Good Evening! \n");
            }

            await _next(context);
        }
    }
}

