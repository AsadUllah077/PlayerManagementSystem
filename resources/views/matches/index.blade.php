<!-- resources/views/matches/index.blade.php -->
@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Matches</h1>
    <a href="{{ route('matches.create') }}" class="btn btn-primary">Create Match</a>

    @if(session('success'))
        <div class="alert alert-success mt-2">
            {{ session('success') }}
        </div>
    @endif

    <table class="table mt-3">
        <thead>
            <tr>
                <th>Tournament</th>
                <th>Team 1</th>
                <th>Team 2</th>
                <th>Match Date</th>
                <th>Location</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($matches as $match)
                <tr>
                    <td>{{ $match->tournament->name }}</td>
                    <td>{{ $match->team1->name }}</td>
                    <td>{{ $match->team2->name }}</td>
                    <td>{{ $match->match_date }}</td>
                    <td>{{ $match->location }}</td>
                    <td>
                        <a href="{{ route('matches.edit', $match->id) }}" class="btn btn-sm btn-warning">Edit</a>
                        <form action="{{ route('matches.destroy', $match->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-danger">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
