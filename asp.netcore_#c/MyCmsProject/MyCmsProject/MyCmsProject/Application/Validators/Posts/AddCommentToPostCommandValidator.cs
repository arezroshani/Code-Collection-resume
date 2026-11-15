using FluentValidation;
using MyCmsProject.Application.Commands.Posts;

namespace MyCmsProject.Application.Validators.Posts
{
    public class AddCommentToPostCommandValidator : AbstractValidator<AddCommentToPostCommand>
    {
        public AddCommentToPostCommandValidator()
        {
            RuleFor(x => x.PostId)
                .NotEmpty().WithMessage(" Post Id is invalid.");

            RuleFor(x => x.Content)
                .NotEmpty().WithMessage(" Comment content cannot be empty.");

            RuleFor(x => x.UserId)
                .NotEmpty().WithMessage(" UserId is invalid.");
        }
    }
}
