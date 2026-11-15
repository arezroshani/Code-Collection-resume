using MediatR;
using PersonsBasicInfoApi.Application.Query.Contracts.Repositories;
using PersonsBasicInfoApi.Domain.ValueObjects.person;
using PersonsBasicInfoApi.Domain.Exceptions;

namespace PersonsBasicInfoApi.Application.Query.UseCases.Persons.GetPersonByNationalCode;

public class GetPersonByNationalCodeHandler : IRequestHandler<GetPersonByNationalCodeQuery, Result<PersonResponseDto>>
{
    private readonly IPersonRepository _repository;

    public GetPersonByNationalCodeHandler(IPersonRepository repository)
    {
        _repository = repository;
    }

    public async Task<Result<PersonResponseDto>> Handle(GetPersonByNationalCodeQuery request, CancellationToken cancellationToken)
    {
        // ۱. اعتبارسنجی کد ملی
        var nationalCodeResult = NationalCode.Create(request.NationalCode);
        if (nationalCodeResult.IsFailure)
        {
            return Result<PersonResponseDto>.Failure(nationalCodeResult.Error!);
        }

        // ۲. دریافت موجودیت از دیتابیس
        var person = await _repository.GetFullDetailsByNationalCodeAsync(nationalCodeResult.Value, cancellationToken);

        // ۳. بررسی وجود شخص
        if (person is null)
        {
            return Result<PersonResponseDto>.Failure(Errors.Person.NotFound);
        }

        
        var response = new PersonResponseDto
        (
          person.NationalCode.Value,
            person.FirstName,
            person.LastName
               
        );

        return Result<PersonResponseDto>.Success(response);
    }
}
