using MediatR;
using Microsoft.EntityFrameworkCore;
using MyCmsProject.Application.Commands.Posts;
using MyCmsProject.Infrastructure.Persistence;
using System.Threading;
using System.Threading.Tasks;

namespace MyCmsProject.Application.Commands.Posts.Handlers
{
    public class ArchivePostCommandHandler : IRequestHandler<ArchivePostCommand, bool>
    {
        private readonly AppDbContext _context;
        public ArchivePostCommandHandler(AppDbContext context) => _context = context;

        public async Task<bool> Handle(ArchivePostCommand request, CancellationToken cancellationToken)
        {
            var post = await _context.Posts.FirstOrDefaultAsync(p => p.Id == request.Id, cancellationToken);
            if (post == null) return false;

            post.IsDeleted = true; // آرشیو شدن
            await _context.SaveChangesAsync(cancellationToken);
            return true;
        }
    }
}
