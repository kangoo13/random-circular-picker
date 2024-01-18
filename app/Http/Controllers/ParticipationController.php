<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Participation;
use App\Models\Participant;
use Carbon\Carbon;

class ParticipationController extends Controller
{
    public function index()
    {
        // Get the current week's start and end dates
        $startOfWeek = Carbon::now()->startOfWeek()->toDateString();
        $endOfWeek   = Carbon::now()->endOfWeek()->toDateString();

        $startOfNextWeek = Carbon::now()->addWeek()->startOfWeek()->toDateString();
        $endOfNextWeek   = Carbon::now()->addWeek()->endOfWeek()->toDateString();

        // Get participations of the current week with the associated team
        $currentWeekParticipations = Participation::with('team')
                                                  ->whereBetween('week', [$startOfWeek, $endOfWeek])
                                                  ->get()
                                                  ->sortBy('team.name');;

        // Get participants with their number of participations
        $participantsWithCount = Participant::withCount('participations')
                                            ->get();

        $nextWeekParticipations = Participation::with('team')
                                               ->whereBetween('week', [$startOfNextWeek, $endOfNextWeek])
                                               ->get()
                                               ->sortBy('team.name');;

        // Return the view with the data
        return view('welcome', compact('currentWeekParticipations', 'nextWeekParticipations', 'participantsWithCount'));
    }

    public function previousWeek()
    {
        $previousWeeksParticipations = Participation::with('participant', 'team')
                                                    ->orderBy('week', 'desc')
                                                    ->get()
                                                    ->groupBy('week')
                                                    ->map(function ($weekGroup) {
                                                        return $weekGroup->sortBy(function ($participation) {
                                                            return $participation->team->name;
                                                        });
                                                    });

        // Return the view with the grouped and sorted participations
        return view('previous_week', compact('previousWeeksParticipations'));
    }
}
