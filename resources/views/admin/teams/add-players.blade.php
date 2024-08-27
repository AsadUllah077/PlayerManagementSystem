<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Players to Team</title>
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

        .form-section {
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
    </style>
</head>
<body>
    <div class="header">
        <h2>Add Players to Team: {{ $team->name }}</h2>
    </div>

    <div class="container-fluid">
        <div class="form-section">
            <form method="POST" action="{{ route('admin.teams.storePlayers', $team->id) }}">
                @csrf
                <div class="form-group">
                    <label for="players">Select Players</label>
                    <!-- Ensure 'multiple' attribute is present and 'name' ends with [] -->
                    <select name="players[]" id="players" class="form-control" multiple>
                        @foreach ($players as $player)
                            <option value="{{ $player->id }}">{{ $player->phone }}</option>
                        @endforeach
                    </select>
                </div>
                <button type="submit" class="btn btn-custom">Add Players</button>
            </form>
        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
