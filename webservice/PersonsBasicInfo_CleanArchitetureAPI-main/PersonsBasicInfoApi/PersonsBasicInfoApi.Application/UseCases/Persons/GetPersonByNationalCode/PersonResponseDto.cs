namespace PersonsBasicInfoApi.Application.Query.UseCases.Persons.GetPersonByNationalCode;


public record PersonResponseDto(
    string NationalCode,
    string FirstName,
    string LastName
);


public record PersonStatusHistoryResponseDto(
    string StatusTitle,
    string ChangeDate,
    string Description
);
