using MediatR;
using MyCmsProject.Application.DTOs;
using System;
using System.Collections.Generic;

namespace MyCmsProject.Application.Queries.Posts
{
    public record GetPostsByCategoryQuery(Guid CategoryId) : IRequest<List<PostDto>>;
}
