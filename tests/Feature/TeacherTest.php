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

class TeacherTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testUrlIndex()
    {

        $response = $this->get('/teacher');
        $response->assertStatus(302);

        $user = factory(User::class)->create();

        $response = $this->actingAs($user)
                         ->withSession(['auth' => true])
                         ->get('/teacher');
    }

    public function testUrlAdd()
    {

        $response = $this->get('/teacher/add');
        $response->assertStatus(302);

        $user = factory(User::class)->create();

        $response = $this->actingAs($user)
                         ->withSession(['auth' => true])
                         ->get('/teacher/add');
    }

    public function testUrlEdit()
    {
        $response = $this->get('/teacher/edit/1');
        $response->assertStatus(302);

        $user = factory(User::class)->create();

        $response = $this->actingAs($user)
                         ->withSession(['auth' => true])
                         ->get('/teacher/edit');
    }
}
