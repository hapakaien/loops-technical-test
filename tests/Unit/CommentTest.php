<?php

namespace Tests\Unit;

use App\Models\Comment;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class CommentTest extends TestCase
{
    use RefreshDatabase;

    protected $table = 'comments';

    /**
     * Test creating a comment
     *
     * @return void
     */
    public function testCreatingAComment()
    {
        Comment::factory()->create();

        $this->assertDatabaseCount($this->table, 1);

        Comment::factory()->create([
            'name' => 'John Doe',
        ]);

        $this->assertDatabaseCount($this->table, 2);

        $this->assertDatabaseHas($this->table, [
            'name' => 'John Doe',
        ]);
    }
}
