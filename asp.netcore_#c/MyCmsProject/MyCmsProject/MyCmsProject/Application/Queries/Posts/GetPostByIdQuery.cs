using MediatR;
using MyCmsProject.Application.DTOs;

namespace MyCmsProject.Application.Queries.Posts
{
    public record GetPostByIdQuery(Guid Id) : IRequest<PostDto?>;
}
