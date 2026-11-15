using System.Data;

namespace PersonsBasicInfoApi.Application.Query.Contracts.Data;

public interface ISqlConnectionFactory
{
    IDbConnection CreateConnection();
}
