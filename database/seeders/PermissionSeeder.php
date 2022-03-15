<?php

namespace Database\Seeders;

use App\Interfaces\PermissionRepositoryInterface;
use Illuminate\Database\Seeder;

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
        $permissions = [
            [
                'title' => 'create-role',
                'label' => 'ایجاد نقش'
            ],
            [
                'title' => 'view-role',
                'label' => 'مشاهده نقش'
            ],
            [
                'title' => 'create-task',
                'label' => 'ایجاد تسک',
            ],
            [
                'title' => 'remove-task',
                'label' => 'حذف تسک',
            ],
            [
                'title' => 'invite-user',
                'label' => 'دعوت کاربر',
            ],
            [
                'title' => 'give-access',
                'label' => 'دسترسی دادن',
            ]
        ];
        foreach ($permissions as $permission) {
            $this->permission->createPermission($permission);
        }
    }
}
