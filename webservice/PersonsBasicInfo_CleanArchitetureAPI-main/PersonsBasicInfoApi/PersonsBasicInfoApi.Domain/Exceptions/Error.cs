namespace PersonsBasicInfoApi.Domain.Exceptions;


public sealed record Error(string status, string? Message = null)
{
    public static readonly Error None = new(string.Empty, null);
}
