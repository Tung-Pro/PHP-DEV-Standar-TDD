<?php

namespace Tests\Feature;

use App\Models\Task;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ViewTaskTest extends TestCase
{
    use RefreshDatabase;

    public function getViewTaskRoute($taskId)
    {
        return route('tasks.show', $taskId);
    }

    /** @test */
    public function authenticated_user_can_view_task_details()
    {
        $this->actingAs(User::factory()->create());
        $task = Task::factory()->create();

        $response = $this->get($this->getViewTaskRoute($task->id));

        $response->assertStatus(200);
        $response->assertViewIs('tasks.show');
        $response->assertSee($task->name);
    }

    /** @test */
    public function unauthenticated_user_cannot_view_task_details()
    {
        $task = Task::factory()->create();

        $response = $this->get($this->getViewTaskRoute($task->id));

        $response->assertRedirect('/login');
    }
}
