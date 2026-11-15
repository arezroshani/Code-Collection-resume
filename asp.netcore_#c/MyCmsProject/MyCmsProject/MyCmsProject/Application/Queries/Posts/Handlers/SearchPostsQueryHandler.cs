using MediatR;
using Microsoft.EntityFrameworkCore;
using MyCmsProject.Application.DTOs;
using MyCmsProject.Infrastructure.Persistence;
using System.Collections.Generic;
using System.Linq;
using System.Threading;
using System.Threading.Tasks;

namespace MyCmsProject.Application.Queries.Posts.Handlers
{
    public class SearchPostsQueryHandler
        : IRequestHandler<SearchPostsQuery, List<PostDto>>
    {
        private readonly AppDbContext _context;

        public SearchPostsQueryHandler(AppDbContext context)
        {
            _context = context;
        }

        public async Task<List<PostDto>> Handle(SearchPostsQuery request, CancellationToken cancellationToken)
        {
            var keyword = request.Keyword;

            var posts = await _context.Posts
                .Include(p => p.Categories)
                .Include(p => p.Tags)
                .Include(p => p.Comments)
                .Where(p => !p.IsDeleted && !p.IsArchived &&
                    (EF.Functions.Like(p.Title, $"%{keyword}%") ||
                     EF.Functions.Like(p.Content, $"%{keyword}%") ||
                     p.Categories.Any(c => EF.Functions.Like(c.Name, $"%{keyword}%")) ||
                     p.Tags.Any(t => EF.Functions.Like(t.Name, $"%{keyword}%"))
                    ))
                .ToListAsync(cancellationToken);

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
