{{-- resources/views/participations/previous.blade.php --}}

@extends('layouts.app')

@section('content')
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-12">
                <div class="card border-info mb-3">
                    <div class="card-header bg-info text-white">
                        <h2 class="text-center">Participations aux semaines précédentes</h2>
                    </div>
                    <div class="card-body">
                        @foreach($previousWeeksParticipations as $week => $participations)
                            <div class="mb-4">
                                <h3 class="card-title text-info">Semaine: {{ $week }}</h3>
                                <ul class="list-group list-group-flush">
                                    @foreach($participations as $participation)
                                        <li class="list-group-item">
                                            <span class="font-weight-bold">{{ $participation->participant->name }}</span> - Team: <span class="text-info">{{ $participation->team->name }}</span>
                                        </li>
                                    @endforeach
                                </ul>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
