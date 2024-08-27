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
            display: flex;
            align-items: center;
            justify-content: center;
            height: 100vh;
            margin: 0;
        }

        .header {
            background-color: red;
            color: white;
            text-align: center;
            padding: 10px;
        }

        .form-section {
            padding: 20px;
            border: 1px solid white;
            width: 100%;
            max-width: 500px;
            background-color: #333;
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

        .text-danger {
            color: red;
        }
    </style>
</head>

<body>
    <div class="form-section">
        <div class="header mb-3">
            <h2>Sign Up Player</h2>
        </div>

        <form method="POST" action="{{ route('admin.player.signup') }}">
            @csrf
            <!-- Display General Errors -->
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <div class="form-group">
                <label for="phoneSearch">Phone # Search</label>
                <input type="text" class="form-control" id="phoneSearch" name="phoneSearch" placeholder="Enter phone number" />
            </div>
            <div class="form-group">
                <label for="nameSearch">Name Search</label>
                <select class="form-control" id="nameSearch" name="nameSearch">
                    <option>select player</option>
                    @foreach ($players as $key => $player)
                        <option>{{ $player->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="playerInfo">Shows Players Info/Name</label>
                <textarea class="form-control" id="playerInfo" name="playerInfo" rows="3" placeholder="This shows data from the database. Name, Rank, Total score, etc."></textarea>
            </div>
            <div class="form-group">
                <label for="password">Password (optional)</label>
                <input type="password" class="form-control" id="password" name="password" placeholder="Enter password" />
            </div>
            <button type="submit" class="btn btn-custom">Sign Up</button>
        </form>

        <!-- Register Button -->
        <form method="GET" action="{{ route('admin.singleplayer.index') }}">
            <button type="submit" class="btn btn-custom mt-3">Register</button>
        </form>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>
