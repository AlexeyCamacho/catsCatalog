<?php

namespace App\Jobs;

use App\Models\Breed;
use App\Services\CatApiService;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class SeedBreedsJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    private CatApiService $apiService;
    /**
     * Create a new job instance.
     */
    public function __construct()
    {
        $this->apiService = new CatApiService();
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        $breeds = $this->apiService->getAllBreeds();
        if (is_array($breeds)) {
            foreach ($breeds as $breed) {
                $breedDB = Breed::where('breed_id', $breed['id'])->first();

                if (!$breedDB) {
                    Breed::create([
                        'breed_id' => $breed['id'],
                        'name' => $breed['name'],
                        'description' => $breed['description'],
                        'avr_life_time' => $this->AvrLifeTime($breed['life_span']),
                    ]);
                }
            }
        }
    }

    private function AvrLifeTime(string $lifeSpan): int
    {
        $ages = explode("-", str_replace(" ", "", $lifeSpan));
        return round(((int)$ages[0] + (int)$ages[1]) / 2);
    }
}
