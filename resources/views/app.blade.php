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
        <div id="app">
            <nav class="container mx-auto py-4 flex items-center justify-between">
                <div class="text-lg uppercase tracking-wide font-semibold text-gray-800">
                    <router-link :to="{name: 'home'}" exact>Home</router-link>
                </div>

                <div>
                    <ul class="flex items-center">
                        <li class="text-base font-semibold uppercase tracking-wide text-gray-800 border-b border-transparent hover:border-gray-800">
                            <router-link :to="{name: 'login'}">Login</router-link>
                        </li>
                        <li class="ml-4 text-base font-semibold uppercase tracking-wide text-gray-800 border-b border-transparent hover:border-gray-800">
                            <router-link :to="{name: 'register'}">Register</router-link>
                        </li>
                    </ul>
                </div>
            </nav>

            <!-- component matched by the route will render here -->
            <router-view></router-view>
        </div>

        <!-- JS -->
        <script type="text/javascript" src="/js/app.js"></script>
    </body>
</html>
