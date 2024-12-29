<?php

namespace Tests\Feature;

use App\Models\Task;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class DeleteTaskTest extends TestCase
{
    use RefreshDatabase;

    public function getDeleteTaskRoute($taskId)
    {
        return route('tasks.destroy', $taskId);
    }

    /** @test */
    public function authenticated_user_can_delete_task()
    {
        $this->actingAs(User::factory()->create());
        $task = Task::factory()->create();

        $response = $this->delete($this->getDeleteTaskRoute($task->id));

        $response->assertStatus(302);
        $this->assertDatabaseMissing('tasks', ['id' => $task->id]);
        $response->assertRedirect(route('tasks.index'));
    }

    /** @test */
    public function unauthenticated_user_cannot_delete_task()
    {
        $task = Task::factory()->create();

        $response = $this->delete($this->getDeleteTaskRoute($task->id));

        $response->assertRedirect('/login');
    }
}
