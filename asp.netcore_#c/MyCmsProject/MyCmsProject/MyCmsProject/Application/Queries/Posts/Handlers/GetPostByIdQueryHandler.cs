using MediatR;
using Microsoft.EntityFrameworkCore;
using MyCmsProject.Application.DTOs;
using MyCmsProject.Infrastructure.Persistence;
using System.Linq;
using System.Threading;
using System.Threading.Tasks;

namespace MyCmsProject.Application.Queries.Posts.Handlers
{
    public class GetPostByIdQueryHandler : IRequestHandler<GetPostByIdQuery, PostDto?>
    {
        private readonly AppDbContext _context;

        public GetPostByIdQueryHandler(AppDbContext context)
        {
            _context = context;
        }

        public async Task<PostDto?> Handle(GetPostByIdQuery request, CancellationToken cancellationToken)
        {
            var post = await _context.Posts
                .Include(p => p.Categories)
                .Include(p => p.Tags)
                .Include(p => p.Comments)
                .FirstOrDefaultAsync(p => p.Id == request.Id
                                          && !p.IsDeleted
                                          && !p.IsArchived, cancellationToken);

            if (post == null) return null;

            return new PostDto
            {
                Id = post.Id,
                Title = post.Title,
                Content = post.Content,
                Url = post.Url,
                PublishedDate = post.PublishedDate,
                Categories = post.Categories.Select(c => new CategoryDto
                {
                    Id = c.Id,
                    Name = c.Name,
                    Url = c.Url
                }).ToList(),
                Tags = post.Tags.Select(t => new TagDto
                {
                    Id = t.Id,
                    Name = t.Name
                }).ToList(),
                Comments = post.Comments.Select(c => new CommentDto
                {
                    Id = c.Id,
                    Content = c.Content,
                    UserId = c.UserId,
                    IsApproved = c.IsApproved
                }).ToList()
            };
        }
    }
}
