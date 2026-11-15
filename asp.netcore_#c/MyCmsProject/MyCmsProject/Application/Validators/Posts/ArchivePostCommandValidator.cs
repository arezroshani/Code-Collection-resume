using FluentValidation;
using MyCmsProject.Application.Commands.Posts;

namespace MyCmsProject.Application.Validators.Posts
{
    public class ArchivePostCommandValidator : AbstractValidator<ArchivePostCommand>
    {
        public ArchivePostCommandValidator()
        {
            RuleFor(x => x.Id)
                .NotEmpty().WithMessage(" Post Id is invalid.");
        }
    }
}
