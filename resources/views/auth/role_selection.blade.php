<x-guest-layout>
    <div class=" mx-auto p-5">
        <h1 class="text-6xl ml-4 text-[#333333]">Tappancs</h1>

        <p class="mt-8 ml-4 text-[36px] text-[#333333]">
            <strong>Örökbefogadóként:</strong> Találd meg a hozzád illő négylábú társat! Böngészd végig a menhelyek által feltöltött állatok profiljait, és kezdj új fejezetet az életükben – és a sajátodban is.
        </p>
        <p class="mt-8 ml-4 text-[36px] text-[#333333]">
            <strong>Menhelyként:</strong> Hozz létre profilt, hogy segíthess az állatoknak új otthonra találni. Kezeld egyszerűen az adatokat, és kapcsolódj közvetlenül a leendő gazdikhoz!
        </p>

        <div class="flex justify-center gap-[150px] mt-8">
            <form method="POST" action="{{ route('registration.store.role') }}">
                @csrf
                <button type="submit" name="role" value="User"
                    class="flex flex-col items-center justify-center bg-[#D9D9D9] p-6 rounded-[40px] shadow-md w-64 text-center h-[430px] w-[500px]">
                    <span class="text-lg">Örökbefogadó</span>
                    
                    <span > <img src="{{ asset('images/profile.svg') }}" alt="Örökbefogadás" class="h-[100px] w-[100px] object-containr" 
                    onerror="this.onerror=null; this.src='https://via.placeholder.com/600x400?text=Take+me+home';"></span>
                </button>
            </form>

            <form method="POST" action="{{ route('registration.store.role') }}">
                @csrf
                <div class="flex flex-col items-center justify-center">
                    <button type="submit" name="role" value="shelter"
                        class="bg-[#D9D9D9] p-6 rounded-[40px] shadow-md text-center w-[500px] h-[430px] flex flex-col items-center justify-center">
                        <span class="text-lg mb-4">Menhely</span>
                        
                        <img src="{{ asset('images/pet-shelter-svgrepo-com.svg') }}" alt="Örökbefogadás" 
                            class="h-[100px] w-[100px] object-contain" 
                            onerror="this.onerror=null; this.src='https://via.placeholder.com/600x400?text=Take+me+home';">
                    </button>
                </div>
            </form>
            <div class="">
                    <div class=" overflow-hidden ">
                        <img src="{{ asset('images/cat-dog.svg') }}" alt="Örökbefogadás" class=" object-cover transform -scale-x-100" 
                            onerror="this.onerror=null; this.src='https://via.placeholder.com/600x400?text=Take+me+home';">
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-guest-layout>