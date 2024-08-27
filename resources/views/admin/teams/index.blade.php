<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Team Management</title>
    <!-- Bootstrap CSS -->
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet" />
    <style>
        body {
            background-color: black;
            color: white;
        }

        .header {
            background-color: red;
            color: white;
            text-align: center;
            padding: 10px;
        }

        .form-section,
        .table-section {
            margin: 20px;
            padding: 20px;
            border: 1px solid white;
        }

        .form-group label {
            color: yellow;
        }

        .form-control {
            background-color: black;
            color: white;
            border: 1px solid white;
        }

        .btn-custom {
            background-color: black;
            color: white;
            border: 1px solid white;
            margin-right: 5px;
        }

        .table {
            background-color: grey;
        }

        .table th,
        .table td {
            border: 1px solid white;
        }
    </style>
</head>
<body>
    <div class="header">
        <h2>Team Management</h2>
    </div>

    <!-- Responsive Container -->
    <div class="container-fluid">
        <!-- Buttons for Team and Player Management -->
        <div class="row mt-2">
            <div class="col text-right">
                <!-- Button to create a new team -->
                <a href="{{ route('admin.teams.create') }}" class="btn btn-custom">Create New Team</a>
                <!-- Button to register a new player -->
                <a href="{{ route('admin.singleplayer.index') }}" class="btn btn-custom">Register New Player</a>
                <a class="btn btn-custom" href="{{ route('tournaments.index') }}">View All Tournaments</a>
                <a class="btn btn-custom" href="{{ route('tournaments.create') }}">Create New Tournament</a>
                {{-- <a class="btn btn-custom" href="{{ route('tournaments.show', $tournament->id) }}">View Tournament</a>
                <a class="btn btn-custom" href="{{ route('tournaments.edit', $tournament->id) }}">Edit Tournament</a> --}}
                <a class="btn btn-custom" href="{{ route('matches.index') }}">View All Matches</a>



            </div>
        </div>

        <!-- Team Info Table -->
        <div class="row mt-2">
            <div class="col-12">
                <!-- Wrap table in a responsive container -->
                <div class="table-responsive">
                    <table class="table table-bordered table-hover">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Name</th>
                                <th>Description</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($teams as $team)
                                <tr>
                                    <td>{{ $team->id }}</td>
                                    <td>{{ $team->name }}</td>
                                    <td>{{ $team->description }}</td>
                                    <td>
                                        <div class="d-flex">
                                            <!-- Edit team button -->
                                            <a href="{{ route('admin.teams.edit', $team->id) }}" class="btn btn-custom">Edit</a>
                                            <!-- Delete team button -->
                                            <form action="{{ route('admin.teams.destroy', $team->id) }}" method="POST" style="display: inline;">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-custom">Delete</button>
                                            </form>
                                            <!-- Add players to team button -->
                                            <a href="{{ route('admin.teams.addPlayers', $team->id) }}" class="btn btn-custom">Add Players</a>
                                            <!-- View players in team button -->
                                            <a href="{{ route('admin.teams.showPlayers', $team->id) }}" class="btn btn-custom">View Players</a>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
