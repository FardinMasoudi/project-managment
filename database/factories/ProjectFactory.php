<?php

namespace Database\Factories;

use App\Models\User;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\Factory;

class ProjectFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'creator_id' => User::factory()->create()->id,
            'title' => $this->faker->title,
            'description' => $this->faker->paragraph,
            'start_time' => Carbon::now(),
            'end_time' => Carbon::now()->addWeek()

        ];
    }
}
