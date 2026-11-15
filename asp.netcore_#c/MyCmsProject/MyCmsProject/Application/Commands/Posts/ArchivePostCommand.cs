using MediatR;
using System;

namespace MyCmsProject.Application.Commands.Posts
{
    public record ArchivePostCommand(Guid Id) : IRequest<bool>;
}
