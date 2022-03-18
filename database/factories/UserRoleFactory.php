<?php

namespace Database\Factories;

use App\Models\ProjectRole;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class UserRoleFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'member_id' => User::factory()->create()->id,
            'role_id' => ProjectRole::factory()->create()->id,
        ];
    }
}
