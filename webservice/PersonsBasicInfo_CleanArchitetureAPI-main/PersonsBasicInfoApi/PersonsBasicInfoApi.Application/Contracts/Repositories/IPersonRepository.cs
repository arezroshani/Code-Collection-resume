using PersonsBasicInfoApi.Domain.Entities.Persons;
using PersonsBasicInfoApi.Domain.ValueObjects.person; 

namespace PersonsBasicInfoApi.Application.Query.Contracts.Repositories;

public interface IPersonRepository
{
   
    Task<Person?> GetFullDetailsByNationalCodeAsync(NationalCode nationalCode, CancellationToken cancellationToken);

    Task<string?> GetStatusByNationalCodeAsync(NationalCode nationalCode, CancellationToken cancellationToken);
}
