<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ParticipantsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // First, we need to get the team IDs based on the team names
        $teamIds = DB::table('teams')->whereIn('name', [
            'Tech',
            'CSM',
            'New Biz',
            'AM',
            'Admin/Rh/Compta',
            'Product',
        ])->get()->pluck('id', 'name');


        // Define participants for each team
        $participants = [
            'Tech' => ['Aurélien', 'Lionel', 'JV', 'Geoffroy', 'Benjamin'],
            'CSM' => ['Blandine', 'Nolwenn', 'Saad', 'Elodie', 'Julie'],
            'New Biz' => ['Samuel', 'Camille'],
            'AM' => ['Marylou', 'Olivier'],
            'Product' => ['Guillaume', 'Cindy'],
            'Admin/Rh/Compta' => ['Assaf', 'Chloé', 'Camille'],
        ];

        // Insert participants into the database
        foreach ($participants as $teamName => $teamParticipants) {
            foreach ($teamParticipants as $participantName) {
                DB::table('participants')->insert([
                    'name' => $participantName,
                    'team_id' => $teamIds[$teamName], // Get the corresponding team ID
                    'created_at' => now(),
                    'updated_at' => now(),
                ]);
            }
        }
    }
}
