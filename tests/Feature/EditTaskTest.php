<?php

namespace Tests\Feature;

use App\Models\Task;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class EditTaskTest extends TestCase
{
    use RefreshDatabase;

    public function getEditTaskRoute($taskId)
    {
        return route('tasks.update', $taskId);
    }

    public function getEditTaskViewRoute($taskId)
    {
        return route('tasks.edit', $taskId);
    }

    /** @test */
    public function authenticated_user_can_edit_task()
    {
        $this->actingAs(User::factory()->create());
        $task = Task::factory()->create();
        $updatedTask = [
            'name' => 'Updated Task Name',
            'content' => 'Updated Task Content'
        ];

        $response = $this->put($this->getEditTaskRoute($task->id), $updatedTask);

        $response->assertStatus(302);
        $this->assertDatabaseHas('tasks', $updatedTask);
        $response->assertRedirect(route('tasks.index'));
    }

    /** @test */
    public function unauthenticated_user_cannot_edit_task()
    {
        $task = Task::factory()->create();
        $updatedTask = ['name' => 'Updated Task Name'];

        $response = $this->put($this->getEditTaskRoute($task->id), $updatedTask);

        $response->assertRedirect('/login');
    }
}
