
namespace RealEstateInfoApi.Application.Query.UseCase.Persons.GetPersonByNationalCode;

public record PersonResponseDto(string NationalCode, string FirstName, string LastName, List<PropertyResponseDto> Properties);


public record PropertyResponseDto(string Title, decimal Area,string Address);
