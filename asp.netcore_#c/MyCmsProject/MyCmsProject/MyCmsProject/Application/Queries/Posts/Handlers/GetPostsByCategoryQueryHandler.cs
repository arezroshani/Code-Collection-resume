using MediatR;
using Microsoft.EntityFrameworkCore;
using MyCmsProject.Application.DTOs;
using MyCmsProject.Infrastructure.Persistence;
using System;
using System.Collections.Generic;
using System.Linq;
using System.Threading;
using System.Threading.Tasks;

namespace MyCmsProject.Application.Queries.Posts.Handlers
{
    public class GetPostsByCategoryQueryHandler
        : IRequestHandler<GetPostsByCategoryQuery, List<PostDto>>
    {
        private readonly AppDbContext _context;

        public GetPostsByCategoryQueryHandler(AppDbContext context)
        {
            _context = context;
        }

        public async Task<List<PostDto>> Handle(GetPostsByCategoryQuery request, CancellationToken cancellationToken)
        {
            var posts = await _context.Posts
                .Include(p => p.Categories)
                .Include(p => p.Tags)
                .Include(p => p.Comments)
                .Where(p => p.Categories.Any(c => c.Id == request.CategoryId)
                            && !p.IsDeleted
                            && !p.IsArchived)
                .ToListAsync(cancellationToken);

            // تبدیل به DTO
            return posts.Select(p => new PostDto
            {
                Id = p.Id,
                Title = p.Title,
                Content = p.Content,
                Url = p.Url,
                PublishedDate = p.PublishedDate,
                Categories = p.Categories.Select(c => new CategoryDto
                {
                    Id = c.Id,
                    Name = c.Name,
                    Url = c.Url
                }).ToList(),
                Tags = p.Tags.Select(t => new TagDto
                {
                    Id = t.Id,
                    Name = t.Name
                }).ToList(),
                Comments = p.Comments.Select(c => new CommentDto
                {
                    Id = c.Id,
                    Content = c.Content,
                    UserId = c.UserId,
                    IsApproved = c.IsApproved
                }).ToList()
            }).ToList();
        }
    }
}
