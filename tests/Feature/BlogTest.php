<?php

namespace Tests\Feature;

use App\Blog;
use Tests\TestCase;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class BlogTest extends TestCase
{
    use DatabaseMigrations;

    /** @test */
    function it_pulls_a_list_of_blogs()
    {
        factory(Blog::class, 5)->create();
        $blog = factory(Blog::class)->create();

        $this->json('GET', '/api/v1/blog')
            ->assertStatus(200)
            ->assertJsonFragment([
                'title' => $blog->title,
                'body' => $blog->body,
                'published_at' => $blog->published_at->toDateTimeString()
            ]);
    }
}
