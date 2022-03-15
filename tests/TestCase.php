<?php

namespace Tests;

use App\Models\Project;
use App\Models\User;
use Illuminate\Foundation\Testing\TestCase as BaseTestCase;
use Illuminate\Support\Facades\DB;

abstract class TestCase extends BaseTestCase
{
    use CreatesApplication;

    public function create($model, array $overrides = [], $count = 1)
    {
        return $model::factory()->count($count > 1 ? $count : null)->create($overrides);
    }

    public function signIn($user = null)
    {
        $user = $user ?? User::factory()->create();

        $this->actingAs($user);
    }

    public function prepareData()
    {
        $this->artisan('db:seed');

        $project1 = $this->create(Project::class, []);
        $project2 = $this->create(Project::class, []);

        DB::table('project_member')
            ->insert([
                [
                    'project_id' => $project1->id,
                    'member_id' => auth()->user()->id,
                    'is_active' => true
                ], [
                    'project_id' => $project2->id,
                    'member_id' => auth()->user()->id,
                    'is_active' => false
                ]
            ]);
    }
}
