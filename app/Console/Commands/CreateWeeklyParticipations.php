<?php

namespace App\Console\Commands;

use App\Models\Participant;
use App\Models\Participation;
use App\Models\Team;
use Carbon\Carbon;
use Illuminate\Console\Command;

class CreateWeeklyParticipations extends Command
{
    protected $signature = 'participation:create-weekly';
    protected $description = 'Create weekly participations for participants with random teams';


    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $teams     = Team::all();
        $teamCount = $teams->count();

        if ($teamCount < 2) {
            $this->error('There must be at least two teams to create participations.');

            return 1;
        }

        // Group participants by the number of participations and sort them by count ascending
        $groupedParticipants = Participant::withCount('participations')
                                          ->whereNull('deleted_at')
                                          ->get()
                                          ->groupBy('participations_count');

        $sortedGroupedParticipants = $groupedParticipants->sortBy(function ($group, $key) {
            return $key;
        })->values();
        // Shuffle the teams for random assignment
        $availableTeams = $teams->pluck('id')->shuffle();

        // Assign each team a participant
        foreach ($availableTeams as $teamId) {
            $i = 0;
            do {
                // Find the group with the least participations and exclude participants from the current team
                $eligibleParticipants = $sortedGroupedParticipants[$i]->reject(function ($participant) use (
                    $teamId
                ) {
                    return $participant->team_id == $teamId;
                });
                $i ++;
            } while ($eligibleParticipants->count() == 0);

            // Randomly pick a participant from the group
            $participant = $eligibleParticipants->shuffle()->first();

            $nextMonday = Carbon::now('Europe/Paris')->addWeek()->startOfWeek();

            // If a participant is found, create the participation
            if ($participant) {
                Participation::create([
                    'participant_id' => $participant->id,
                    'team_id'        => $teamId,
                    'created_at'     => $nextMonday,
                    'updated_at'     => $nextMonday,
                    'week'           => $nextMonday->toDateString(),
                ]);

                // Remove the assigned participant from the original collection
                $sortedGroupedParticipants->transform(function ($group) use ($participant) {
                    return $group->reject(function ($p) use ($participant) {
                        return $p->id == $participant->id;
                    });
                });
            } else {
                // If no participant is found for the team, show an error
                $this->error("No available participant for team ID: {$teamId}");

                return 1;
            }
        }

        $this->info('Weekly participations have been created successfully.');

        return 0;
    }


}
