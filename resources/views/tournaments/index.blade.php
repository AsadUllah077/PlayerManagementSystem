@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Tournaments</h1>
    <a href="{{ route('tournaments.create') }}" class="btn btn-primary">Create Tournament</a>

    @if(session('success'))
        <div class="alert alert-success mt-2">
            {{ session('success') }}
        </div>
    @endif

    <table class="table mt-3">
        <thead>
            <tr>
                <th>Name</th>
                <th>Description</th>
                <th>Start Date</th>
                <th>End Date</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($tournaments as $tournament)
                <tr>
                    <td>{{ $tournament->name }}</td>
                    <td>{{ $tournament->description }}</td>
                    <td>{{ $tournament->start_date }}</td>
                    <td>{{ $tournament->end_date }}</td>
                    <td>
                        <a href="{{ route('tournaments.edit', $tournament->id) }}" class="btn btn-sm btn-warning">Edit</a>
                        <form action="{{ route('tournaments.destroy', $tournament->id) }}" method="POST" style="display:inline;">
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
