<?php

namespace App\Interfaces;

interface SprintRepositoryInterface
{
    public function getAll($filter);

    public function getById($id);

    public function create($request);

    public function update($id,$request);
}
