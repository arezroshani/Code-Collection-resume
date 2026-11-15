using MediatR;
using System;

namespace MyCmsProject.Application.Commands.Posts
{
    public record DeletePostCommand(
        Guid Id
    ) : IRequest<bool>; 
}
