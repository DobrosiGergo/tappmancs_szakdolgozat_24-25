<x-app-layout>
    @section('title', 'Tappmancs HomePage')
    
    <!-- Header Section -->
    <div class="flex justify-between items-center px-6 py-4 mx-1">
        <h1 class="text-5xl font-bold text-[#333333]">Tappmancs</h1>
        <div>
        @if (Route::has('login'))
            @auth
                <a href="{{ url('/dashboard') }}" class="bg-[#333333] text-white px-6 py-3 rounded-full text-base shadow-[0px_4px_10px_rgba(0,0,0,0.25)]">Dashboard</a>
            @else

            <div class="flex justify-right">
                    <a href="{{ route('login') }}" class="bg-[#333333] text-white px-6 py-3 rounded-full text-base shadow-[0px_4px_10px_rgba(0,0,0,0.25)]">Bejelentkezés</a>
                    <a href="{{ route('register') }}" class="bg-[#333333] text-white px-6 py-3 rounded-full text-base ml-2 shadow-[0px_4px_10px_rgba(0,0,0,0.25)]">Regisztráció</a>
            </div>
            @endauth
        @endif
        </div>
    </div>

    @if (!Auth::check())
    <!-- Main Content Container -->
    <div class="mx-2 p-6">
        <!-- Main Content Section with Image -->
        <div class="flex justify-left flex-col md:flex-row gap-8 mb-10">
            <!-- Left Text Column -->
            <div class="w-full md:w-1/2">
                <h2 class="text-3xl text-[#333333] font-bold mb-4">
                    Fogadj örökbe kisállatot vagy indíts el a saját menhelyed!
                </h2>
                <p class="text-lg text-[#333333] mb-6">
                    Csatlakozz egy olyan közösséghez, amely elkötelezett az állatok életének jobbá tétele iránt. Ismerd meg, hogyan segíthetsz, és kezdj hozzá most!
                </p>
                
                <div class="mb-10 text-center">
                    <div class="bg-neutral-400 rounded-full flex items-center justify-left w-full sm:w-[20vh] md:w-[22vh] lg:w-[26vh] xl:w-[18vw] max-w-[81vw] mx-auto">
                        <a href="#" class="inline-block bg-[#333333] text-white px-12 py-4 rounded-full text-lg shadow-lg mb-2 ml-[-5px] ">Tudj meg többet!</a>
                    </div>  
                </div>

                
                <!-- Statistics Boxes -->
                <div class="flex gap-4">
                    <div class="bg-gray-100 p-4 rounded-lg w-1/2 text-center">
                        <p class="text-2xl font-bold text-[#333333]">1.3K+</p>
                        <p class="text-md text-[#333333]">Örökbefogadás</p>
                    </div>
                    <div class="bg-gray-100 p-4 rounded-lg w-1/2 text-center">
                        <p class="text-2xl font-bold text-[#333333]">30+</p>
                        <p class="text-md text-[#333333]">Menhely</p>
                    </div>
                </div>
            </div>
            
            <!-- Right Image Column -->
            <div class="w-full md:w-1/2">
                <div class="rounded-xl overflow-hidden shadow-lg">
                    <img src="{{ asset('images/dog-adoption.jpeg') }}" alt="Örökbefogadás" class="w-full h-full object-cover" 
                         onerror="this.onerror=null; this.src='https://via.placeholder.com/600x400?text=Take+me+home';">
                </div>
            </div>
        </div>
        
        <!-- Social Icons -->
        <div class="flex justify-left gap-6 mt-8">
            <a href="#">
                <img src="{{ asset("images/pet-svgrepo-com.svg") }}" class="w-20 h-10 ml-auto">
            </a>
               
            </a>
            <a href="#" >
                <img src="{{ asset("images/facebook.svg") }}" class="w-20 h-10 ml-auto">
            </a>
            <a href="#" >
                <img src="{{ asset("images/insta.svg") }}" class="w-20 h-10 ml-auto">
            </a>
            <a href="#" >
                <img src="{{ asset("images/twitter.svg") }}" class="w-20 h-10 ml-auto">
            </a>
        </div>
    </div>
    @endif
</x-app-layout>