using MediatR;
using Microsoft.EntityFrameworkCore;
using MyCmsProject.Application.Commands.Posts;
using MyCmsProject.Domain.Entities;
using MyCmsProject.Infrastructure.Persistence;
using System;
using System.Threading;
using System.Threading.Tasks;

namespace MyCmsProject.Application.Commands.Posts.Handlers
{
    public class AddCommentToPostCommandHandler : IRequestHandler<AddCommentToPostCommand, bool>
    {
        private readonly AppDbContext _context;
        public AddCommentToPostCommandHandler(AppDbContext context) => _context = context;

        public async Task<bool> Handle(AddCommentToPostCommand request, CancellationToken cancellationToken)
        {
            var post = await _context.Posts
                .Include(p => p.Comments) 
                .FirstOrDefaultAsync(p => p.Id == request.PostId, cancellationToken);

            if (post == null) return false;

            var comment = new Comment
            {
                Id = Guid.NewGuid(),       
                Content = request.Content,
                UserId = request.UserId,
                IsApproved = false,
                PostId = post.Id,
                Post = post,
                ParentId = request.ParentId
            };


            post.Comments.Add(comment);   
            await _context.SaveChangesAsync(cancellationToken);
            return true;
        }
    }
}
