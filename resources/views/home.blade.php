<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    @vite('resources/css/app.css')
    @vite('resources/js/app.js')
</head>
<body>
    <h1 class="bg-red-500 text-white p-6">Home</h1>

    <a href="{{ route("dashboard-page")}}"> Dashboard</a>
    
</body>
</html>
