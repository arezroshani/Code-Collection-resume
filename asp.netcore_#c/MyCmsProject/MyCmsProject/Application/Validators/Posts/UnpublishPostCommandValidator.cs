using FluentValidation;
using MyCmsProject.Application.Commands.Posts;

namespace MyCmsProject.Application.Validators.Posts
{
    public class UnpublishPostCommandValidator : AbstractValidator<UnpublishPostCommand>
    {
        public UnpublishPostCommandValidator()
        {
            RuleFor(x => x.Id)
                .NotEmpty().WithMessage(" Post Id is invalid.");
        }
    }
}
