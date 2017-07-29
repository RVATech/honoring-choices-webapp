<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class AdvanceDirectiveTest extends TestCase
{
    use DatabaseMigrations;

    /** @test */
    public function it_processes_advance_directives()
    {
        $payload = [
            'individual' => [
                'id' => 9999,
                'fname' => 'Chester',
                'mname' => 'Anderson',
                'lname' => 'Bennington',
                'dob' => '1976-03-20',
                'streetAddress' => '4431 N 7th Ave',
                'city' => 'Phoenix',
                'state' => 'AZ',
                'email' => 'string',
                'zip' => '85013',
                'telephone' => '1234567890',
            ],
            'signature' => [
                'signatureObject' => 'true'
            ]
        ];

        $this->postJson('/api/v1/individual', $payload)
            ->assertStatus(201)
            ->assertJsonStructure([
                'individual' => [
                    'id' => 1
                ],
                'signature' => [
                    'id' => 1
                ]
            ]);

        // Ignore any id passed in and return the database result
        unset($payload['individual']['id']);
        $this->assertDatabaseHas('individuals', $payload['individual']);
    }
}


