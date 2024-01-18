{{-- resources/views/participations/index.blade.php --}}

@extends('layouts.app')

@section('content')
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="card border-primary mb-3">
                    <div class="card-header bg-primary text-white">
                        <h2 class="text-center">Semaine du {{$currentWeekParticipations[0]->week}}</h2>
                    </div>
                    <ul class="list-group list-group-flush">
                        @foreach($currentWeekParticipations as $participation)
                            <li class="list-group-item">
                                <span class="font-weight-bold">{{ $participation->participant->name }}</span> - Team: <span class="text-primary">{{ $participation->team->name }}</span>
                            </li>
                        @endforeach
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
                            return $item->team->name;
                        });
                    @endphp
                    @foreach($groupedByTeam as $teamName => $participants)
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
                    @endforeach
                </div>
            </div>
        </div>
    </div>
@endsection
