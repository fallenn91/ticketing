<x-form-section submit="create">
    <x-slot name="title">
        {{ __('Create New Ticket') }}
    </x-slot>
    
    <x-slot name="description">
        {{ __('Fill out the form to create a ticket.') }}
    </x-slot>
    
    
    <x-slot name="form">
            
        
        <div class="col-span-6 sm:col-span-4">
            <x-input-label for="category" value="{{ __('Ticket Category') }}" />
                <select wire:model = "category_id" class="mt-1 block w-full">
                    <option value="">-- Select --</option>
                    @foreach ($tickets_category as $category)
                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                    @endforeach
                </select>
            <x-input-label for="comment" value="{{ __('Comment') }}" />

            <x-text-input
                id="comment"
                type="text"
                class="mt-1 block w-full"
                wire:model.defer="comment"
                autocomplete="comments"
            />
            <x-input-label for="user_id" value="{{ __('Assign User') }}" />
            <select wire:model="user_id" class="mt-1 block w-full">
                <option value = "">-- Assign User --</option>
                @foreach ($users as $user )
                    <option value="{{ $user->id }}">{{ $user->name }}</option>
                @endforeach
            </select>

            <x-input-error :messages="$errors->get('comment')" class="mt-2" />
        </div>
    </x-slot>

    <x-slot name="actions">
        <x-action-message class="mr-3" on="saved">
            {{ __('Created.') }}
        </x-action-message>

            <button wire:click="create"
            class="px-4 py-2 bg-blue-600 text-white rounded"
            >
            Create
            </button>
    </x-slot>
</x-form-section>