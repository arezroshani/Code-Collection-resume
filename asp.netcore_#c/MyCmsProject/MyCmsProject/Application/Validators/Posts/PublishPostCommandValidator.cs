using FluentValidation;
using MyCmsProject.Application.Commands.Posts;

namespace MyCmsProject.Application.Validators.Posts
{
    public class PublishPostCommandValidator : AbstractValidator<PublishPostCommand>
    {
        public PublishPostCommandValidator()
        {
            RuleFor(x => x.Id)
                .NotEmpty().WithMessage(" Post Id is invalid.");
        }
    }
}
