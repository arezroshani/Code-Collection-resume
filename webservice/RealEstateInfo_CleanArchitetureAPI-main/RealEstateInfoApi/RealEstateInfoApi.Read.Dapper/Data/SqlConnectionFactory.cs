using Microsoft.Extensions.Configuration;
using Microsoft.Data.SqlClient;
using RealEstateInfoApi.Application.Query.Contracts.Data; 
using System.Data;

namespace RealEstateInfoApi.Infrastructure.Dapper.Data;

public class SqlConnectionFactory : ISqlConnectionFactory
{
    private readonly IConfiguration _configuration;

    public SqlConnectionFactory(IConfiguration configuration)
    {
        _configuration = configuration;
    }

    public IDbConnection CreateConnection()
    {
        return new SqlConnection(_configuration.GetConnectionString("DefaultConnection"));
    }
}
