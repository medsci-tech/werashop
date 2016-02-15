<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use App\User;

class UserAuthorizationTest extends TestCase
{
    use DatabaseTransactions;
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testUserCreated()
    {
        $this->assertNotNull(User::find(2));
    }

    public function testUserRoleInShop()
    {
        $user = User::find('2');
        $this->assertTrue($user->hasRole('manager'));
        $this->assertTrue($user->hasRole('manager'));
        $this->assertFalse($user->hasRole('assistant'));
        $this->assertFalse($user->hasRole('assistant'));

        $user->removeRole('manager');
        $this->assertFalse($user->hasRole('manager'));
        $user->assignRole('assistant');
        $this->assertTrue($user->hasRole('assistant'));
    }
}
