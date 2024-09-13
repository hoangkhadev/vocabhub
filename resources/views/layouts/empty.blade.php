<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite('resources/css/app.css')
    <link rel="shortcut icon" href="{{asset('favicon.png')}}" type="image/x-icon">
    <!-- JQuery -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <title>VocabHub | @yield('title')</title>
</head>

<body>
    <div class="flex h-screen overflow-hidden bg-primary text-white">
        @yield('content')
    </div>
</body>

</html>