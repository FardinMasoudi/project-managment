<?php

namespace Database\Factories;

use App\Models\Project;
use App\Models\Sprint;
use App\Models\Status;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\Factory;

class TaskFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'project_id' => Project::factory()->create()->id,
            'sprint_id' => Sprint::factory()->create()->id,
            'reporter_id' => User::factory()->create()->id,
            'assign_to' => User::factory()->create()->id,
            'title' => $this->faker->title,
            'description' => $this->faker->text,
            'status_id' => Status::getStatusIdByTitle('todo'),
            'deadline_time' => Carbon::now()->addWeek(),
            'parent_id' => null,
            'type' => $this->faker->randomElement(['task', 'bug', 'story'])
        ];
    }
}
