using MyCmsProject.Domain.Common;
using MyCmsProject.Domain.Entities;

public class Post : BaseArticle
{
    public string Title { get; set; } = string.Empty;
    public string Content { get; set; } = string.Empty;

    // Many-to-Many
    public ICollection<Category> Categories { get; set; } = new List<Category>();
    public ICollection<Tag> Tags { get; set; } = new List<Tag>();

    // One-to-Many
    public ICollection<Comment> Comments { get; set; } = new List<Comment>();

    public Guid UserId { get; set; }
    public bool IsArchived { get; set; } = false;
}
