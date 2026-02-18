<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Tickets Details') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <a href="{{ url()->previous() }}" class="inline-block mb-5">
              <button class="px-4 py-2 mb-5 bg-blue-500 hover:bg-blue-700 text-white rounded-lg ml-4">Back</button>
            </a>
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <livewire:tickets.details :ticket="$ticket"/>
            </div>
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
             <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg mt-5">
               <livewire:tickets.history :ticket="$ticket"/>
              </div>
            </div>
        </div>
    </div>
</x-app-layout>