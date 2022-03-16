<?php

namespace Database\Seeders;

use App\Interfaces\StatusRepositoryInterface;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\File;

class StatusSeeder extends Seeder
{
    private $statusRepository;


    public function __construct(StatusRepositoryInterface $statusRepository)
    {
        $this->statusRepository = $statusRepository;
    }

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $statuses = json_decode(File::get(base_path('database/data') . '/' . 'statuses.json'), true);

        foreach ($statuses as $status) {
            $this->statusRepository->create($status);
        }
    }
}
