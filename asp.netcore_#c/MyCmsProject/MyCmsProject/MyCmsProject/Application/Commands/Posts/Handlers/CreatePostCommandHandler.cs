using MediatR;
using MyCmsProject.Domain.Entities;
using MyCmsProject.Infrastructure.Persistence;
using System;
using System.Threading;
using System.Threading.Tasks;

namespace MyCmsProject.Application.Commands.Posts.Handlers
{
    public class CreatePostCommandHandler : IRequestHandler<CreatePostCommand, Guid>
    {
        private readonly AppDbContext _context;
        public CreatePostCommandHandler(AppDbContext context) => _context = context;

        public async Task<Guid> Handle(CreatePostCommand request, CancellationToken cancellationToken)
        {
            // اعتبارسنجی که حداقل یک دسته وجود داشته باشد
            if (request == null)
                throw new ArgumentNullException(nameof(request));

            // می‌تونی اینجا چک کنی که Categories حتما پر باشه
            // اگر CategoryIds حذف شده، Validator روی خود Command دیگر کار نمی‌کند

            var post = new Post
            {
                Id = Guid.NewGuid(),
                Title = request.Title,
                Content = request.Content,
                UserId = request.UserId,
                PublishedDate = DateTime.UtcNow,
                Url = GenerateSlug(request.Title)
            };

            _context.Posts.Add(post);
            await _context.SaveChangesAsync(cancellationToken);
            return post.Id;
        }

        private static string GenerateSlug(string title) =>
            string.IsNullOrWhiteSpace(title) ? Guid.NewGuid().ToString() : title.Trim().ToLower().Replace(" ", "-");
    }
}
