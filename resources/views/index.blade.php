<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>SGT | FINANCE</title>

        @vite('resources/css/app.css')
    </head>
    <body class="h-screen bg-indigo-950">
        <div id="app" class="h-screen p-8"></div>

        @vite('resources/js/app.js')
    </body>
</html>
