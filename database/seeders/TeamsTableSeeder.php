<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TeamsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $teams = [
            'CSM',
            'Tech',
            'Product',
            'AM',
            'New Biz',
            'Admin/Rh/Compta',
        ];

        foreach ($teams as $teamName) {
            DB::table('teams')->insert([
                'name' => $teamName,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
