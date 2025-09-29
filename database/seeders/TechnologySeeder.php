<?php

namespace Database\Seeders;

use App\Models\Technology;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class TechnologySeeder extends Seeder
{
    public function run(): void
    {
        $names = ['HTML', 'CSS', 'JavaScript', 'PHP', 'Laravel', 'React.js', 'Node.js'];
        foreach ($names as $name) {
            Technology::firstOrCreate(
                ['name' => $name],
                ['slug' => Str::slug($name)]
            );
        }
    }
}
