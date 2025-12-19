<div>
    <div class="pt-4 sm:py-6 lg:py-8">
        <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8"
             x-data="{ saved: false }"
             x-on:saved.window="saved = true; setTimeout(() => saved = false, 1500)">

            <?php if (isset($component)) { $__componentOriginalf8d4ea307ab1e58d4e472a43c8548d8e = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalf8d4ea307ab1e58d4e472a43c8548d8e = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.page-header','data' => ['backRoute' => $this->backRoute]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('page-header'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['backRoute' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($this->backRoute)]); ?>
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
             <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginalf8d4ea307ab1e58d4e472a43c8548d8e)): ?>
<?php $attributes = $__attributesOriginalf8d4ea307ab1e58d4e472a43c8548d8e; ?>
<?php unset($__attributesOriginalf8d4ea307ab1e58d4e472a43c8548d8e); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalf8d4ea307ab1e58d4e472a43c8548d8e)): ?>
<?php $component = $__componentOriginalf8d4ea307ab1e58d4e472a43c8548d8e; ?>
<?php unset($__componentOriginalf8d4ea307ab1e58d4e472a43c8548d8e); ?>
<?php endif; ?>

            <div class="mt-4 sm:mt-6 mb-6">
                
                <div class="flex items-baseline gap-3">
                    <span class="font-mono text-lg sm:text-xl lg:text-2xl font-black text-accent shrink-0">
                        #<?php echo e($ticket->id); ?>

                    </span>

                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('update', $ticket)): ?>
                        <div class="min-w-0 flex-1">
                            
                            <div class="hidden md:block">
                                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($editingTitle): ?>
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
                                    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php $__errorArgs = ['title'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                        <p class="mt-1 text-sm text-red-500"><?php echo e($message); ?></p>
                                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                                <?php else: ?>
                                    <h1 wire:click="startEditing('title')"
                                        class="text-lg sm:text-xl lg:text-2xl font-semibold text-content cursor-pointer
                                               hover:bg-surface-secondary/50 rounded-lg px-2 py-1 -mx-2 -my-1
                                               transition-colors duration-150 inline-flex items-center gap-2 group">
                                        <?php echo e($title); ?>

                                        <svg class="w-4 h-4 text-content-muted shrink-0 opacity-0 group-hover:opacity-100 transition-opacity duration-150"
                                             fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M16.862 4.487l1.687-1.688a1.875 1.875 0 112.652 2.652L10.582 16.07a4.5 4.5 0 01-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 011.13-1.897l8.932-8.931zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0115.75 21H5.25A2.25 2.25 0 013 18.75V8.25A2.25 2.25 0 015.25 6H10" />
                                        </svg>
                                    </h1>
                                <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                            </div>

                            
                            <h1 @click="$dispatch('open-ticket-edit-sheet')"
                                class="md:hidden text-lg font-semibold text-content cursor-pointer
                                       hover:bg-surface-secondary/50 rounded-lg px-2 py-1 -mx-2 -my-1
                                       transition-colors duration-150">
                                <?php echo e($title); ?>

                            </h1>
                        </div>
                    <?php else: ?>
                        <h1 class="text-lg sm:text-xl lg:text-2xl font-semibold text-content min-w-0">
                            <?php echo e($ticket->title); ?>

                        </h1>
                    <?php endif; ?>
                </div>

                
                <p class="text-xs sm:text-sm text-content-muted mt-2">
                    por <span class="text-content-secondary"><?php echo e($ticket->creator->name); ?></span>
                    <span class="mx-1">·</span>
                    <?php if (isset($component)) { $__componentOriginal063ef6340f5e96725a9814a04adffcf8 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal063ef6340f5e96725a9814a04adffcf8 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.relative-time','data' => ['date' => $ticket->created_at]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('relative-time'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['date' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($ticket->created_at)]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal063ef6340f5e96725a9814a04adffcf8)): ?>
<?php $attributes = $__attributesOriginal063ef6340f5e96725a9814a04adffcf8; ?>
<?php unset($__attributesOriginal063ef6340f5e96725a9814a04adffcf8); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal063ef6340f5e96725a9814a04adffcf8)): ?>
<?php $component = $__componentOriginal063ef6340f5e96725a9814a04adffcf8; ?>
<?php unset($__componentOriginal063ef6340f5e96725a9814a04adffcf8); ?>
<?php endif; ?>
                </p>

                
                <div class="flex flex-wrap items-center gap-1.5 sm:gap-2 mt-3 sm:mt-4">
                    <?php if (isset($component)) { $__componentOriginal1d1bd0487c09dc4ff09118e40e7c4d02 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal1d1bd0487c09dc4ff09118e40e7c4d02 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.ticket-type-badge','data' => ['type' => $ticket->type]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('ticket-type-badge'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['type' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($ticket->type)]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal1d1bd0487c09dc4ff09118e40e7c4d02)): ?>
<?php $attributes = $__attributesOriginal1d1bd0487c09dc4ff09118e40e7c4d02; ?>
<?php unset($__attributesOriginal1d1bd0487c09dc4ff09118e40e7c4d02); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal1d1bd0487c09dc4ff09118e40e7c4d02)): ?>
<?php $component = $__componentOriginal1d1bd0487c09dc4ff09118e40e7c4d02; ?>
<?php unset($__componentOriginal1d1bd0487c09dc4ff09118e40e7c4d02); ?>
<?php endif; ?>
                    <?php if (isset($component)) { $__componentOriginal8c81617a70e11bcf247c4db924ab1b62 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal8c81617a70e11bcf247c4db924ab1b62 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.status-badge','data' => ['status' => $status,'interactive' => $isAdmin,'wireModel' => 'status']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('status-badge'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['status' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($status),'interactive' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($isAdmin),'wireModel' => 'status']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal8c81617a70e11bcf247c4db924ab1b62)): ?>
<?php $attributes = $__attributesOriginal8c81617a70e11bcf247c4db924ab1b62; ?>
<?php unset($__attributesOriginal8c81617a70e11bcf247c4db924ab1b62); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal8c81617a70e11bcf247c4db924ab1b62)): ?>
<?php $component = $__componentOriginal8c81617a70e11bcf247c4db924ab1b62; ?>
<?php unset($__componentOriginal8c81617a70e11bcf247c4db924ab1b62); ?>
<?php endif; ?>
                    <?php if (isset($component)) { $__componentOriginalb3f3930a96171a12366c9551b2dd3c07 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalb3f3930a96171a12366c9551b2dd3c07 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.priority-badge','data' => ['priority' => $priority,'interactive' => $isAdmin,'wireModel' => 'priority']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('priority-badge'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['priority' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($priority),'interactive' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($isAdmin),'wireModel' => 'priority']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginalb3f3930a96171a12366c9551b2dd3c07)): ?>
<?php $attributes = $__attributesOriginalb3f3930a96171a12366c9551b2dd3c07; ?>
<?php unset($__attributesOriginalb3f3930a96171a12366c9551b2dd3c07); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalb3f3930a96171a12366c9551b2dd3c07)): ?>
<?php $component = $__componentOriginalb3f3930a96171a12366c9551b2dd3c07; ?>
<?php unset($__componentOriginalb3f3930a96171a12366c9551b2dd3c07); ?>
<?php endif; ?>
                </div>

                <?php if (isset($component)) { $__componentOriginald65a499de013c85400b2c35b29435d00 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginald65a499de013c85400b2c35b29435d00 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.ticket-metadata-bar','data' => ['ticket' => $ticket,'users' => $users,'categories' => $categories,'isAdmin' => $isAdmin,'assignedToId' => $assigned_to_id,'categoryId' => $category_id,'deadline' => $deadline,'canEdit' => auth()->user()->can('update', $ticket),'class' => 'mt-4 sm:mt-6 pt-4 sm:pt-6 border-t border-border']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('ticket-metadata-bar'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['ticket' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($ticket),'users' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($users),'categories' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($categories),'isAdmin' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($isAdmin),'assignedToId' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($assigned_to_id),'categoryId' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($category_id),'deadline' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($deadline),'canEdit' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(auth()->user()->can('update', $ticket)),'class' => 'mt-4 sm:mt-6 pt-4 sm:pt-6 border-t border-border']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginald65a499de013c85400b2c35b29435d00)): ?>
<?php $attributes = $__attributesOriginald65a499de013c85400b2c35b29435d00; ?>
<?php unset($__attributesOriginald65a499de013c85400b2c35b29435d00); ?>
<?php endif; ?>
<?php if (isset($__componentOriginald65a499de013c85400b2c35b29435d00)): ?>
<?php $component = $__componentOriginald65a499de013c85400b2c35b29435d00; ?>
<?php unset($__componentOriginald65a499de013c85400b2c35b29435d00); ?>
<?php endif; ?>
            </div>

            <div class="space-y-6">
                <?php if (isset($component)) { $__componentOriginaldae4cd48acb67888a4631e1ba48f2f93 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginaldae4cd48acb67888a4631e1ba48f2f93 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.ui.card','data' => ['class' => '!border-0 !shadow-none !rounded-none sm:!border sm:!shadow-soft sm:!rounded-xl dark:sm:!shadow-dark-soft animate-stagger-fade-up '.e($editingDescription ? 'relative z-20' : '').'','style' => 'animation-delay: 100ms']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('ui.card'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => '!border-0 !shadow-none !rounded-none sm:!border sm:!shadow-soft sm:!rounded-xl dark:sm:!shadow-dark-soft animate-stagger-fade-up '.e($editingDescription ? 'relative z-20' : '').'','style' => 'animation-delay: 100ms']); ?>
                    <div class="py-3 sm:p-5 lg:p-6">
                        <div class="flex items-center justify-between mb-3 sm:mb-4">
                            <h2 class="text-xs font-semibold uppercase tracking-wider text-content-muted">
                                Descripción
                            </h2>
                        </div>

                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('update', $ticket)): ?>
                            
                            <div class="hidden md:block">
                                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($editingDescription): ?>
                                    <div class="space-y-3">
                                        <textarea
                                            wire:model="description"
                                            x-init="$el.focus()"
                                            rows="6"
                                            class="w-full min-h-[160px] bg-surface-secondary border border-border rounded-lg p-3
                                                   text-content-secondary leading-relaxed focus:ring-2 focus:ring-accent/30
                                                   focus:border-accent focus:outline-none transition-all resize-y"
                                        ></textarea>
                                        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php $__errorArgs = ['description'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                            <p class="text-sm text-red-500"><?php echo e($message); ?></p>
                                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                                        <div class="flex justify-end gap-2">
                                            <?php if (isset($component)) { $__componentOriginala8bb031a483a05f647cb99ed3a469847 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginala8bb031a483a05f647cb99ed3a469847 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.ui.button','data' => ['type' => 'button','wire:click' => 'cancelEditing(\'description\')','variant' => 'secondary','size' => 'sm']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('ui.button'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['type' => 'button','wire:click' => 'cancelEditing(\'description\')','variant' => 'secondary','size' => 'sm']); ?>
                                                Cancelar
                                             <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginala8bb031a483a05f647cb99ed3a469847)): ?>
<?php $attributes = $__attributesOriginala8bb031a483a05f647cb99ed3a469847; ?>
<?php unset($__attributesOriginala8bb031a483a05f647cb99ed3a469847); ?>
<?php endif; ?>
<?php if (isset($__componentOriginala8bb031a483a05f647cb99ed3a469847)): ?>
<?php $component = $__componentOriginala8bb031a483a05f647cb99ed3a469847; ?>
<?php unset($__componentOriginala8bb031a483a05f647cb99ed3a469847); ?>
<?php endif; ?>
                                            <?php if (isset($component)) { $__componentOriginala8bb031a483a05f647cb99ed3a469847 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginala8bb031a483a05f647cb99ed3a469847 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.ui.button','data' => ['type' => 'button','wire:click' => 'saveField(\'description\')','size' => 'sm']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('ui.button'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['type' => 'button','wire:click' => 'saveField(\'description\')','size' => 'sm']); ?>
                                                Guardar
                                             <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginala8bb031a483a05f647cb99ed3a469847)): ?>
<?php $attributes = $__attributesOriginala8bb031a483a05f647cb99ed3a469847; ?>
<?php unset($__attributesOriginala8bb031a483a05f647cb99ed3a469847); ?>
<?php endif; ?>
<?php if (isset($__componentOriginala8bb031a483a05f647cb99ed3a469847)): ?>
<?php $component = $__componentOriginala8bb031a483a05f647cb99ed3a469847; ?>
<?php unset($__componentOriginala8bb031a483a05f647cb99ed3a469847); ?>
<?php endif; ?>
                                        </div>
                                    </div>
                                <?php else: ?>
                                    <div wire:click="startEditing('description')"
                                         class="group relative cursor-pointer rounded-lg p-3 -m-3
                                                hover:bg-surface-secondary/50 transition-colors duration-150">
                                        <p class="text-content-secondary leading-relaxed whitespace-pre-wrap text-sm lg:text-base"><?php echo e($description); ?></p>
                                        <div class="absolute top-2 right-2 p-1.5 bg-surface rounded-lg shadow-sm
                                                    border border-border text-content-muted
                                                    opacity-0 group-hover:opacity-100 transition-opacity duration-150">
                                            <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                                <path stroke-linecap="round" stroke-linejoin="round" d="M16.862 4.487l1.687-1.688a1.875 1.875 0 112.652 2.652L10.582 16.07a4.5 4.5 0 01-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 011.13-1.897l8.932-8.931zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0115.75 21H5.25A2.25 2.25 0 013 18.75V8.25A2.25 2.25 0 015.25 6H10" />
                                            </svg>
                                        </div>
                                    </div>
                                <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                            </div>

                            
                            <div @click="$dispatch('open-ticket-edit-sheet')"
                                 class="md:hidden cursor-pointer rounded-lg p-3 -m-3
                                        hover:bg-surface-secondary/50 transition-colors duration-150">
                                <p class="text-content-secondary leading-relaxed whitespace-pre-wrap text-xs"><?php echo e($description); ?></p>
                            </div>
                        <?php else: ?>
                            <p class="text-content-secondary leading-relaxed whitespace-pre-wrap text-xs sm:text-sm lg:text-base"><?php echo e($ticket->description); ?></p>
                        <?php endif; ?>
                    </div>
                 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginaldae4cd48acb67888a4631e1ba48f2f93)): ?>
<?php $attributes = $__attributesOriginaldae4cd48acb67888a4631e1ba48f2f93; ?>
<?php unset($__attributesOriginaldae4cd48acb67888a4631e1ba48f2f93); ?>
<?php endif; ?>
<?php if (isset($__componentOriginaldae4cd48acb67888a4631e1ba48f2f93)): ?>
<?php $component = $__componentOriginaldae4cd48acb67888a4631e1ba48f2f93; ?>
<?php unset($__componentOriginaldae4cd48acb67888a4631e1ba48f2f93); ?>
<?php endif; ?>

                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($ticketAttachments->count() > 0): ?>
                <?php if (isset($component)) { $__componentOriginaldae4cd48acb67888a4631e1ba48f2f93 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginaldae4cd48acb67888a4631e1ba48f2f93 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.ui.card','data' => ['class' => '!border-0 !shadow-none !rounded-none sm:!border sm:!shadow-soft sm:!rounded-xl dark:sm:!shadow-dark-soft animate-stagger-fade-up','style' => 'animation-delay: 150ms']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('ui.card'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => '!border-0 !shadow-none !rounded-none sm:!border sm:!shadow-soft sm:!rounded-xl dark:sm:!shadow-dark-soft animate-stagger-fade-up','style' => 'animation-delay: 150ms']); ?>
                    <div class="py-3 sm:p-5 lg:p-6">
                        <h2 class="text-xs font-semibold uppercase tracking-wider text-content-muted mb-3 sm:mb-4 flex items-center gap-2">
                            Archivos adjuntos
                            <span class="inline-flex items-center justify-center px-2 py-0.5 text-xs font-medium bg-surface-secondary text-content-secondary rounded-full">
                                <?php echo e($ticketAttachments->count()); ?>

                            </span>
                        </h2>
                        <?php if (isset($component)) { $__componentOriginal8f2eee9e1d69a51c587b8a17ef406b68 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal8f2eee9e1d69a51c587b8a17ef406b68 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.attachment-list','data' => ['attachments' => $ticketAttachments]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('attachment-list'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['attachments' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($ticketAttachments)]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal8f2eee9e1d69a51c587b8a17ef406b68)): ?>
<?php $attributes = $__attributesOriginal8f2eee9e1d69a51c587b8a17ef406b68; ?>
<?php unset($__attributesOriginal8f2eee9e1d69a51c587b8a17ef406b68); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal8f2eee9e1d69a51c587b8a17ef406b68)): ?>
<?php $component = $__componentOriginal8f2eee9e1d69a51c587b8a17ef406b68; ?>
<?php unset($__componentOriginal8f2eee9e1d69a51c587b8a17ef406b68); ?>
<?php endif; ?>
                    </div>
                 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginaldae4cd48acb67888a4631e1ba48f2f93)): ?>
<?php $attributes = $__attributesOriginaldae4cd48acb67888a4631e1ba48f2f93; ?>
<?php unset($__attributesOriginaldae4cd48acb67888a4631e1ba48f2f93); ?>
<?php endif; ?>
<?php if (isset($__componentOriginaldae4cd48acb67888a4631e1ba48f2f93)): ?>
<?php $component = $__componentOriginaldae4cd48acb67888a4631e1ba48f2f93; ?>
<?php unset($__componentOriginaldae4cd48acb67888a4631e1ba48f2f93); ?>
<?php endif; ?>
                <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>

                <?php if (isset($component)) { $__componentOriginaldae4cd48acb67888a4631e1ba48f2f93 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginaldae4cd48acb67888a4631e1ba48f2f93 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.ui.card','data' => ['class' => '!border-0 !shadow-none !rounded-none sm:!border sm:!shadow-soft sm:!rounded-xl dark:sm:!shadow-dark-soft animate-stagger-fade-up','style' => 'animation-delay: 200ms']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('ui.card'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => '!border-0 !shadow-none !rounded-none sm:!border sm:!shadow-soft sm:!rounded-xl dark:sm:!shadow-dark-soft animate-stagger-fade-up','style' => 'animation-delay: 200ms']); ?>
                    <div class="py-3 sm:p-5 lg:p-6">
                        <h2 class="text-xs font-semibold uppercase tracking-wider text-content-muted mb-3 sm:mb-4 flex items-center gap-2">
                            Comentarios
                            <span class="inline-flex items-center justify-center px-2 py-0.5 text-xs font-medium bg-surface-secondary text-content-secondary rounded-full">
                                <?php echo e($comments->count()); ?>

                            </span>
                        </h2>

                        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($comments->isEmpty()): ?>
                            <div class="py-8 text-center">
                                <svg class="w-10 h-10 mx-auto text-content-muted/50 mb-3" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z" />
                                </svg>
                                <p class="text-sm text-content-muted">No hay comentarios todavía</p>
                            </div>
                        <?php else: ?>
                            <div class="space-y-3 sm:space-y-4 mb-4 sm:mb-6">
                                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php $__currentLoopData = $comments; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $comment): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <div class="bg-surface-secondary rounded-lg sm:rounded-xl p-3 sm:p-4 animate-stagger-fade-up transition-all duration-200 hover:shadow-sm"
                                         style="animation-delay: <?php echo e(250 + ($index * 50)); ?>ms">
                                        <div class="flex justify-between items-start mb-1.5 sm:mb-2">
                                            <div class="flex items-center gap-2">
                                                <span class="font-medium text-content text-xs sm:text-sm lg:text-base"><?php echo e($comment->user->name); ?></span>
                                                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($comment->user->isAdmin()): ?>
                                                    <span class="inline-flex items-center px-1.5 py-0.5 rounded text-[10px] font-medium bg-accent/10 text-accent">
                                                        Admin
                                                    </span>
                                                <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                                            </div>
                                            <?php if (isset($component)) { $__componentOriginal063ef6340f5e96725a9814a04adffcf8 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal063ef6340f5e96725a9814a04adffcf8 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.relative-time','data' => ['date' => $comment->created_at,'class' => 'text-[10px] sm:text-xs text-content-muted']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('relative-time'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['date' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($comment->created_at),'class' => 'text-[10px] sm:text-xs text-content-muted']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal063ef6340f5e96725a9814a04adffcf8)): ?>
<?php $attributes = $__attributesOriginal063ef6340f5e96725a9814a04adffcf8; ?>
<?php unset($__attributesOriginal063ef6340f5e96725a9814a04adffcf8); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal063ef6340f5e96725a9814a04adffcf8)): ?>
<?php $component = $__componentOriginal063ef6340f5e96725a9814a04adffcf8; ?>
<?php unset($__componentOriginal063ef6340f5e96725a9814a04adffcf8); ?>
<?php endif; ?>
                                        </div>
                                        <p class="text-content-secondary text-xs sm:text-sm lg:text-base leading-relaxed whitespace-pre-wrap"><?php echo e($comment->body); ?></p>
                                        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($comment->attachments->count() > 0): ?>
                                            <div class="mt-3 pt-3 border-t border-border/50">
                                                <?php if (isset($component)) { $__componentOriginal8f2eee9e1d69a51c587b8a17ef406b68 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal8f2eee9e1d69a51c587b8a17ef406b68 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.attachment-list','data' => ['attachments' => $comment->attachments,'size' => 'small']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('attachment-list'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['attachments' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($comment->attachments),'size' => 'small']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal8f2eee9e1d69a51c587b8a17ef406b68)): ?>
<?php $attributes = $__attributesOriginal8f2eee9e1d69a51c587b8a17ef406b68; ?>
<?php unset($__attributesOriginal8f2eee9e1d69a51c587b8a17ef406b68); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal8f2eee9e1d69a51c587b8a17ef406b68)): ?>
<?php $component = $__componentOriginal8f2eee9e1d69a51c587b8a17ef406b68; ?>
<?php unset($__componentOriginal8f2eee9e1d69a51c587b8a17ef406b68); ?>
<?php endif; ?>
                                            </div>
                                        <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                                    </div>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                            </div>
                        <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>

                        <div class="pt-3 sm:pt-4">
                            <form wire:submit="addComment">
                                <?php if (isset($component)) { $__componentOriginalb2c43a998f3174877f99993c62e16bb4 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalb2c43a998f3174877f99993c62e16bb4 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.ui.label','data' => ['for' => 'newComment','class' => 'sr-only']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('ui.label'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['for' => 'newComment','class' => 'sr-only']); ?>Agregar comentario <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginalb2c43a998f3174877f99993c62e16bb4)): ?>
<?php $attributes = $__attributesOriginalb2c43a998f3174877f99993c62e16bb4; ?>
<?php unset($__attributesOriginalb2c43a998f3174877f99993c62e16bb4); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalb2c43a998f3174877f99993c62e16bb4)): ?>
<?php $component = $__componentOriginalb2c43a998f3174877f99993c62e16bb4; ?>
<?php unset($__componentOriginalb2c43a998f3174877f99993c62e16bb4); ?>
<?php endif; ?>
                                <div class="border border-border rounded-lg overflow-hidden <?php echo e($errors->has('newComment') ? 'border-red-500! ring-2 ring-red-500/30!' : ''); ?>">
                                    <?php if (isset($component)) { $__componentOriginal62d1193389a71cd99ff302a00abbf991 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal62d1193389a71cd99ff302a00abbf991 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.ui.textarea','data' => ['wire:model' => 'newComment','id' => 'newComment','rows' => '2','class' => 'border-0! rounded-none! focus:ring-0! text-xs sm:text-sm lg:text-base placeholder:text-xs sm:placeholder:text-sm lg:placeholder:text-base','placeholder' => 'Escribe tu comentario...']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('ui.textarea'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['wire:model' => 'newComment','id' => 'newComment','rows' => '2','class' => 'border-0! rounded-none! focus:ring-0! text-xs sm:text-sm lg:text-base placeholder:text-xs sm:placeholder:text-sm lg:placeholder:text-base','placeholder' => 'Escribe tu comentario...']); ?> <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal62d1193389a71cd99ff302a00abbf991)): ?>
<?php $attributes = $__attributesOriginal62d1193389a71cd99ff302a00abbf991; ?>
<?php unset($__attributesOriginal62d1193389a71cd99ff302a00abbf991); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal62d1193389a71cd99ff302a00abbf991)): ?>
<?php $component = $__componentOriginal62d1193389a71cd99ff302a00abbf991; ?>
<?php unset($__componentOriginal62d1193389a71cd99ff302a00abbf991); ?>
<?php endif; ?>
                                    <div class="flex items-center justify-between px-2 sm:px-3 py-1.5 sm:py-2 bg-surface-secondary border-t border-border">
                                        <?php if (isset($component)) { $__componentOriginalcc527e26e45ebbbca4bf4a88b7f625e9 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalcc527e26e45ebbbca4bf4a88b7f625e9 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.file-upload-compact','data' => ['model' => 'commentAttachments']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('file-upload-compact'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['model' => 'commentAttachments']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginalcc527e26e45ebbbca4bf4a88b7f625e9)): ?>
<?php $attributes = $__attributesOriginalcc527e26e45ebbbca4bf4a88b7f625e9; ?>
<?php unset($__attributesOriginalcc527e26e45ebbbca4bf4a88b7f625e9); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalcc527e26e45ebbbca4bf4a88b7f625e9)): ?>
<?php $component = $__componentOriginalcc527e26e45ebbbca4bf4a88b7f625e9; ?>
<?php unset($__componentOriginalcc527e26e45ebbbca4bf4a88b7f625e9); ?>
<?php endif; ?>
                                        <?php if (isset($component)) { $__componentOriginal13113c9f32f6116c43cb9fbecee94495 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal13113c9f32f6116c43cb9fbecee94495 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.submit-button','data' => ['target' => 'addComment','label' => 'Enviar','loadingLabel' => 'Enviando...','size' => 'compact']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('submit-button'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['target' => 'addComment','label' => 'Enviar','loadingLabel' => 'Enviando...','size' => 'compact']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal13113c9f32f6116c43cb9fbecee94495)): ?>
<?php $attributes = $__attributesOriginal13113c9f32f6116c43cb9fbecee94495; ?>
<?php unset($__attributesOriginal13113c9f32f6116c43cb9fbecee94495); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal13113c9f32f6116c43cb9fbecee94495)): ?>
<?php $component = $__componentOriginal13113c9f32f6116c43cb9fbecee94495; ?>
<?php unset($__componentOriginal13113c9f32f6116c43cb9fbecee94495); ?>
<?php endif; ?>
                                    </div>
                                </div>
                                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php $__errorArgs = ['newComment'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                    <p class="mt-1.5 text-sm text-red-500"><?php echo e($message); ?></p>
                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                            </form>
                        </div>
                    </div>
                 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginaldae4cd48acb67888a4631e1ba48f2f93)): ?>
<?php $attributes = $__attributesOriginaldae4cd48acb67888a4631e1ba48f2f93; ?>
<?php unset($__attributesOriginaldae4cd48acb67888a4631e1ba48f2f93); ?>
<?php endif; ?>
<?php if (isset($__componentOriginaldae4cd48acb67888a4631e1ba48f2f93)): ?>
<?php $component = $__componentOriginaldae4cd48acb67888a4631e1ba48f2f93; ?>
<?php unset($__componentOriginaldae4cd48acb67888a4631e1ba48f2f93); ?>
<?php endif; ?>
            </div>
        </div>
    </div>

    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('update', $ticket)): ?>
        <?php if (isset($component)) { $__componentOriginal8aabd742d5a5931f30514108faca2fcb = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal8aabd742d5a5931f30514108faca2fcb = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.ticket-edit-sheet','data' => []] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('ticket-edit-sheet'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal8aabd742d5a5931f30514108faca2fcb)): ?>
<?php $attributes = $__attributesOriginal8aabd742d5a5931f30514108faca2fcb; ?>
<?php unset($__attributesOriginal8aabd742d5a5931f30514108faca2fcb); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal8aabd742d5a5931f30514108faca2fcb)): ?>
<?php $component = $__componentOriginal8aabd742d5a5931f30514108faca2fcb; ?>
<?php unset($__componentOriginal8aabd742d5a5931f30514108faca2fcb); ?>
<?php endif; ?>
    <?php endif; ?>
</div>
<?php /**PATH /var/www/html/resources/views/livewire/tickets/ticket-show.blade.php ENDPATH**/ ?>