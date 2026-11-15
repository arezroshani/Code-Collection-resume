using FluentValidation;
using MyCmsProject.Application.Commands.Posts;

namespace MyCmsProject.Application.Validators.Posts
{
    public class UpdatePostCommandValidator : AbstractValidator<UpdatePostCommand>
    {
        public UpdatePostCommandValidator()
        {
            RuleFor(x => x.Id)
                .NotEmpty().WithMessage("Post Id is invalid.");

            RuleFor(x => x.Title)
                .NotEmpty().WithMessage("Title cannot be empty.")
                .MaximumLength(200);

            RuleFor(x => x.Content)
                .NotEmpty().WithMessage("Content cannot be empty.");
        }
    }
}
