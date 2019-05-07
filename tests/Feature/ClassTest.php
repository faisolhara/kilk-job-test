<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use App\ClassModel;
use App\User;

class ClassTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testUrlIndex()
    {

        $response = $this->get('/class');
        $response->assertStatus(302);

        $user = factory(User::class)->create();

        $response = $this->actingAs($user)
                         ->withSession(['auth' => true])
                         ->get('/class');
    }

    public function testUrlAdd()
    {

        $response = $this->get('/class/add');
        $response->assertStatus(302);

        $user = factory(User::class)->create();

        $response = $this->actingAs($user)
                         ->withSession(['auth' => true])
                         ->get('/class/add');
    }

    public function testUrlEdit()
    {
        $response = $this->get('/class/edit/1');
        $response->assertStatus(302);

        $user = factory(User::class)->create();

        $response = $this->actingAs($user)
                         ->withSession(['auth' => true])
                         ->get('/class/edit');
    }
}
