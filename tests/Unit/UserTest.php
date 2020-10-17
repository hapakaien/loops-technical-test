<?php

namespace Tests\Unit;

use App\Models\Post;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class UserTest extends TestCase
{
    use RefreshDatabase;

    protected $table = 'users';

    /**
     * Test creating a user
     *
     * @return void
     */
    public function testCreatingAUser()
    {
        User::factory()->create();

        $this->assertDatabaseCount($this->table, 1);

        User::factory()->create([
            'name' => 'John Doe',
        ]);

        $this->assertDatabaseCount($this->table, 2);

        $this->assertDatabaseHas($this->table, [
            'name' => 'John Doe',
        ]);
    }

    /**
     * Test user has post
     *
     * @return void
     */
    public function testUserHasPost()
    {
        $user = User::factory()
            ->hasPosts(3)
            ->create();

        $this->assertDatabaseCount($this->table, 1);

        $this->assertEquals(3, $user->posts->count());
    }

    /**
     * Test user has comment
     *
     * @return void
     */
    public function testUserHasComment()
    {
        $user = User::factory()->create();
        $post = Post::factory()
            ->hasComments(1)
            ->create([
                'user_id' => $user->id
            ]);

        $this->assertDatabaseCount($this->table, 1);

        $this->assertEquals(1, $user->posts->count());

        $this->assertEquals(1, $post->comments->count());
    }
}
