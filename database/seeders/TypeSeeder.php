<?php

namespace Database\Seeders;

use App\Models\Type;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class TypeSeeder extends Seeder
{
    public function run(): void
    {
        $ordered = [
            ['name' => 'Frontend', 'sort_order' => 1],
            ['name' => 'Backend',   'sort_order' => 2],
            ['name' => 'Automazioni','sort_order' => 3],
        ];

        foreach ($ordered as $row) {
            Type::updateOrCreate(
                ['name' => $row['name']],
                ['slug' => Str::slug($row['name']), 'sort_order' => $row['sort_order']]
            );
        }
    }
}
