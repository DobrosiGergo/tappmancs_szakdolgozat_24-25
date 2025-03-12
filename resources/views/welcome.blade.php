<x-guest-layout>
    @section('title', 'Tappmancs HomePage')
    
    <div class="px-6 py-4 w-full">
        <div>
        @if (Route::has('login'))
            @auth
                <a href="{{ url('/dashboard') }}" class="bg-[#333333] text-white px-6 py-3 rounded-full text-base shadow-[0px_4px_10px_rgba(0,0,0,0.25)]">Dashboard</a>
            @else
            <div class="flex justify-end mr-2">
                <a href="{{ route('login') }}" class="bg-[#333333] text-white md:px-10 px-6 py-3 rounded-full text-base shadow-[0px_4px_10px_rgba(0,0,0,0.25)]">Bejelentkezés</a>
                <a href="{{ route('role') }}" class="bg-[#333333] text-white md:px-10 px-6 py-3 rounded-full text-base ml-2 shadow-[0px_4px_10px_rgba(0,0,0,0.25)]">Regisztráció</a>
            </div>
            @endauth
        @endif 
        </div>
    </div>

    @if (!Auth::check())
    <div class="md:mx-2 md:p-6 w-full p-2">
        <h1 class="md:text-8xl text-6xl text-[#333333] mb-4 md:mb-10">Tappmancs</h1>

        <!-- Main Content Section with Image -->
        <div class="flex flex-col md:flex-row gap-8 mb-10">
            <!-- Left Text Column -->
            <div class="w-full md:w-1/2">
                <h2 class="text-[48px] text-[#333333] mb-4">
                    Fogadj örökbe kisállatot vagy indíts el a saját menhelyed!
                </h2>
                <p class="text-[36px] text-[#333333] mb-10 mt-6">
                    Csatlakozz egy olyan közösséghez, amely elkötelezett az állatok életének jobbá tétele iránt. Ismerd meg, hogyan segíthetsz, és kezdj hozzá most!
                </p>
                <div class="flex flex-col justify-center items-center w-full">
                    <div class="relative inline-block md:mt-8 md:w-[673px] md:h-[110px]">
                        <div class="absolute top-3 left-3 w-full  h-full bg-neutral-500 rounded-full "></div>
                            <button class="relative px-6 py-3 md:w-[673px] md:h-[110px] bg-[#333333] text-white md:text-3xl rounded-full shadow-md 
                            transition-all before:absolute before:right-0 before:top-0 before:h-full before:w-6 before:translate-x-24 before:rotate-8 before:bg-white before:opacity-10 before:duration-700 hover:shadow-white hover:before:-translate-x-[673px]">
                                    Tudj meg többet!
                            </button>
                    </div>
                    
                    <!-- Statistics Boxes -->
                    <div class="flex gap-4 mt-12">
                        <div class="relative inline-block md:mt-8 md:w-[450px] md:h-[130px]">
                            <div class="absolute top-4 left-4 w-full  h-full bg-neutral-500 rounded-3xl"></div>
                            <div class="relative bg-[#333333] text-white p-10 rounded-3xl text-center w-full md:w-[450px]">
                                <p class="text-2xl text-white">1.3K+</p>
                                <p class="text-md text-white">Örökbefogadás</p>
                            </div>
                        </div>
                        <div class="relative inline-block md:mt-8 md:w-[450px] md:h-[130px] ml-10">
                            <div class="absolute top-4 left-4 w-full  h-full bg-neutral-500 rounded-3xl"></div>
                            <div class="relative bg-[#333333] text-white p-10 rounded-3xl text-center w-full md:w-[450px]">
                            <p class="text-2xl text-white">30+</p>
                            <p class="text-md text-white">Menhely</p>
                            </div>
                        </div>
                    </div>
                </div>
               
            </div>
            
            <div class="w-full  md:w-1/2 mr-5">
            <div class="relative">
                <div class="absolute -top-4 left-4 w-full  h-[800px] bg-neutral-500 rounded-[300px]"></div>
                    <div class="relative rounded-3xl overflow-hidden ">
                        <img src="{{ asset('images/41b6d401-3bc6-4fea-b5f8-f02cce22a6ac_removalai_preview.svg') }}" alt="Örökbefogadás" class="rounded-[350px] h-[800px] w-full object-cover" 
                            onerror="this.onerror=null; this.src='https://via.placeholder.com/600x400?text=Take+me+home';">
                    </div>
                </div>
            </div>
        </div>
        
        <div class="flex justify-start items-center gap-10 mb-10">
            <a href="#" class="w-[120px] h-[120px]">
                <img src="{{ asset('images/pet-svgrepo-com.svg') }}" class="w-full h-full">
            </a>
            <a href="#" class="w-[85px] h-[85px]">
                <img src="{{ asset('images/facebook.svg') }}" class="w-full h-full">
            </a>
            <a href="#" class="w-[85px] h-[85px]">
                <img src="{{ asset('images/insta.svg') }}" class="w-full h-full">
            </a>
            <a href="#" class="w-[85px] h-[85px]">
                <img src="{{ asset('images/twitter.svg') }}" class="w-full h-full">
            </a>
        
    </div>
    @endif
</x-guest-layout>