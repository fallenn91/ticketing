<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Tickets Management') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            <div class="flex gap-2 mb-6">
              
              <button wire:click="statusSelected(null)" class="bg-gray-800 border border-gray-300 text-white text-sm font-medium px-1.5 py-0.5 rounded-lg">ALL</button>
              <button wire:click="statusSelected('open')" class="bg-gray-200 border border-gray-300 text-gray-800 text-sm font-medium px-1.5 py-0.5 rounded-lg">OPEN</button>
              <button wire:click="statusSelected('in_process')" class="bg-blue-100 border border-blue-300 text-blue-800 text-sm font-medium px-1.5 py-0.5 rounded-lg">IN PROCESS</button>
              <button wire:click="statusSelected('resolved')" class="bg-green-100 border border-green-300 text-green-800 text-sm font-medium px-1.5 py-0.5 rounded-lg">RESOLVED</button>
              <button wire:click="statusSelected('closed')" class="bg-red-100 border border-red-300 text-red-800 text-sm font-medium px-1.5 py-0.5 rounded-lg">CLOSED</button>
              
            </div>
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <livewire:tickets.show />
            </div>
        </div>
    </div>
</x-app-layout>