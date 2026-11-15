using MediatR;
using System;
using System.Collections.Generic;

namespace MyCmsProject.Application.Commands.Posts
{
    public record CreatePostCommand(
        string Title,
        string Content,
        Guid UserId
    ) : IRequest<Guid>;
}
