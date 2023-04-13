<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class TagSedeer extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('tags')->insert([
            [
                'tag' => 'Circuit Design',
            ],
            [
                'tag' => 'Power Electronics',
            ],
            [
                'tag' => 'Control Theory',
            ],
            [
                'tag' => 'Energy Efficiency',
            ],
            [
                'tag' => 'Renewable Energy Sources',
            ],
            [
                'tag' => 'Electrical Safety',
            ],
            [
                'tag' => 'Smart Home Technology',
            ],
            [
                'tag' => 'IoT (Internet of Things)',
            ],[
                'tag' => 'Electrical Maintenance',
            ],[
                'tag' => 'Troubleshooting',
            ],[
                'tag' => 'Electric Motors',
            ],
        ]);

    }
}
