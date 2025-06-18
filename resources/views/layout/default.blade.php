<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    @vite('resources/css/app.css')
    @vite('resources/js/app.js')
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <script src="//unpkg.com/alpinejs" defer></script>


</head>

<body class="min-h-screen flex flex-col antialiased bg-gray-100">

   @include('layout.navigation')


    <main>
        @yield('content')
    </main>
   

</body>

@include('layout.footer')

</html>
