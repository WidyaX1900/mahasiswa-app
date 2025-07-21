<?php

namespace Database\Seeders;

use App\Models\Major;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class MajorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Major::create([
            'name' => 'Computer Science'
        ]);
        
        Major::create([
            'name' => 'Accounting'
        ]);
        
        Major::create([
            'name' => 'Psychology'
        ]);
    }
}
