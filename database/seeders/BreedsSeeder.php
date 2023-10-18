<?php

namespace Database\Seeders;

use App\Jobs\SeedBreedsJob;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BreedsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        SeedBreedsJob::dispatch();
    }
}
