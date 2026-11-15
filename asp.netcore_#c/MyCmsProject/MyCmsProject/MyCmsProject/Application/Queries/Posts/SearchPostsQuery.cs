using MediatR;
using MyCmsProject.Application.DTOs;
using System.Collections.Generic;

namespace MyCmsProject.Application.Queries.Posts
{
    public record SearchPostsQuery(string Keyword) : IRequest<List<PostDto>>;
}
