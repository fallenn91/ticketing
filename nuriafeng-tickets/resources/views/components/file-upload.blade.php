@props([
    'model' => 'attachments',
    'label' => 'Archivos adjuntos',
    'multiple' => true,
    'accept' => '.jpg,.jpeg,.png,.gif,.pdf,.doc,.docx,.xls,.xlsx',
    'maxFiles' => 5,
    'maxSizeMb' => 10,
])

<div {{ $attributes->only('class') }}>
    @if($label)
        <x-ui.label for="{{ $model }}">{{ $label }}</x-ui.label>
    @endif

    {{-- Dropzone area --}}
    <label for="{{ $model }}"
           class="relative flex flex-col items-center justify-center w-full px-4 py-4 bg-surface-secondary border border-dashed border-border rounded-lg cursor-pointer transition-all duration-200 hover:border-accent/50 hover:shadow-sm hover:shadow-accent/5 group">
        <div class="flex flex-col items-center justify-center text-center">
            <svg class="w-6 h-6 mb-1.5 text-content-muted group-hover:text-accent transition-colors" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5">
                <path stroke-linecap="round" stroke-linejoin="round" d="M12 16.5V9.75m0 0l3 3m-3-3l-3 3M6.75 19.5a4.5 4.5 0 01-1.41-8.775 5.25 5.25 0 0110.233-2.33 3 3 0 013.758 3.848A3.752 3.752 0 0118 19.5H6.75z" />
            </svg>
            <p class="text-sm text-content-secondary group-hover:text-content transition-colors">
                <span class="font-medium text-accent">Seleccionar archivos</span> o arrastrar aqui
            </p>
            <p class="mt-1 text-xs text-content-muted">
                JPG, PNG, GIF, PDF, DOC, XLSX (max. {{ $maxSizeMb }}MB, {{ $maxFiles }} archivos)
            </p>
        </div>
        <input
            type="file"
            wire:model="{{ $model }}"
            id="{{ $model }}"
            @if($multiple) multiple @endif
            accept="{{ $accept }}"
            class="absolute inset-0 w-full h-full opacity-0 cursor-pointer"
        />

    </label>

    @error($model)
        <p class="mt-1.5 text-sm text-red-500">{{ $message }}</p>
    @enderror

    @error($model . '.*')
        <p class="mt-1.5 text-sm text-red-500">{{ $message }}</p>
    @enderror

    {{-- Skeleton mientras se sube --}}
    <div wire:loading wire:target="{{ $model }}" class="mt-3">
        <div class="flex items-center justify-between p-3 bg-surface border border-border rounded-lg animate-pulse">
            <div class="flex items-center gap-3">
                <div class="w-10 h-10 rounded-lg bg-surface-secondary"></div>
                <div class="space-y-2">
                    <div class="h-4 w-32 bg-surface-secondary rounded"></div>
                    <div class="h-3 w-16 bg-surface-secondary rounded"></div>
                </div>
            </div>
            <svg class="animate-spin w-5 h-5 text-accent" fill="none" viewBox="0 0 24 24">
                <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"/>
                <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4z"/>
            </svg>
        </div>
    </div>

    {{-- Preview uploaded files --}}
    @php
        $files = $this->{$model} ?? [];
    @endphp

    @if(is_array($files) && count($files) > 0)
        <ul class="mt-3 space-y-2">
            @foreach($files as $index => $file)
                <li class="flex items-center justify-between p-3 bg-surface border border-border rounded-lg hover:bg-surface-secondary transition-colors">
                    <div class="flex items-center gap-3 min-w-0">
                        @if(str_starts_with($file->getMimeType(), 'image/'))
                            <div class="w-10 h-10 rounded-lg overflow-hidden bg-surface-secondary shrink-0">
                                <img src="{{ $file->temporaryUrl() }}" class="w-full h-full object-cover" alt="Preview" />
                            </div>
                        @else
                            @php
                                $ext = strtolower($file->getClientOriginalExtension());
                                $iconType = match($ext) {
                                    'pdf' => 'pdf',
                                    'doc', 'docx' => 'word',
                                    'xls', 'xlsx' => 'excel',
                                    'jpg', 'jpeg', 'png', 'gif', 'webp' => 'image',
                                    default => 'file',
                                };
                            @endphp
                            <x-attachment-icon :type="$iconType" class="w-10 h-10 shrink-0" />
                        @endif
                        <div class="min-w-0">
                            <p class="text-sm font-medium text-content truncate max-w-[200px] sm:max-w-xs">
                                {{ $file->getClientOriginalName() }}
                            </p>
                            <p class="text-xs text-content-muted">
                                {{ number_format($file->getSize() / 1024, 1) }} KB
                            </p>
                        </div>
                    </div>
                    @php
                        $removeMethod = $model === 'attachments' ? 'removeAttachment' : 'removeCommentAttachment';
                    @endphp
                    <button type="button" wire:click="{{ $removeMethod }}({{ $index }})"
                            class="p-1.5 rounded-lg text-content-muted hover:text-red-500 hover:bg-red-50 dark:hover:bg-red-500/10 transition-all shrink-0"
                            title="Eliminar archivo">
                        <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                        </svg>
                    </button>
                </li>
            @endforeach
        </ul>
    @endif
</div>
