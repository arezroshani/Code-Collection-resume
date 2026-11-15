using System.Data;

namespace RealEstateInfoApi.Application.Query.Contracts.Data;

public interface ISqlConnectionFactory
{
    IDbConnection CreateConnection();
}
