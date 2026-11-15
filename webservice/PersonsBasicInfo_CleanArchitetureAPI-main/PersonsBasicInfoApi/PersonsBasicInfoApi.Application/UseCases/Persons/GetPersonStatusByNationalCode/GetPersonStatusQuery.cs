using MediatR;
using PersonsBasicInfoApi.Domain.Exceptions; 

namespace PersonsBasicInfoApi.Application.Query.UseCases.Persons.GetPersonStatusByNationalCode;

public record GetPersonStatusQuery(string NationalCode) : IRequest<Result<PersonStatusDto>>;
