using MediatR;
using Microsoft.EntityFrameworkCore;
using MyCmsProject.Application.Commands.Posts;
using MyCmsProject.Infrastructure.Persistence;
using System.Threading;
using System.Threading.Tasks;

namespace MyCmsProject.Application.Commands.Posts.Handlers
{
    public class UnpublishPostCommandHandler : IRequestHandler<UnpublishPostCommand, bool>
    {
        private readonly AppDbContext _context;
        public UnpublishPostCommandHandler(AppDbContext context) => _context = context;

        public async Task<bool> Handle(UnpublishPostCommand request, CancellationToken cancellationToken)
        {
            var post = await _context.Posts.FirstOrDefaultAsync(p => p.Id == request.Id, cancellationToken);
            if (post == null) return false;

            post.PublishedDate = default; 
            await _context.SaveChangesAsync(cancellationToken);
            return true;
        }
    }
}
