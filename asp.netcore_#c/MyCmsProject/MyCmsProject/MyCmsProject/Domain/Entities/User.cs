using MyCmsProject.Domain.Common;
using MyCmsProject.Domain.Enums;

namespace MyCmsProject.Domain.Entities
{
    public class User : BaseEntity
    {

        public Role Role { get; set; } = Role.Subscriber;
        public string FirstName { get; set; } = string.Empty;
        public string LastName { get; set; } = string.Empty;
        public string Email { get; set; } = string.Empty;
        public string Phone { get; set; } = string.Empty;
    }
}
