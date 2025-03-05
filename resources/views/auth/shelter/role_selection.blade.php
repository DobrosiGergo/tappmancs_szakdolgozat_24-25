<x-app-layout>
    <div class="flex flex-col md:flex-row gap-8 mb-10">
        <div class="w-full md:w-1/2 p-10">
            <h1 class="text-5xl text-[#333333] mb-6">Szerepkörök információ</h1>
            
            <p class="text-2xl leading-[40px] text-[#333333] mb-4 px-6">
                <strong>Menhely dolgozó:</strong> A dolgozói szerepkör lényege, hogy a menhelyen dolgozó személy az általa képviselt menhely adatait tudja kezelni és karbantartani, ezzel biztosítva a megfelelő működést és nyilvántartást.
            </p>
            <p class="text-2xl leading-[40px] text-[#333333] mb-8 px-6">
                <strong>Menhely tulajdonos:</strong> A tulajdonos felelős a saját menhelyének karbantartásáért és kezeléséért, valamint a dolgozók rendszerbe történő felvételéért és adminisztrációjáért.
            </p>
        </div>
        <div class="w-full md:w-1/2">
            <div class="flex justify-between items-center relative mt-5">
                <!-- Bal oldali szerepkör kártyák -->
                <div class="flex flex-col gap-12 relative">
                    <form method="POST" action="{{ route('registration.shelter.role_selection_store') }}">
                        @csrf
                        <button type="submit" name="role_shelter" value="shelterWorker"
                            class="flex flex-col items-center justify-center bg-[#D9D9D9] p-6 rounded-[40px] shadow-md md:w-[500px] md:h-[430px] text-center">
                            <img src="{{ asset('images/profile.svg') }}" alt="Dolgozó ikon" class="h-12 w-12 mb-2">
                            <span class="text-lg font-semibold">Menhely dolgozó</span>
                        </button>
                    </form>

                    <form method="POST" action="{{ route('registration.shelter.role_selection_store') }}">
                        @csrf
                        <button type="submit" name="role_shelter" value="shelterOwner"
                            class="flex flex-col items-center justify-center bg-[#D9D9D9] p-6 rounded-[40px] shadow-md md:w-[500px] md:h-[430px] text-center">
                            <img src="{{ asset('images/pet-shelter-svgrepo-com.svg') }}" alt="Tulajdonos ikon" class="h-12 w-12 mb-2">
                            <span class="text-lg font-semibold">Menhely tulajdonos</span>
                        </button>
                    </form>

                    <!-- Kutya kép -->
                    <div class="hidden md:block absolute md:right-[-300px] md:-bottom-10 lg:right-[-150px] lg:bottom-[-100px] xl:right-[-400px] xl:bottom-[-200px]">
                    <img src="{{ asset('images/standing-dog.svg') }}" alt="Kutya sziluett" class="h-[500px] md:h-[600px] lg:h-[700px] xl:h-[800px] object-contain">
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
