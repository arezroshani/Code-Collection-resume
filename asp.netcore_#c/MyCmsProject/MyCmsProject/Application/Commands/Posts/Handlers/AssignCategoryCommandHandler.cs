using MediatR;
using Microsoft.EntityFrameworkCore;
using MyCmsProject.Application.Commands.Posts;
using MyCmsProject.Domain.Entities;
using MyCmsProject.Infrastructure.Persistence;
using System.Linq;
using System.Threading;
using System.Threading.Tasks;
using System.Collections.Generic;

namespace MyCmsProject.Application.Commands.Posts.Handlers
{
    public class AssignCategoryCommandHandler : IRequestHandler<AssignCategoryCommand, bool>
    {
        private readonly AppDbContext _context;
        public AssignCategoryCommandHandler(AppDbContext context) => _context = context;

        public async Task<bool> Handle(AssignCategoryCommand request, CancellationToken cancellationToken)
        {
            var post = await _context.Posts
                .Include(p => p.Categories) // Load Navigation Property
                .FirstOrDefaultAsync(p => p.Id == request.PostId, cancellationToken);

            if (post == null) return false;

            var categories = await _context.Categories
                .Where(c => request.CategoryIds.Contains(c.Id))
                .ToListAsync(cancellationToken);

            post.Categories = categories;

            await _context.SaveChangesAsync(cancellationToken);
            return true;
        }
    }
}
