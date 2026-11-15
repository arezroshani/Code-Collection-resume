using MyCmsProject.Domain.ValueObjects;

namespace MyCmsProject.Domain.Common
{
    public abstract class BaseArticle : BaseEntity
    {
        public string Title { get; set; } = string.Empty;
        public string Content { get; set; } = string.Empty;
        public DateTime PublishedDate { get; set; } = DateTime.UtcNow;
        public string Url { get; set; } = string.Empty;

    }
}
