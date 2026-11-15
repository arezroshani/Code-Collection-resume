namespace RealEstateInfoApi.Domain.Exceptions;

public sealed record Error(string status,string? Message=null)
{
}
