<?php

namespace App\Interfaces;

interface TaskReositoryInterface
{
    public function getAll($filters);

    public function getById($id);

    public function create($request);

    public function update($id, $request);

    public function destory($id);
}
