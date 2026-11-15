namespace MyCmsProject.Domain.ValueObjects
{
    public class Content
    {
        public string Text { get; private set; }

        public Content(string text)
        {
            if (string.IsNullOrWhiteSpace(text))
                throw new ArgumentException("Content cannot be empty.");
            Text = text;
        }
    }
}
