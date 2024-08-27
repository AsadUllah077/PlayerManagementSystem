<!-- resources/views/matches/create.blade.php -->
@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Create Match</h1>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('matches.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="tournament_id">Tournament</label>
            <select class="form-control" id="tournament_id" name="tournament_id" required>
                <option value="">Select a tournament</option>
                @foreach($tournaments as $tournament)
                    <option value="{{ $tournament->id }}" {{ old('tournament_id') == $tournament->id ? 'selected' : '' }}>{{ $tournament->name }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="team1_id">Team 1</label>
            <select class="form-control" id="team1_id" name="team1_id" required>
                <option value="">Select Team 1</option>
                @foreach($teams as $team)
                    <option value="{{ $team->id }}" {{ old('team1_id') == $team->id ? 'selected' : '' }}>{{ $team->name }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="team2_id">Team 2</label>
            <select class="form-control" id="team2_id" name="team2_id" required>
                <option value="">Select Team 2</option>
                @foreach($teams as $team)
                    <option value="{{ $team->id }}" {{ old('team2_id') == $team->id ? 'selected' : '' }}>{{ $team->name }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="match_date">Match Date</label>
            <input type="datetime-local" class="form-control" id="match_date" name="match_date" value="{{ old('match_date') }}">
        </div>
        <div class="form-group">
            <label for="location">Location</label>
            <input type="text" class="form-control" id="location" name="location" value="{{ old('location') }}">
        </div>
        <button type="submit" class="btn btn-primary">Create Match</button>
    </form>
</div>
@endsection
