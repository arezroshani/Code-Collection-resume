
using MediatR;
using RealEstateInfoApi.Domain.Exceptions;

namespace RealEstateInfoApi.Application.Query.UseCase.Persons.GetPersonByNationalCode;

public record GetPersonByNationalCodeQuery(string NationalCode) : IRequest<Result<PersonResponseDto>>;
