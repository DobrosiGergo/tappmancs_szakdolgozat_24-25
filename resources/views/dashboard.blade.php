<x-app-layout>
@if(auth()->check())
    <p>Be vagy jelentkezve!</p>
    <p>{{ json_encode(auth()->user(), JSON_PRETTY_PRINT) }}</p>

@endif
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    {{ __("You're logged in!") }}
                </div>
                <li>
                    <form action="{{ route('logout') }}" method="POST">
                        @csrf
                        <button type="submit">Logout</button>
                    </form>
                </li>
            </div>
        </div>
    </div>
</x-app-layout>
