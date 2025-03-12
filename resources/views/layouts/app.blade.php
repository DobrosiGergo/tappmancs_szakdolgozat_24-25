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
                    {{ $slot }}
                </main>
            </div>
            <script>
    document.addEventListener('livewire:initialized', function () {
        Livewire.on('sidebarToggled', function (styleClass) {
            console.log('Sidebar toggled, new style class:', styleClass);
            
            // Megkeressük a tartalom konténert - mindkét módon próbáljuk
            const contentContainer = document.getElementById('content-container') || 
                                     document.querySelector('.flex-1.p-6');
            
            if (contentContainer) {
                // Régi stílusok eltávolítása
                contentContainer.classList.remove('ml-64', 'ml-16');
                // Új stílus hozzáadása - egyszerű string esetén
                if (typeof styleClass === 'string') {
                    contentContainer.classList.add(styleClass);
                } 
                // Objektum esetén (ami a hibában látható)
                else if (styleClass && styleClass.styleClass) {
                    contentContainer.classList.add(styleClass.styleClass);
                }
                console.log('Style updated successfully');
            } else {
                console.error('Content container not found! Tried both ID and class selector.');
                // Próbáljuk meg minden .flex-1 osztályú elemre alkalmazni
                const flexContainers = document.querySelectorAll('.flex-1');
                if (flexContainers.length > 0) {
                    console.log('Found', flexContainers.length, 'flex-1 containers, applying to all');
                    flexContainers.forEach(container => {
                        container.classList.remove('ml-64', 'ml-16');
                        if (typeof styleClass === 'string') {
                            container.classList.add(styleClass);
                        } else if (styleClass && styleClass.styleClass) {
                            container.classList.add(styleClass.styleClass);
                        }
                    });
                }
            }
        });
    });
</script>
        </div>
        @livewireScripts
    </body>
</html>