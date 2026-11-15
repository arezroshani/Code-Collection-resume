using MediatR;
using MyCmsProject.Application.DTOs;
using System.Collections.Generic;

namespace MyCmsProject.Application.Queries.Posts
{
    public record GetPopularPostsQuery(int Count) : IRequest<List<PostDto>>;
}
