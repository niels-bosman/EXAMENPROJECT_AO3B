<!DOCTYPE html>
<html>

<head>
    <script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous">
    </script>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title')</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/326db4868f.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="/css/app.css">
    <link rel="shortcut icon" type="image/png" href="favicon.png"/>
</head>

<body>
@include('layouts.header')

<div class="body">
    @yield('content')
</div>

@include('layouts.footer')
</body>

</html>
