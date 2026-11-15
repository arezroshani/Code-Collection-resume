using MediatR;
using System;

namespace MyCmsProject.Application.Commands.Posts
{
    public record AddCommentToPostCommand(
        Guid PostId,
        Guid UserId,
        string Content,
        Guid? ParentId = null
    ) : IRequest<bool>;
}
