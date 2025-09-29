<?php

namespace Database\Seeders;

use App\Models\Type;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class TypeSeeder extends Seeder
{
    public function run(): void
    {
        $names = ['Frontend', 'Backend', 'Automazioni'];
        foreach ($names as $name) {
            Type::firstOrCreate(
                ['name' => $name],
                ['slug' => Str::slug($name)]
            );
        }
    }
}
