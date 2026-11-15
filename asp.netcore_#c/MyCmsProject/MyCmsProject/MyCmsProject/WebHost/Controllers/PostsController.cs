using Microsoft.AspNetCore.Mvc;
using MediatR;
using MyCmsProject.Application.Commands.Posts;
using MyCmsProject.Application.Queries.Posts;
using MyCmsProject.Application.DTOs;

namespace MyCmsProject.WebHost.Controllers
{
    [ApiController]
    [Route("api/[controller]")]
    public class PostsController : ControllerBase
    {
        private readonly IMediator _mediator;

        public PostsController(IMediator mediator)
        {
            _mediator = mediator;
        }

        // GET: api/posts
        [HttpGet]
        public async Task<IActionResult> GetAll()
        {
            var posts = await _mediator.Send(new GetPostsQuery());
            return Ok(posts);
        }

        // GET: api/posts/{id}
        [HttpGet("{id}")]
        public async Task<IActionResult> GetById(Guid id)
        {
            var post = await _mediator.Send(new GetPostByIdQuery(id));
            return post == null ? NotFound() : Ok(post);
        }

        // POST: api/posts/{id}/archive
        [HttpPost("{id}/archive")]
        public async Task<IActionResult> Archive(Guid id)
        {
            var success = await _mediator.Send(new ArchivePostCommand(id));
            return success ? Ok(new { Message = "Post archived." }) : NotFound();
        }

        // POST: api/posts
        [HttpPost]
        public async Task<IActionResult> Create([FromBody] CreatePostCommand dto)
        {
            var id = await _mediator.Send(new CreatePostCommand(
                dto.Title,
                dto.Content,
                dto.UserId
            ));

            return CreatedAtAction(nameof(GetById), new { id }, new { id });
        }

        // PUT: api/posts/{id}
        [HttpPut("{id}")]
        public async Task<IActionResult> Update(Guid id, [FromBody] UpdatePostCommand dto)
        {
            var updatedPost = await _mediator.Send(new UpdatePostCommand(
                id,
                dto.Title,
                dto.Content
            ));

            return updatedPost == null ? NotFound() : Ok(updatedPost);
        }

        // DELETE: api/posts/{id}
        [HttpDelete("{id}")]
        public async Task<IActionResult> Delete(Guid id)
        {
            var ok = await _mediator.Send(new DeletePostCommand(id));
            return ok ? NoContent() : NotFound();
        }
    }
}
