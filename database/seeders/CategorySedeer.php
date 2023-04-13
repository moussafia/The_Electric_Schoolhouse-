<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class CategorySedeer extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('categories')->insert([
            [
                'type' => 'Electrical Engineering',
            ],
            [
                'type' => 'Power and Energy',
            ],
            [
                'type' => 'Renewable Energy',
            ],
            [
                'type' => 'Electronics',
            ],
            [
                'type' => 'Control Systems',
            ],
            [
                'type' => 'Electric Vehicles',
            ],
            [
                'type' => 'Safety and Compliance',
            ],
            [
                'type' => 'Building Automation',
            ],[
                'type' => 'Lighting',
            ],[
                'type' => 'Smart Grids',
            ],
        ]);

    }
    }
