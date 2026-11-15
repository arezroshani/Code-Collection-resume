
using Dapper;
using Microsoft.Extensions.Configuration;
using Microsoft.Extensions.DependencyInjection;
using RealEstateInfoApi.Application.Query.Contracts.Data;
using RealEstateInfoApi.Application.Query.Contracts.Repositories;
using RealEstateInfoApi.Infrastructure.Dapper.Data;
using RealEstateInfoApi.Read.Dapper.Repositories;

namespace RealEstateInfoApi.Read.Dapper;

public static class ServiceCollectionExtensions
{
   public static IServiceCollection AddDapperServices(this IServiceCollection services,IConfiguration configuration)
    {
        services.AddScoped<ISqlConnectionFactory, SqlConnectionFactory>();
        services.AddScoped<IPersonRepository,PersonRepository>();

        return services;
    }
}
