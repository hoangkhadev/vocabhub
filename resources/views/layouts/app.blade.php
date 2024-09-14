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
        @include('layouts.sidebar')
        <div class="flex-1">
            <div class="flex flex-col px-4 h-screen overflow-y-scroll">
                @include('layouts.header')
                <main class="flex-1 px-10 w-full">
                    @yield('content')
                </main>
                @include('layouts.footer')
            </div>
        </div>
    </div>
    @stack('js')
</body>

</html>