<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use  App\Models\Category;
use Illuminate\Support\Facades\DB;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories =[
              ['category' => 'Developer'],
              ['category' => 'Tester'],
              ['category' => 'Designer']
        ];
        DB::table('categories')->insert($categories);
      

    }
}
