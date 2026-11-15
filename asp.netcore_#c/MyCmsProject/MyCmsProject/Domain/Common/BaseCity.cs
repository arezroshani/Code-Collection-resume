namespace MyCmsProject.Domain.Common
{
    public class BaseCity : BaseArticle
    {
        public string Name { get; set; } = string.Empty;
        public string Url { get; set; } = string.Empty;
        public Guid? ParentId { get; set; }

        public List<Guid> CategoryIds { get; set; } = new();
        public List<Guid> TagIds { get; set; } = new();
    }
}
