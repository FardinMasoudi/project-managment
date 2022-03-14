<?php

namespace Tests;

use App\Models\User;
use Illuminate\Foundation\Testing\TestCase as BaseTestCase;

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

        $this->actingAs($user, 'api');
    }
}
