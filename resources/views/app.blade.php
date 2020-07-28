<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

        <!-- Styles -->
        <link rel="stylesheet" type="text/css" href="/css/app.css">
    </head>
    <body>
        <div id="app" class="text-center">
            <nav class="mt-6 space-x-4 mb-4">
                <router-link 
                    :to="{name: 'Home'}"
                    class="text-lg font-semibold text-green-400 py-1"
                    active-class="text-green-800 border-b border-green-800" exact>Home</router-link>
                <span class="text-black">|</span>
                <router-link 
                    :to="{name: 'About'}"
                    class="text-lg font-semibold text-green-400 py-1"
                    active-class="text-green-800 border-b border-green-800">About</router-link>
            </nav>
            <!-- component matched by the route will render here -->
            <router-view></router-view>
        </div>

        <!-- JS -->
        <script type="text/javascript" src="/js/app.js"></script>
    </body>
</html>
