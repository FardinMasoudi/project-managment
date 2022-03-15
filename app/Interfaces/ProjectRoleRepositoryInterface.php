<?php

namespace App\Interfaces;

interface ProjectRoleRepositoryInterface
{
    public function getAllProjectRoles();

    public function storeProjectRole($request);

    public function updateProjectRole($id, $request);

    public function deleteProjectRole($id);

}
