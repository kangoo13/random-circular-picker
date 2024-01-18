{{-- resources/views/participations/index.blade.php --}}

@extends('layouts.app')
@php
    // Use Carbon for date manipulation
    $mondayThisWeek = \Carbon\Carbon::now()->startOfWeek();
    $formattedDate = $mondayThisWeek->format('Y-m-d'); // Example output: 2024-01-15
@endphp
@section('content')
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="card border-primary mb-3">
                    <div class="card-header bg-primary text-white">
                        <h2 class="text-center">Semaine du {{ $formattedDate }}</h2>
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
        </div>
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="card border-secondary">
                    <div class="card-header bg-secondary text-white">
                        <h2 class="text-center">Participants et participations</h2>
                    </div>
                    @php
                        // Group participants by team name
                        $groupedByTeam = $participantsWithCount->groupBy(function($item, $key) {
                            return $item->team->name ?? 'No Team';
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
