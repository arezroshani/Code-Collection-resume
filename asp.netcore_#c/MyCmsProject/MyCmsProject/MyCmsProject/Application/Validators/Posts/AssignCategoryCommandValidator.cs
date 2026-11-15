using FluentValidation;
using MyCmsProject.Application.Commands.Posts;

namespace MyCmsProject.Application.Validators.Posts
{
    public class AssignCategoryCommandValidator : AbstractValidator<AssignCategoryCommand>
    {
        public AssignCategoryCommandValidator()
        {
            RuleFor(x => x.PostId)
                .NotEmpty().WithMessage(" Post Id is invalid.");

            RuleFor(x => x.CategoryIds)
                .NotEmpty().WithMessage(" At least one category must be selected.");
        }
    }
}
