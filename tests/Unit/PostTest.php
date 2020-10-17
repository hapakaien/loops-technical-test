<?php

namespace Tests\Unit;

use App\Models\Comment;
use App\Models\Post;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class PostTest extends TestCase
{
    use RefreshDatabase;

    protected $table = 'posts';

    /**
     * Test creating a post
     *
     * @return void
     */
    public function testCreatingAPost()
    {
        Post::factory()->create();

        $this->assertDatabaseCount($this->table, 1);

        Post::factory()->create([
            'title' => 'Automate your app distribution with CI/CD',
        ]);

        $this->assertDatabaseCount($this->table, 2);

        $this->assertDatabaseHas($this->table, [
            'title' => 'Automate your app distribution with CI/CD',
        ]);
    }

    /**
     * Test post has comment
     *
     * @return void
     */
    public function testUserHasPost()
    {
        $post = Post::factory()
            ->hasComments(3)
            ->create();

        $this->assertDatabaseCount($this->table, 1);

        $this->assertEquals(3, $post->comments->count());
    }
}
