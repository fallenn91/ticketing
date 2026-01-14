<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Tickets Management') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            <div class="flex gap-2 mb-6">
              
              <span class="bg-gray-200 border border-gray-300 text-gray-800 text-sm font-medium px-1.5 py-0.5 rounded">OPEN</span>
              <span class="bg-blue-100 border border-blue-300 text-blue-800 text-sm font-medium px-1.5 py-0.5 rounded">IN PROCESS</span>
              <span class="bg-green-100 border border-green-300 text-green-800 text-sm font-medium px-1.5 py-0.5 rounded">RESOLVED</span>
              <span class="bg-red-100 border border-red-300 text-red-800 text-sm font-medium px-1.5 py-0.5 rounded">CLOSED</span>
              
            </div>
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <livewire:tickets.show />
            </div>
        </div>
    </div>
</x-app-layout>