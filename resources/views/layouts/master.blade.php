<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
<link rel="stylesheet" href="{{asset('css/app.css')}}">
    <title>{{env('APP_NAME', 'Bastamli') }}</title>
</head>
<body>
    @include('includes.navbar')
    <div class="container mt-2">
        @include('includes.messages')
        @yield('content')
    </div>
<script src="{{asset('js/app.js')}}"></script>
</body>
</html>