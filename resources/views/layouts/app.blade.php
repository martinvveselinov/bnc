<!-- resources/views/layouts/app.blade.php -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">


    <title>Cows and Bulls Game</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
</head>
<body>
<header>
    <h1>Cows and Bulls Game</h1>
    <a class="btn btn-primary" role="button" href="{{ route('new-game') }}">New Game</a>
    <a class="btn btn-primary" role="button" href="{{ route('display-scores') }}">Scores</a>
</header>

<main>
    @yield('content')
</main>

<footer>
    <!-- Footer content goes here -->
</footer>
@include('blocks.jsresources')

</body>
</html>
