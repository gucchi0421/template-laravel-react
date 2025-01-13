<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Foo Bar</title>

        @viteReactRefresh
        @vite(['resources/css/app.css', 'resources/ts/main.tsx'])
    </head>

    <body>
        <div id="app"></div>
    </body>
</html>