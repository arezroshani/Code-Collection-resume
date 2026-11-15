using MyCmsProject.Domain.Common;

namespace MyCmsProject.Domain.Entities
{
    public class Media : BaseEntity
    {
        public string Url { get; set; } = string.Empty;
        public string Title { get; set; } = string.Empty;
        public string Alt { get; set; } = string.Empty;
        public string Name { get; set; } = string.Empty;
    }
}
