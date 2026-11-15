using RealEstateInfoApi.Domain.Entities.Persons;
using RealEstateInfoApi.Domain.ValueObjects.person;

namespace RealEstateInfoApi.Application.Query.Contracts.Repositories;

public interface IPersonRepository
{
    Task<Person?> GetByNationalCodeAsync(NationalCode nationalCode, CancellationToken cancellationToken);
}
