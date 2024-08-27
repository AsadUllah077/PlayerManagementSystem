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
            height: 100vh; /* Full viewport height */
            margin: 0; /* Remove default body margin */
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
            max-width: 500px; /* Max width to ensure form does not stretch too much */
            background-color: #333; /* Slightly different color to distinguish form */
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
            <h2>Single Player Data Form</h2>
        </div>

        <h4 class="text-center">Register Player</h4>
        <form method="POST" action="{{ route('admin.singleplayer.insert') }}">
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
                <label for="name">Name</label>
                <input type="text" class="form-control" id="name" name="name" placeholder="Enter player name" value="{{ old('name') }}" />
                <!-- Display Field-Specific Errors -->
                @error('name')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
            <div class="form-group">
                <label for="passwordReg">Password (optional)</label>
                <input type="password" class="form-control" name="password" id="passwordReg" placeholder="Enter password" />
                <!-- Display Field-Specific Errors -->
                @error('password')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
            <div class="form-group">
                <label for="phone">Phone #</label>
                <input type="text" class="form-control" name="phone" id="phone" placeholder="Enter phone number" value="{{ old('phone') }}" />
                <!-- Display Field-Specific Errors -->
                @error('phone')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
            <div class="form-group">
                <label for="ranking">Ranking</label>
                <input type="text" class="form-control" name="ranking" id="ranking" placeholder="Enter ranking" value="{{ old('ranking') }}" />
                <!-- Display Field-Specific Errors -->
                @error('ranking')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
            <div class="form-group">
                <label for="ifpPoints">IFP Points</label>
                <input type="text" class="form-control" name="ip_points" id="ifpPoints" placeholder="Enter IFP points" value="{{ old('ip_points') }}" />
                <!-- Display Field-Specific Errors -->
                @error('ip_points')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
            <button type="submit" class="btn btn-custom btn-block">Register</button>
            <a href="{{ route('admin.singleplayer.signUp') }}" class="btn btn-custom btn-block mt-3">Sign Up</a>
        </form>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>
