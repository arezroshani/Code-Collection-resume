namespace MyCmsProject.Domain.ValueObjects
{
    public class Url
    {
        public string Link { get; private set; }

        public Url(string link)
        {
            if (string.IsNullOrWhiteSpace(link))
                throw new ArgumentException("URL cannot be empty.");
            if (!Uri.IsWellFormedUriString(link, UriKind.RelativeOrAbsolute))
                throw new ArgumentException("Invalid URL format.");
            Link = link;
        }
    }
}
