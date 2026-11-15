namespace MyCmsProject.Application.DTOs
{
    public class PostDto
    {
        public Guid Id { get; set; }
        public string Title { get; set; } = string.Empty;
        public string Content { get; set; } = string.Empty;

        public string Url { get; set; } = string.Empty;
        public DateTime PublishedDate { get; set; }

        public List<CategoryDto> Categories { get; set; } = new();
        public List<TagDto> Tags { get; set; } = new();
        public List<CommentDto> Comments { get; set; } = new();
    }
}
