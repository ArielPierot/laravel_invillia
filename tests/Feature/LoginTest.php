<?php

namespace Tests\Feature;

use App\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class LoginTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function a_new_user_created_can_to_login()
    {
        $user = $this->signIn();
        $this->assertAuthenticatedAs($user);
    }
}
