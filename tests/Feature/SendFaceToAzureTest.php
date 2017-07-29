<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Support\Facades\Storage;

class SendFaceToAzureTest extends TestCase
{
    /** @test */
    public function it_posts_a_picture_to_azure_and_returns_face_id()
    {

        $this->post(config('app.azure.url'.'/detect'))
            ->assertStatus(200)
            ->assertJsonStructure([['face-id']]);
    }


    public function it_makes_a_post_request_to_azure()
    {
        $this->postJson('/api/v1/search/face')
            ->assertStatus(200)
            ->assertJsonStructure(['face-id']);
    }
}
