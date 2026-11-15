using MyCmsProject.Domain.Common;
using System;
using System.Collections.Generic;

namespace MyCmsProject.Domain.Entities
{
    public class Category : BaseEntity
    {
        public string Name { get; set; } = string.Empty;
        public string Url { get; set; } = string.Empty;

        public Guid? ParentId { get; set; }
        public Category Parent { get; set; }

        // هر دسته می‌تواند چند پست داشته باشد
        public ICollection<Post> Posts { get; set; } = new List<Post>();
    }
}
