using MediatR;
using System;
using System.Collections.Generic;

namespace MyCmsProject.Application.Commands.Posts
{
    public record AssignCategoryCommand(
        Guid PostId,
        List<Guid> CategoryIds
    ) : IRequest<bool>;
}
