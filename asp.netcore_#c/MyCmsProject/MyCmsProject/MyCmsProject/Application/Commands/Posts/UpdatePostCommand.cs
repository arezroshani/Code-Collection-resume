using MediatR;
using System;

namespace MyCmsProject.Application.Commands.Posts
{
    public record UpdatePostCommand(
        Guid Id,
        string Title,
        string Content
    ) : IRequest<bool>;
}
