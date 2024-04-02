{{-- resources/views/participations/index.blade.php --}}

@extends('layouts.app')
@php
    // Use Carbon for date manipulation
    $now = \Carbon\Carbon::now();
    $mondayThisWeek = \Carbon\Carbon::now()->startOfWeek();
    $mondayNextWeek = \Carbon\Carbon::now()->addWeek()->startOfWeek();
    $formattedDateThisWeek = $mondayThisWeek->format('Y-m-d'); // Example output: 2024-01-15
    $formattedDateNextWeek = $mondayNextWeek->format('Y-m-d'); // Example output: 2024-01-22
    $batmanOfWeek = $now->weekOfYear % 2 === 0 ? "Aurélien" : "Lionel"; // Determine the batman of the week
@endphp
@php
    // Group participants by team name and sort them by team name
    $groupedByTeam = $participantsWithCount->groupBy(function($item, $key) {
        return $item->team->name ?? 'No Team';
    })->sortBy(function($item, $key) {
        return $key; // Sort by the team name (which is the key in this case)
    });
@endphp
@section('content')
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <h1 class="text-center mb-4">Le batman de la semaine est : {{ $batmanOfWeek }}</h1>
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card border-primary mb-3">
                    <div class="card-header bg-primary text-white">
                        <h2 class="text-center">Semaine actuelle ({{ $formattedDateThisWeek }})</h2>
                    </div>
                    <ul class="list-group list-group-flush">
                        @forelse($currentWeekParticipations as $participation)
                            <li class="list-group-item">
                                <span class="font-weight-bold">{{ $participation->participant->name }}</span> - Team: <span class="text-primary">{{ $participation->team->name }}</span>
                            </li>
                        @empty
                            <li class="list-group-item">Pas de participations établies pour cette semaine.</li>
                        @endforelse
                    </ul>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card border-success mb-3">
                    <div class="card-header bg-success text-white">
                        <h2 class="text-center">Semaine suivante ({{ $formattedDateNextWeek }})</h2>
                    </div>
                    <ul class="list-group list-group-flush">
                        @forelse($nextWeekParticipations as $participation)
                            <li class="list-group-item">
                                <span class="font-weight-bold">{{ $participation->participant->name }}</span> - Team: <span class="text-success">{{ $participation->team->name }}</span>
                            </li>
                        @empty
                            <li class="list-group-item">Le tirage se fait le vendredi à minuit.</li>
                        @endforelse
                    </ul>
                </div>
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="card border-secondary">
                    <div class="card-header bg-secondary text-white">
                        <h2 class="text-center">Participants et participations</h2>
                    </div>
                    @php
                        // Group participants by team name and sort them by team name
                        $groupedByTeam = $participantsWithCount->groupBy(function($item, $key) {
                            return $item->team->name ?? 'No Team';
                        })->sortBy(function($item, $key) {
                            return $key; // Sort by the team name (which is the key in this case)
                        });
                    @endphp
                    @forelse($groupedByTeam as $teamName => $participants)
                        <div class="card-body">
                            <h3 class="card-title text-secondary">{{ $teamName }}</h3>
                            <ul class="list-group">
                                @foreach($participants as $participant)
                                    <li class="list-group-item d-flex justify-content-between align-items-center">
                                        {{ $participant->name }}
                                        <span class="badge badge-secondary badge-pill">{{ $participant->participations_count }}</span>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    @empty
                        <div class="card-body">
                            <p class="text-secondary">No participants found.</p>
                        </div>
                    @endforelse
                </div>
            </div>
        </div>
    </div>
@endsection
