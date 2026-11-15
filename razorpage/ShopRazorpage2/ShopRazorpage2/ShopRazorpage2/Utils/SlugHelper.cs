using System.Globalization;
using System.Text;
using System.Text.RegularExpressions;

namespace ShopRazorpage2.Utils
{
    public static class SlugHelper
    {
        public static string GenerateSlug(string phrase)
        {
            if (string.IsNullOrWhiteSpace(phrase)) return Guid.NewGuid().ToString();
            // normalize
            string str = phrase.ToLowerInvariant().Trim();

            // replace Persian/Arabic characters normalization if needed (basic)
            // remove diacritics if present
            str = str.Normalize(NormalizationForm.FormD);
            var sb = new StringBuilder();
            foreach (var ch in str)
            {
                var uc = CharUnicodeInfo.GetUnicodeCategory(ch);
                if (uc != System.Globalization.UnicodeCategory.NonSpacingMark)
                    sb.Append(ch);
            }
            str = sb.ToString().Normalize(NormalizationForm.FormC);

            // replace invalid chars with dash
            str = Regex.Replace(str, @"[^a-z0-9\u0600-\u06FF]+", "-"); // allow numbers, english & basic arabic/persian
            str = Regex.Replace(str, @"-+", "-").Trim('-');

            if (string.IsNullOrWhiteSpace(str))
                str = Guid.NewGuid().ToString();

            return str;
        }
    }
}
