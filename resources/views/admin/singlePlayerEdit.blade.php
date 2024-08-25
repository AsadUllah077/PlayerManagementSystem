<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Edit Player</title>
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
        <h2>Edit Player</h2>
    </div>

    <div class="container">
        <div class="form-section">
            <h4>Update Player Details</h4>
            <form method="POST" action="{{ route('admin.singleplayer.update', ['id' => $singlePlayer->id]) }}">
                @csrf
                @method('PUT')
                <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text" class="form-control" id="name" name="name" value="{{ old('name', $singlePlayer->name) }}" placeholder="Enter player name" />
                    @error('name')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="password">Password (optional)</label>
                    <input type="password" class="form-control" name="password" id="password" placeholder="Enter new password (leave empty to keep current)" />
                    @error('password')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="phone">Phone #</label>
                    <input type="text" class="form-control" name="phone" id="phone" value="{{ old('phone', $singlePlayer->phone) }}" placeholder="Enter phone number" />
                    @error('phone')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="ranking">Ranking</label>
                    <input type="text" class="form-control" name="ranking" id="ranking" value="{{ old('ranking', $singlePlayer->ranking) }}" placeholder="Enter ranking" />
                    @error('ranking')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="ipPoints">IFP Points</label>
                    <input type="text" class="form-control" name="ip_points" id="ipPoints" value="{{ old('ip_points', $singlePlayer->ip_points) }}" placeholder="Enter IFP points" />
                    @error('ip_points')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
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
