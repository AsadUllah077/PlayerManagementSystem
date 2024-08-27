<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Team</title>
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
        }
    </style>
</head>
<body>
    <div class="header">
        <h2>Edit Team</h2>
    </div>

    <!-- Responsive Container -->
    <div class="container-fluid">
        <div class="form-section">
            <form method="POST" action="{{ route('admin.teams.update', $team->id) }}">
                @csrf
                @method('PUT')
                <div class="form-group">
                    <label for="name">Team Name</label>
                    <input type="text" class="form-control" id="name" name="name" value="{{ $team->name }}">
                </div>
                <div class="form-group">
                    <label for="description">Description</label>
                    <textarea class="form-control" id="description" name="description">{{ $team->description }}</textarea>
                </div>
                <button type="submit" class="btn btn-custom">Update</button>
            </form>
        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
