<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class SendFaceToAzureTest extends TestCase
{
    /** @test */
    public function it_posts_a_picture_to_azure_and_returns_face_id()
    {
        $this->post(config['azure']['url'].'/');
    }

    /** @test */
    public function it_makes_a_post_request_to_azure()
    {
        $this->postJson('/api/v1/search/face')
            ->assertStatus(200)
            ->assertJsonStructure(['face-id']);
    }
}
