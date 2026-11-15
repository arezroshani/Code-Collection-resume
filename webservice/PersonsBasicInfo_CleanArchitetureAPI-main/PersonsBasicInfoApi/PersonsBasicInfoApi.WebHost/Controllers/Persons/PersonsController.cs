using Asp.Versioning;
using MediatR;
using Microsoft.AspNetCore.Mvc;
using PersonsBasicInfoApi.Application.Query.UseCases.Persons.GetPersonByNationalCode;
using PersonsBasicInfoApi.Application.Query.UseCases.Persons.GetPersonStatusByNationalCode; 

using PersonsBasicInfoApi.Domain.Exceptions;

namespace PersonsBasicInfoApi.WebHost.Controllers.Persons;

[ApiController]


[Route("api/v{version:apiVersion}/persons")]
[ApiVersion("1.0")]
public class PersonsController : ControllerBase
{
    private readonly ISender _sender;

    public PersonsController(ISender sender)
    {
        _sender = sender;
    }



    [HttpGet("info/{nationalCode}")]
    [ProducesResponseType(StatusCodes.Status200OK)]
    [ProducesResponseType(typeof(Error), StatusCodes.Status404NotFound)]
    [ProducesResponseType(typeof(Error), StatusCodes.Status400BadRequest)]
    public async Task<IActionResult> GetByNationalCode([FromRoute] string nationalCode, CancellationToken cancellationToken)
    {
        var query = new GetPersonByNationalCodeQuery(nationalCode);
        var result = await _sender.Send(query, cancellationToken);

        if (result.IsFailure)
        {
            if (result.Error!.status == Errors.Person.NotFound.status)
                return NotFound(result.Error);

            return BadRequest(result.Error);
        }
        return Ok(result.Value);
    }

  

    [HttpGet("status/{nationalCode}")]
    [ProducesResponseType(StatusCodes.Status200OK)]
    [ProducesResponseType(typeof(Error), StatusCodes.Status400BadRequest)]
    public async Task<IActionResult> GetStatusByNationalCode([FromRoute] string nationalCode, CancellationToken cancellationToken)
    {
        var query = new GetPersonStatusQuery(nationalCode);

        var result = await _sender.Send(query, cancellationToken);

        if (result.IsFailure)
        {
            return BadRequest(result.Error);
        }

        return Ok(result.Value);
    }
}
