<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>@yield('title', config('app.name', 'Laravel'))</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
        <link href='https://fonts.googleapis.com/css?family=Poppins' rel='stylesheet'>

        @livewireStyles
        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="m-auto">
        <div class="flex h-screen">
            @auth
                @livewire('sidebar')
            @endauth    
            <!-- Page Content -->
            <div id="content-container" class="flex-1 p-6 transition-all duration-300 ease-in-out ml-64">
            @isset($header)
                    <header>
                        {{ $header }}
                    </header>
                @endisset
                <main>
                @if (session('flash'))
                    <x-flash-message 
                        :message="session('flash')['message']" 
                        :type="session('flash')['type'] ?? 'info'" 
                    />
                @endif
                    {{ $slot }}
                </main>
            </div>
            <script>
    
</script>
        </div>
        @livewireScripts
    </body>
</html>