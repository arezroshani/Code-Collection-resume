using MediatR;
using System;

namespace MyCmsProject.Application.Commands.Posts
{
    public record UnpublishPostCommand(Guid Id) : IRequest<bool>;
}
