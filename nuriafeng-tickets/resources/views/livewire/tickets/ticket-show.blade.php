<div>
    <div class="pt-4 sm:py-6 lg:py-8">
        <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8"
             x-data="{ saved: false }"
             x-on:saved.window="saved = true; setTimeout(() => saved = false, 1500)">

            <x-page-header :backRoute="$this->backRoute">
                <span x-show="saved"
                      x-transition:enter="transition ease-out duration-250"
                      x-transition:enter-start="opacity-0 translate-x-2 scale-95"
                      x-transition:enter-end="opacity-100 translate-x-0 scale-100"
                      x-transition:leave="transition ease-in duration-200"
                      x-transition:leave-start="opacity-100 scale-100"
                      x-transition:leave-end="opacity-0 scale-95"
                      class="inline-flex items-center gap-1.5 text-xs text-emerald-500 shrink-0 bg-emerald-50 dark:bg-emerald-500/10 px-2 py-1 rounded-full">
                    <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5"
                         x-show="saved"
                         x-transition:enter="transition ease-out duration-300 delay-100"
                         style="stroke-dasharray: 24; stroke-dashoffset: 0;">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7"
                              class="animate-check-draw" />
                    </svg>
                    Guardado
                </span>
            </x-page-header>

            <div class="mt-4 sm:mt-6 mb-6">
                {{-- Línea 1: ID + Título --}}
                <div class="flex items-baseline gap-3">
                    <span class="font-mono text-lg sm:text-xl lg:text-2xl font-black text-accent shrink-0">
                        #{{ $ticket->id }}
                    </span>

                    @can('update', $ticket)
                        <div class="min-w-0 flex-1">
                            {{-- Desktop: Inline editing --}}
                            <div class="hidden md:block">
                                @if($editingTitle)
                                    <div class="flex items-center gap-2">
                                        <input
                                            type="text"
                                            wire:model="title"
                                            wire:keydown.enter="saveField('title')"
                                            wire:keydown.escape="cancelEditing('title')"
                                            x-init="$el.focus(); $el.select()"
                                            class="flex-1 text-lg sm:text-xl lg:text-2xl font-semibold text-content bg-transparent border-b-2 border-accent focus:outline-none py-1"
                                        >
                                        <button wire:click="saveField('title')" type="button"
                                                class="p-1.5 text-emerald-500 hover:bg-emerald-500/10 rounded-lg transition-colors">
                                            <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                                <path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7" />
                                            </svg>
                                        </button>
                                        <button wire:click="cancelEditing('title')" type="button"
                                                class="p-1.5 text-content-muted hover:bg-surface-secondary rounded-lg transition-colors">
                                            <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                                <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                                            </svg>
                                        </button>
                                    </div>
                                    @error('title')
                                        <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                                    @enderror
                                @else
                                    <h1 wire:click="startEditing('title')"
                                        class="text-lg sm:text-xl lg:text-2xl font-semibold text-content cursor-pointer
                                               hover:bg-surface-secondary/50 rounded-lg px-2 py-1 -mx-2 -my-1
                                               transition-colors duration-150 inline-flex items-center gap-2 group">
                                        {{ $title }}
                                        <svg class="w-4 h-4 text-content-muted shrink-0 opacity-0 group-hover:opacity-100 transition-opacity duration-150"
                                             fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M16.862 4.487l1.687-1.688a1.875 1.875 0 112.652 2.652L10.582 16.07a4.5 4.5 0 01-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 011.13-1.897l8.932-8.931zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0115.75 21H5.25A2.25 2.25 0 013 18.75V8.25A2.25 2.25 0 015.25 6H10" />
                                        </svg>
                                    </h1>
                                @endif
                            </div>

                            {{-- Mobile: Abre bottom sheet --}}
                            <h1 @click="$dispatch('open-ticket-edit-sheet')"
                                class="md:hidden text-lg font-semibold text-content cursor-pointer
                                       hover:bg-surface-secondary/50 rounded-lg px-2 py-1 -mx-2 -my-1
                                       transition-colors duration-150">
                                {{ $title }}
                            </h1>
                        </div>
                    @else
                        <h1 class="text-lg sm:text-xl lg:text-2xl font-semibold text-content min-w-0">
                            {{ $ticket->title }}
                        </h1>
                    @endcan
                </div>

                {{-- Línea 2: Meta (autor + tiempo) --}}
                <p class="text-xs sm:text-sm text-content-muted mt-2">
                    por <span class="text-content-secondary">{{ $ticket->creator->name }}</span>
                    <span class="mx-1">·</span>
                    <x-relative-time :date="$ticket->created_at" />
                </p>

                {{-- Barra de estado: Pills horizontales --}}
                <div class="flex flex-wrap items-center gap-1.5 sm:gap-2 mt-3 sm:mt-4">
                    <x-ticket-type-badge :type="$ticket->type" />
                    <x-status-badge :status="$status" :interactive="$isAdmin" wireModel="status" />
                    <x-priority-badge :priority="$priority" :interactive="$isAdmin" wireModel="priority" />
                </div>

                <x-ticket-metadata-bar
                    :ticket="$ticket"
                    :users="$users"
                    :categories="$categories"
                    :isAdmin="$isAdmin"
                    :assignedToId="$assigned_to_id"
                    :categoryId="$category_id"
                    :deadline="$deadline"
                    :canEdit="auth()->user()->can('update', $ticket)"
                    class="mt-4 sm:mt-6 pt-4 sm:pt-6 border-t border-border"
                />
            </div>

            <div class="space-y-6">
                <x-ui.card class="!border-0 !shadow-none !rounded-none sm:!border sm:!shadow-soft sm:!rounded-xl dark:sm:!shadow-dark-soft animate-stagger-fade-up {{ $editingDescription ? 'relative z-20' : '' }}" style="animation-delay: 100ms">
                    <div class="py-3 sm:p-5 lg:p-6">
                        <div class="flex items-center justify-between mb-3 sm:mb-4">
                            <h2 class="text-xs font-semibold uppercase tracking-wider text-content-muted">
                                Descripción
                            </h2>
                        </div>

                        @can('update', $ticket)
                            {{-- Desktop: Inline editing --}}
                            <div class="hidden md:block">
                                @if($editingDescription)
                                    <div class="space-y-3">
                                        <textarea
                                            wire:model="description"
                                            x-init="$el.focus()"
                                            rows="6"
                                            class="w-full min-h-[160px] bg-surface-secondary border border-border rounded-lg p-3
                                                   text-content-secondary leading-relaxed focus:ring-2 focus:ring-accent/30
                                                   focus:border-accent focus:outline-none transition-all resize-y"
                                        ></textarea>
                                        @error('description')
                                            <p class="text-sm text-red-500">{{ $message }}</p>
                                        @enderror
                                        <div class="flex justify-end gap-2">
                                            <x-ui.button type="button" wire:click="cancelEditing('description')" variant="secondary" size="sm">
                                                Cancelar
                                            </x-ui.button>
                                            <x-ui.button type="button" wire:click="saveField('description')" size="sm">
                                                Guardar
                                            </x-ui.button>
                                        </div>
                                    </div>
                                @else
                                    <div wire:click="startEditing('description')"
                                         class="group relative cursor-pointer rounded-lg p-3 -m-3
                                                hover:bg-surface-secondary/50 transition-colors duration-150">
                                        <p class="text-content-secondary leading-relaxed whitespace-pre-wrap text-sm lg:text-base">{{ $description }}</p>
                                        <div class="absolute top-2 right-2 p-1.5 bg-surface rounded-lg shadow-sm
                                                    border border-border text-content-muted
                                                    opacity-0 group-hover:opacity-100 transition-opacity duration-150">
                                            <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                                <path stroke-linecap="round" stroke-linejoin="round" d="M16.862 4.487l1.687-1.688a1.875 1.875 0 112.652 2.652L10.582 16.07a4.5 4.5 0 01-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 011.13-1.897l8.932-8.931zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0115.75 21H5.25A2.25 2.25 0 013 18.75V8.25A2.25 2.25 0 015.25 6H10" />
                                            </svg>
                                        </div>
                                    </div>
                                @endif
                            </div>

                            {{-- Mobile: Abre bottom sheet --}}
                            <div @click="$dispatch('open-ticket-edit-sheet')"
                                 class="md:hidden cursor-pointer rounded-lg p-3 -m-3
                                        hover:bg-surface-secondary/50 transition-colors duration-150">
                                <p class="text-content-secondary leading-relaxed whitespace-pre-wrap text-xs">{{ $description }}</p>
                            </div>
                        @else
                            <p class="text-content-secondary leading-relaxed whitespace-pre-wrap text-xs sm:text-sm lg:text-base">{{ $ticket->description }}</p>
                        @endcan
                    </div>
                </x-ui.card>

                @if($ticketAttachments->count() > 0)
                <x-ui.card class="!border-0 !shadow-none !rounded-none sm:!border sm:!shadow-soft sm:!rounded-xl dark:sm:!shadow-dark-soft animate-stagger-fade-up" style="animation-delay: 150ms">
                    <div class="py-3 sm:p-5 lg:p-6">
                        <h2 class="text-xs font-semibold uppercase tracking-wider text-content-muted mb-3 sm:mb-4 flex items-center gap-2">
                            Archivos adjuntos
                            <span class="inline-flex items-center justify-center px-2 py-0.5 text-xs font-medium bg-surface-secondary text-content-secondary rounded-full">
                                {{ $ticketAttachments->count() }}
                            </span>
                        </h2>
                        <x-attachment-list :attachments="$ticketAttachments" />
                    </div>
                </x-ui.card>
                @endif

                <x-ui.card class="!border-0 !shadow-none !rounded-none sm:!border sm:!shadow-soft sm:!rounded-xl dark:sm:!shadow-dark-soft animate-stagger-fade-up" style="animation-delay: 200ms">
                    <div class="py-3 sm:p-5 lg:p-6">
                        <h2 class="text-xs font-semibold uppercase tracking-wider text-content-muted mb-3 sm:mb-4 flex items-center gap-2">
                            Comentarios
                            <span class="inline-flex items-center justify-center px-2 py-0.5 text-xs font-medium bg-surface-secondary text-content-secondary rounded-full">
                                {{ $comments->count() }}
                            </span>
                        </h2>

                        @if($comments->isEmpty())
                            <div class="py-8 text-center">
                                <svg class="w-10 h-10 mx-auto text-content-muted/50 mb-3" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z" />
                                </svg>
                                <p class="text-sm text-content-muted">No hay comentarios todavía</p>
                            </div>
                        @else
                            <div class="space-y-3 sm:space-y-4 mb-4 sm:mb-6">
                                @foreach($comments as $index => $comment)
                                    <div class="bg-surface-secondary rounded-lg sm:rounded-xl p-3 sm:p-4 animate-stagger-fade-up transition-all duration-200 hover:shadow-sm"
                                         style="animation-delay: {{ 250 + ($index * 50) }}ms">
                                        <div class="flex justify-between items-start mb-1.5 sm:mb-2">
                                            <div class="flex items-center gap-2">
                                                <span class="font-medium text-content text-xs sm:text-sm lg:text-base">{{ $comment->user->name }}</span>
                                                @if($comment->user->isAdmin())
                                                    <span class="inline-flex items-center px-1.5 py-0.5 rounded text-[10px] font-medium bg-accent/10 text-accent">
                                                        Admin
                                                    </span>
                                                @endif
                                            </div>
                                            <x-relative-time :date="$comment->created_at" class="text-[10px] sm:text-xs text-content-muted" />
                                        </div>
                                        <p class="text-content-secondary text-xs sm:text-sm lg:text-base leading-relaxed whitespace-pre-wrap">{{ $comment->body }}</p>
                                        @if($comment->attachments->count() > 0)
                                            <div class="mt-3 pt-3 border-t border-border/50">
                                                <x-attachment-list :attachments="$comment->attachments" size="small" />
                                            </div>
                                        @endif
                                    </div>
                                @endforeach
                            </div>
                        @endif

                        <div class="pt-3 sm:pt-4">
                            <form wire:submit="addComment">
                                <x-ui.label for="newComment" class="sr-only">Agregar comentario</x-ui.label>
                                <div class="border border-border rounded-lg overflow-hidden {{ $errors->has('newComment') ? 'border-red-500! ring-2 ring-red-500/30!' : '' }}">
                                    <x-ui.textarea wire:model="newComment" id="newComment" rows="2"
                                              class="border-0! rounded-none! focus:ring-0! text-xs sm:text-sm lg:text-base placeholder:text-xs sm:placeholder:text-sm lg:placeholder:text-base"
                                              placeholder="Escribe tu comentario..."></x-ui.textarea>
                                    <div class="flex items-center justify-between px-2 sm:px-3 py-1.5 sm:py-2 bg-surface-secondary border-t border-border">
                                        <x-file-upload-compact model="commentAttachments" />
                                        <x-submit-button target="addComment" label="Enviar" loadingLabel="Enviando..." size="compact" />
                                    </div>
                                </div>
                                @error('newComment')
                                    <p class="mt-1.5 text-sm text-red-500">{{ $message }}</p>
                                @enderror
                            </form>
                        </div>
                    </div>
                </x-ui.card>
            </div>
        </div>
    </div>

    @can('update', $ticket)
        <x-ticket-edit-sheet />
    @endcan
</div>
