using Microsoft.EntityFrameworkCore;
using MyCmsProject.Domain.Common;
using MyCmsProject.Domain.Entities;

namespace MyCmsProject.Infrastructure.Persistence
{
    public class AppDbContext : DbContext
    {
        public AppDbContext(DbContextOptions<AppDbContext> options)
            : base(options)
        {
        }

        public DbSet<Post> Posts => Set<Post>();
        public DbSet<Page> Pages => Set<Page>();
        public DbSet<BaseCity> Cities => Set<BaseCity>();
        public DbSet<Comment> Comments => Set<Comment>();
        public DbSet<Media> Medias => Set<Media>();
        public DbSet<User> Users => Set<User>();
        public DbSet<Category> Categories => Set<Category>();
        public DbSet<Tag> Tags => Set<Tag>();
    }
}
