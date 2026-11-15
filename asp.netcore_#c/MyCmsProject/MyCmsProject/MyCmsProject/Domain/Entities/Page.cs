using MyCmsProject.Domain.Common;

namespace MyCmsProject.Domain.Entities
{
    public class Page : BaseArticle
    {

        // فقط Title, Content, Url از BaseArticle ارث می‌برد
        // هیچ Category/Tag/Comment ندارد
    }
}
