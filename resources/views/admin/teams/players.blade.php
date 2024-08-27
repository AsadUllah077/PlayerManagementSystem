<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Team Players</title>
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

        .table-section {
            margin: 20px;
            padding: 20px;
            border: 1px solid white;
        }

        .table {
            background-color: grey;
        }

        .table th,
        .table td {
            border: 1px solid white;
        }

        .btn-custom {
            background-color: black;
            color: white;
            border: 1px solid white;
            margin-right: 5px;
        }

        .btn-right {
            float: right; /* Float the button to the right */
            margin-bottom: 10px; /* Add some space below the button */
        }
    </style>
</head>
<body>
    <div class="header">
        <h2>Players of Team: {{ $team->name }}</h2>
    </div>

    <!-- Container for the Table and Button -->
    <div class="container-fluid">
        <!-- Button to navigate to the index1 route -->
        <a href="{{ route('admin.teams.index') }}" class="btn btn-custom btn-right">Go Back </a>

        <!-- Players Info Table -->
        <div class="table-section">
            <div class="table-responsive">
                <table class="table table-bordered table-hover">
                    <thead>
                        <tr>
                            <th>S.no</th>
                            <th>Name</th>
                            <th>Phone</th>
                            <th>Actions</th> <!-- New column for actions -->
                        </tr>
                    </thead>
                    <tbody>
                        @php $i = 1; @endphp
                        @foreach ($players as $player)
                            <tr>
                                <td>{{ $i }}</td>
                                <td>{{ $player->name }}</td>
                                <td>{{ $player->phone }}</td>
                                <td>
                                    <!-- Remove button -->
                                    <form action="{{ route('admin.teams.removePlayer', [$team->id, $player->id]) }}" method="POST" style="display:inline;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-custom">Remove</button>
                                    </form>
                                </td>
                            </tr>
                            @php $i++; @endphp
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
