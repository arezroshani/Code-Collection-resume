using MediatR;
using Microsoft.EntityFrameworkCore;
using MyCmsProject.Application.Commands.Posts;
using MyCmsProject.Domain.Entities;
using MyCmsProject.Infrastructure.Persistence;
using System;
using System.Linq;
using System.Threading;
using System.Threading.Tasks;

namespace MyCmsProject.Application.Commands.Posts.Handlers
{
    public class UpdatePostCommandHandler : IRequestHandler<UpdatePostCommand, bool>
    {
        private readonly AppDbContext _context;

        public UpdatePostCommandHandler(AppDbContext context) => _context = context;

        public async Task<bool> Handle(UpdatePostCommand request, CancellationToken cancellationToken)
        {
            var post = await _context.Posts
                .Include(p => p.Categories)
                .Include(p => p.Tags)
                .FirstOrDefaultAsync(p => p.Id == request.Id, cancellationToken);

            if (post == null)
                return false;

            // حداقل یک دسته باید انتخاب شود
            if (post.Categories == null || !post.Categories.Any())
                throw new InvalidOperationException("At least one category must be assigned to the post.");

            post.Title = request.Title;
            post.Content = request.Content;

           
            await _context.SaveChangesAsync(cancellationToken);
            return true;
        }
    }
}
