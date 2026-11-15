using Asp.Versioning;
using MediatR;
using Microsoft.AspNetCore.Mvc;
using RealEstateInfoApi.Application.Query.UseCase.Persons.GetPersonByNationalCode;
using RealEstateInfoApi.Domain.Exceptions;

namespace RealEstateInfoApi.Presentation.Controllers;

[ApiController]
[Route("api/v{version:apiVersion}/getRealEstatesFromNC")]
[ApiVersion("1.0")]
public class PersonsController : ControllerBase
{
    private readonly ISender _sender;

    public PersonsController(ISender sender)
    {
        _sender = sender;
    }

    [HttpGet("{nationalCode}")]
    [ProducesResponseType(typeof(PersonResponseDto), StatusCodes.Status200OK)]
    [ProducesResponseType(typeof(Error), StatusCodes.Status404NotFound)]
    [ProducesResponseType(typeof(Error), StatusCodes.Status400BadRequest)]
    public async Task<IActionResult> GetByNationalCode([FromRoute] string nationalCode, CancellationToken cancellationToken)
    {
        var query = new GetPersonByNationalCodeQuery(nationalCode);

        var result = await _sender.Send(query, cancellationToken);

        if (result.IsFailure)
        {
            if (result.Error!.status == Errors.Person.NotFound.status)
            {
                return NotFound(result.Error);
            }

            return BadRequest(result.Error);
        }

        return Ok(result.Value);
    }
}
