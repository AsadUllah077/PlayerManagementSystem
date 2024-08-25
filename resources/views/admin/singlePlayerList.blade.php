<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Player Management Form</title>
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
            margin-right: 5px; /* Ensure some spacing between buttons */
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
        <h2>Single Player List</h2>
    </div>

    <!-- Responsive Container -->
    <div class="container-fluid">
        <!-- Add Player Button -->
        <div class="row mt-2">
            <div class="col text-right">
                <a href="{{ route('admin.singleplayer') }}" class="btn btn-custom">Add Player</a>
            </div>
        </div>

        <!-- Player Info Table -->
        <div class="row mt-2">
            <div class="col-12">
                <!-- Wrap table in a responsive container -->
                <div class="table-responsive">
                    <table class="table table-bordered table-hover">
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>Rating</th>
                                <th>IP Points</th>
                                <th>Phone</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($singleplayers as $singleplayer)
                            <tr>
                                <td>{{ $singleplayer->name }}</td>
                                <td>{{ $singleplayer->ranking }}</td>
                                <td>{{ $singleplayer->ip_points }}</td>
                                <td>{{ $singleplayer->phone }}</td>
                                <td>
                                    <div class="d-flex">
                                        <a href="{{ route('admin.singleplayer.edit', ['id' => $singleplayer->id]) }}" class="btn btn-custom">Edit</a>
                                        <form action="{{ route('admin.singleplayer.delete', ['id' => $singleplayer->id]) }}" method="POST" style="display: inline;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-custom">Delete</button>
                                        </form>
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
