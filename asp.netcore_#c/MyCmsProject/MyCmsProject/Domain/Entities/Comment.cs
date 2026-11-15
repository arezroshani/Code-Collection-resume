using MyCmsProject.Domain.Common;

namespace MyCmsProject.Domain.Entities
{
    public class Comment : BaseEntity
    {
        public Guid UserId { get; set; }
        public string Content { get; set; } = string.Empty;
        public bool IsApproved { get; set; } = false;
        public Guid PostId { get; set; }
        public Post Post { get; set; } = null!;
        public Guid? ParentId { get; set; }
        public Comment? Parent { get; set; }
        public ICollection<Comment> Replies { get; set; } = new List<Comment>();
    }

}
