<?php

namespace Tests;

use App\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\TestCase as BaseTestCase;
use Laravel\Passport\Passport;

abstract class TestCase extends BaseTestCase
{
    use CreatesApplication, RefreshDatabase;

    /**
     * @param User|null $user
     * @return User
     */
    public function signIn(User $user = null): User
    {
        $user = $user ?? factory(User::class)->create();
        Passport::actingAs($user);

        return $user;
    }
}
