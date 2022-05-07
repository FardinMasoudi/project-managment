<?php

namespace Database\Seeders;

use App\Interfaces\PermissionRepositoryInterface;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\File;

class PermissionSeeder extends Seeder
{

    protected $permission;

    public function __construct(PermissionRepositoryInterface $permission)
    {
        $this->permission = $permission;
    }

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $permissions = json_decode(File::get(base_path('database/data') . '/' . 'permissions.json'), true);

        foreach ($permissions as $permission) {
            $this->permission->createPermission($permission);
        }
    }
}
