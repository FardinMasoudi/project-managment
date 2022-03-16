<?php

namespace Database\Factories;

use App\Models\Project;
use App\Models\Status;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\Factory;

class SprintFactory extends Factory
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
            'goal' => $this->faker->title,
            'start_time' => Carbon::now(),
            'end_time' => Carbon::now()->addWeek(),
            'status_id' => Status::getStatusIdByTitle('active')
        ];
    }
}
