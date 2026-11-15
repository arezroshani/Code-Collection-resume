namespace MyCmsProject.Application.DTOs
{
    public class CommentDto
    {
        public Guid Id { get; set; }
        public string Content { get; set; } = string.Empty;
        public bool IsApproved { get; set; }
        public Guid UserId { get; set; }
    }
}
