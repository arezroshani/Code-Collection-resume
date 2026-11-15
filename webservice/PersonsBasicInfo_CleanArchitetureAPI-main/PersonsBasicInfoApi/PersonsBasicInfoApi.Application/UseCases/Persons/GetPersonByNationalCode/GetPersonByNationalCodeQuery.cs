using MediatR;
using PersonsBasicInfoApi.Domain.Exceptions;

namespace PersonsBasicInfoApi.Application.Query.UseCases.Persons.GetPersonByNationalCode;

public record GetPersonByNationalCodeQuery(string NationalCode) : IRequest<Result<PersonResponseDto>>;
