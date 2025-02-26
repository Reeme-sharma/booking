<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
       <link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet">
       <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        @vite(['resources/css/app.css', 'resources/js/app.js'])
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>



        <!-- Scripts -->

        <style>
            .main-container {
                flex-direction: row; 
            }
            .firm-container1 {
                max-width: 300px;
                box-shadow: 0px 5px 15px rgba(0,0,0,0.1);
            }
            .firm-container1 h5{
                 color:teal;
            }
            .firm-container2 {
                box-shadow: 0px 5px 15px rgba(0,0,0,0.1);
                min-height:100vh;
            
            }
            .profile-pic {
                     width: 180px;
                    height: 180px;
                    box-shadow: 0px 5px 15px rgba(0, 123, 255, 0.3);
            }
            .firm-card {
                    box-shadow: 0px 4px 10px rgba(0,0,0,0.1);
            }
            .firm-info {
                    flex: 1;
                    min-width: 250px;
            }
            </style>

    </head>
    <body class="font-sans antialiased">
        <div class="min-h-screen bg-gray-100 dark:bg-gray-900">
            @include('layouts.navigation')

            <!-- Page Heading -->
            @isset($header)
                <header class="bg-white dark:bg-gray-800 shadow">
                    <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                        {{ $header }}
                    </div>
                </header>
            @endisset

            <!-- Page Content -->
            <main>
                {{ $slot }}
            </main>
        </div>
    </body>
</html>
