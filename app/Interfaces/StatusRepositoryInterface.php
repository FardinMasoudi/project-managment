<?php

namespace App\Interfaces;

interface StatusRepositoryInterface
{
    public function getAll();

    public function create($data);
}
