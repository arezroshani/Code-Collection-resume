
using MediatR;
using RealEstateInfoApi.Domain.Exceptions;
using RealEstateInfoApi.Application.Query.Contracts.Repositories;
using RealEstateInfoApi.Domain.ValueObjects.person;

namespace RealEstateInfoApi.Application.Query.UseCase.Persons.GetPersonByNationalCode;

public class GetPersonByNationalCodeQueryHandler : IRequestHandler<GetPersonByNationalCodeQuery, Result<PersonResponseDto>>
{
    private readonly IPersonRepository _personRepository;

    public GetPersonByNationalCodeQueryHandler(IPersonRepository personRepository)
    {
        _personRepository = personRepository;
    }

    public async Task<Result<PersonResponseDto>> Handle(GetPersonByNationalCodeQuery request, CancellationToken cancellationToken)
    {
        var nationalCodeResult = NationalCode.Create(request.NationalCode);
        if (nationalCodeResult.IsFailure)
            return Result<PersonResponseDto>.Failure(nationalCodeResult.Error!);

        var person = await _personRepository.GetByNationalCodeAsync(nationalCodeResult.Value, cancellationToken);

        if (person is null)
            return Result<PersonResponseDto>.Failure(Errors.Person.NotFound);

        var response = new PersonResponseDto
            (
            
            person.NationalCode.Value,
            person.FirstName,
            person.LastName,
            person.Properties
            .Select(prop=>new PropertyResponseDto(prop.Title,prop.Area,prop.Address.ToString()??string.Empty))
            .ToList()

            );
        return Result<PersonResponseDto>.Success(response);

    }

}
