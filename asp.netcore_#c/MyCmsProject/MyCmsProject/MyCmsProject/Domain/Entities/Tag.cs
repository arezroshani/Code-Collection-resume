using MyCmsProject.Domain.Common;

namespace MyCmsProject.Domain.Entities
{
    public class Tag : BaseEntity
    {
        public string Name { get; set; } = string.Empty;
        public string Url { get; set; } = string.Empty;
        public ICollection<Post> Posts { get; set; } = new List<Post>();

    }
}
