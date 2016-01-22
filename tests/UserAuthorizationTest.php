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
        $this->assertTrue($user->hasRoleInShop('manager', 1));
        $this->assertTrue($user->hasRoleInShop('manager', 2));
        $this->assertFalse($user->hasRoleInShop('assistant', 1));
        $this->assertFalse($user->hasRoleInShop('assistant', 2));

        $user->removeRole('manager', 1);
        $this->assertFalse($user->hasRoleInShop('manager', 1));
        $user->assignRole('assistant', 2);
        $this->assertTrue($user->hasRoleInShop('assistant', 2));
    }
}
