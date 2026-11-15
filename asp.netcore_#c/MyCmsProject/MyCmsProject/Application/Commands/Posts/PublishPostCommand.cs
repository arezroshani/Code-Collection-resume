using MediatR;
using System;

namespace MyCmsProject.Application.Commands.Posts
{
    public record PublishPostCommand(Guid Id) : IRequest<bool>;
}
