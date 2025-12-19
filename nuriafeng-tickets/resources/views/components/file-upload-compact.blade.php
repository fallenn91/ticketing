@props([
    'model' => 'attachments',
])

<div {{ $attributes }}>
    {{-- Botón trigger --}}
    <label for="{{ $model }}" class="inline-flex items-center gap-1.5 sm:gap-2 text-xs sm:text-sm text-content-muted hover:text-content cursor-pointer transition-colors">
        <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
            <path stroke-linecap="round" stroke-linejoin="round" d="M18.375 12.739l-7.693 7.693a4.5 4.5 0 01-6.364-6.364l10.94-10.94A3 3 0 1119.5 7.372L8.552 18.32m.009-.01l-.01.01m5.699-9.941l-7.81 7.81a1.5 1.5 0 002.112 2.13" />
        </svg>
        <span wire:loading.remove wire:target="{{ $model }}">Adjuntar archivo</span>

        {{-- Loading indicator inline --}}
        <span wire:loading wire:target="{{ $model }}" class="inline-flex items-center gap-1.5 text-accent">
            <svg class="animate-spin w-4 h-4" fill="none" viewBox="0 0 24 24">
                <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"/>
                <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4z"/>
            </svg>
            <span class="text-xs">Subiendo...</span>
        </span>
    </label>

    <input type="file" wire:model="{{ $model }}" id="{{ $model }}" multiple
           accept=".jpg,.jpeg,.png,.gif,.pdf,.doc,.docx,.xls,.xlsx"
           class="hidden" />

    {{-- Chips de archivos seleccionados --}}
    @php $files = $this->{$model} ?? []; @endphp
    @if(is_array($files) && count($files) > 0)
        <div class="flex flex-wrap gap-2 mt-3 px-3 pb-2">
            @foreach($files as $index => $file)
                <span class="inline-flex items-center gap-1.5 px-2.5 py-1 text-xs text-content-secondary bg-surface-secondary border border-border rounded-full">
                    {{ Str::limit($file->getClientOriginalName(), 20) }}
                    <button type="button" wire:click="removeCommentAttachment({{ $index }})"
                            class="text-content-muted hover:text-red-400 transition-colors">
                        <svg class="w-3 h-3" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                        </svg>
                    </button>
                </span>
            @endforeach
        </div>
    @endif

    @error($model)
        <p class="mt-2 px-3 text-xs text-red-500">{{ $message }}</p>
    @enderror
    @error($model . '.*')
        <p class="mt-2 px-3 text-xs text-red-500">{{ $message }}</p>
    @enderror
</div>
