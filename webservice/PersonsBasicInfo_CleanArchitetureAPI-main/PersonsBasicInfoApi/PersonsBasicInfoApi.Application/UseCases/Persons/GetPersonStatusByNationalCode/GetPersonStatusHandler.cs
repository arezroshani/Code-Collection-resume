using MediatR;
using PersonsBasicInfoApi.Domain.Exceptions;
using PersonsBasicInfoApi.Application.Query.Contracts.Repositories;
using PersonsBasicInfoApi.Domain.ValueObjects.person;
using PersonsBasicInfoApi.Application.Query.UseCases.Persons.GetPersonStatusByNationalCode;

namespace PersonsBasicInfoApi.Application.Query.UseCases.Persons.GetPersonStatusByNationalCode;

public class GetPersonStatusHandler : IRequestHandler<GetPersonStatusQuery, Result<PersonStatusDto>>
{
    private readonly IPersonRepository _personRepository;

    public GetPersonStatusHandler(IPersonRepository personRepository)
    {
        _personRepository = personRepository;
    }

    public async Task<Result<PersonStatusDto>> Handle(GetPersonStatusQuery request, CancellationToken cancellationToken)
    {
      
        var nationalCodeResult = NationalCode.Create(request.NationalCode);
        if (nationalCodeResult.IsFailure)
            return Result<PersonStatusDto>.Failure(nationalCodeResult.Error!);

        
        var status = await _personRepository.GetStatusByNationalCodeAsync(nationalCodeResult.Value, cancellationToken);

        
        if (string.IsNullOrEmpty(status))
            return Result<PersonStatusDto>.Failure(Errors.Person.NotFound);

      
        var response = new PersonStatusDto
   (
       nationalCodeResult.Value.Value, 
       status,                        
       new List<StatusHistoryDto>()   
   );

        return Result<PersonStatusDto>.Success(response);
    }
}
