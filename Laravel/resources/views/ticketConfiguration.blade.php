<x-app-layout>
  
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Tickets Configuration') }}
        </h2>
    </x-slot>

    <div class="flex min-h-screen">

        <!-- Sidebar -->
        <aside class="w-80 bg-blue-800 text-white flex-shrink-0 border-blue">
            <nav class="mt-4">
                <a href="#" class="block px-4 py-2 hover:bg-gray-100 hover:text-blue-800 rounded transition-colors duration-200">Groups</a>
                <a href="#" class="block px-4 py-2 hover:bg-gray-100 hover:text-blue-800 rounded transition-colors duration-200">Statuses</a>
                <a href="#" class="block px-4 py-2 hover:bg-gray-100 hover:text-blue-800 rounded transition-colors duration-200">Priority</a>
            </nav>
        </aside>

        <!-- Contenido principal -->
        <main class="flex-1 py-12 bg-gray-100">
            <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">            
                <livewire:tickets.tools-ticket />
        </div>
    </div>
        </main>

    
</x-app-layout>