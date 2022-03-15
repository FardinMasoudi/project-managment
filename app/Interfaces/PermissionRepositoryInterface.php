<?php

namespace App\Interfaces;

interface PermissionRepositoryInterface
{
    public function getAllPermission();

    public function createPermission(array $data);
}
