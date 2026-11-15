namespace PersonsBasicInfoApi.Application.Query.UseCases.Persons.GetPersonStatusByNationalCode;

public record PersonStatusDto(string NationalCode, string CurrentStatus, List<StatusHistoryDto> Histories);

public record StatusHistoryDto(string StatusTitle, string ChangeDate, string Description);
