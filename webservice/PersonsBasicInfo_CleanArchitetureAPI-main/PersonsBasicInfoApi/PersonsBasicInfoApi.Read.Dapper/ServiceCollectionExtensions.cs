using Dapper;
using Microsoft.Extensions.Configuration;
using Microsoft.Extensions.DependencyInjection;
using PersonsBasicInfoApi.Application.Query.Contracts.Data;
using PersonsBasicInfoApi.Application.Query.Contracts.Repositories;
using PersonsBasicInfoApi.Read.Dapper.Data;
using PersonsBasicInfoApi.Read.Dapper.Repositories;
using PersonsBasicInfoApi.Read.Dapper.Handlers;

namespace PersonsBasicInfoApi.Read.Dapper;

public static class ServiceCollectionExtensions
{
    public static IServiceCollection AddDapperServices(this IServiceCollection services, IConfiguration configuration)
    {
        services.AddScoped<ISqlConnectionFactory, SqlConnectionFactory>();
        services.AddScoped<IPersonRepository, PersonRepository>();

        SqlMapper.AddTypeHandler(new NationalCodeTypeHandler());

      

        return services;
    }
}
