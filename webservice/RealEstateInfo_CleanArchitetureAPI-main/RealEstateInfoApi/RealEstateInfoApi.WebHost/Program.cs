using Asp.Versioning;
using Dapper;
using RealEstateInfoApi.Application.Query.UseCase.Persons.GetPersonByNationalCode;
using RealEstateInfoApi.Persistence.EF;
using RealEstateInfoApi.Read.Dapper;

var builder = WebApplication.CreateBuilder(args);


builder.Services.AddControllers();
builder.Services.AddOpenApi();


builder.Services.AddSwaggerGen();

builder.Services.AddDapperServices(builder.Configuration);

builder.Services.AddApiVersioning(options =>
{
    options.DefaultApiVersion = new ApiVersion(1, 0);
    options.ReportApiVersions = true;
    options.AssumeDefaultVersionWhenUnspecified = true;
    options.ApiVersionReader = ApiVersionReader.Combine(
        new UrlSegmentApiVersionReader(),
        new HeaderApiVersionReader("X-Api-Version")

        );
})
    .AddMvc()
    .AddApiExplorer(options =>
    {
        options.GroupNameFormat = "'v'VVV";
        options.SubstituteApiVersionInUrl = true;
    }
    );

builder.Services.AddMediatR(cfg =>
       cfg.RegisterServicesFromAssembly(typeof(GetPersonByNationalCodeQuery).Assembly));



builder.Services.AddDbContext<RealEstateInfoApiContext>();




var app = builder.Build();

if (app.Environment.IsDevelopment())
{
    app.MapOpenApi();
}


app.UseSwagger();
app.UseSwaggerUI();

app.UseHttpsRedirection();

app.UseAuthorization();

app.MapControllers();

app.Run();
