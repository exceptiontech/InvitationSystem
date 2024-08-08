<?php

namespace Database\Seeders;
use App\Models\EventType;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class EventTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        EventType::factory()->count(10)->create();
    }
}
