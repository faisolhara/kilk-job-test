<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use App\Student;
use App\User;

class StudentTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testUrlIndex()
    {

        $response = $this->get('/student');
        $response->assertStatus(302);

        $user = factory(User::class)->create();

        $response = $this->actingAs($user)
                         ->withSession(['auth' => true])
                         ->get('/student');
    }

    public function testUrlAdd()
    {

        $response = $this->get('/student/add');
        $response->assertStatus(302);

        $user = factory(User::class)->create();

        $response = $this->actingAs($user)
                         ->withSession(['auth' => true])
                         ->get('/student/add');
    }

    public function testUrlEdit()
    {
        $response = $this->get('/student/edit/1');
        $response->assertStatus(302);

        $user = factory(User::class)->create();

        $response = $this->actingAs($user)
                         ->withSession(['auth' => true])
                         ->get('/student/edit');
    }
}
