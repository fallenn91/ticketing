<div>
    <div class="sm:py-8">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <?php if (isset($component)) { $__componentOriginaldae4cd48acb67888a4631e1ba48f2f93 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginaldae4cd48acb67888a4631e1ba48f2f93 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.ui.card','data' => ['class' => '!border-0 !shadow-none !rounded-none sm:!border sm:!shadow-soft sm:!rounded-xl dark:sm:!shadow-dark-soft']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('ui.card'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => '!border-0 !shadow-none !rounded-none sm:!border sm:!shadow-soft sm:!rounded-xl dark:sm:!shadow-dark-soft']); ?>
                <div class="px-4 py-4 sm:p-6">
                    
                    <?php if (isset($component)) { $__componentOriginal4d8100ce1fb6c9f6fe3e3a9cf9be02ab = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal4d8100ce1fb6c9f6fe3e3a9cf9be02ab = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.tickets-header','data' => ['title' => $title,'total' => $tickets->total(),'showStats' => $showStats,'stats' => $stats ?? [],'status' => $status]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('tickets-header'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['title' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($title),'total' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($tickets->total()),'showStats' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($showStats),'stats' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($stats ?? []),'status' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($status)]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal4d8100ce1fb6c9f6fe3e3a9cf9be02ab)): ?>
<?php $attributes = $__attributesOriginal4d8100ce1fb6c9f6fe3e3a9cf9be02ab; ?>
<?php unset($__attributesOriginal4d8100ce1fb6c9f6fe3e3a9cf9be02ab); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal4d8100ce1fb6c9f6fe3e3a9cf9be02ab)): ?>
<?php $component = $__componentOriginal4d8100ce1fb6c9f6fe3e3a9cf9be02ab; ?>
<?php unset($__componentOriginal4d8100ce1fb6c9f6fe3e3a9cf9be02ab); ?>
<?php endif; ?>

                    
                    <?php
                        $secondaryFiltersCount = count($type ?? []) + count($category ?? []) + count($creator ?? []) + count($assignee ?? []);
                    ?>

                    
                    <?php if (isset($component)) { $__componentOriginale9f22847d79d6273acb27aff60f1f678 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginale9f22847d79d6273acb27aff60f1f678 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.filter-bar','data' => ['activeFilters' => $this->activeFilters,'clearMethod' => 'clearFilters','statuses' => $statuses,'priorities' => $priorities,'deadlineOptions' => $deadlineOptions,'status' => $status,'priority' => $priority,'deadline' => $deadline,'extraFilters' => $extraFilters ?? [],'types' => $types ?? [],'categories' => $categories ?? collect(),'users' => $users ?? collect(),'type' => $type ?? [],'category' => $category ?? [],'creator' => $creator ?? [],'assignee' => $assignee ?? [],'stats' => $stats ?? [],'sortField' => $sortField,'sortDirection' => $sortDirection,'sortFields' => \App\Models\Ticket::SORT_FIELDS]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('filter-bar'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['activeFilters' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($this->activeFilters),'clearMethod' => 'clearFilters','statuses' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($statuses),'priorities' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($priorities),'deadlineOptions' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($deadlineOptions),'status' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($status),'priority' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($priority),'deadline' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($deadline),'extraFilters' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($extraFilters ?? []),'types' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($types ?? []),'categories' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($categories ?? collect()),'users' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($users ?? collect()),'type' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($type ?? []),'category' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($category ?? []),'creator' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($creator ?? []),'assignee' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($assignee ?? []),'stats' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($stats ?? []),'sortField' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($sortField),'sortDirection' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($sortDirection),'sortFields' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(\App\Models\Ticket::SORT_FIELDS)]); ?>
                         <?php $__env->slot('search', null, []); ?> 
                            <?php if (isset($component)) { $__componentOriginal1c4b45f62348de9b6fa41ee823d3fa96 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal1c4b45f62348de9b6fa41ee823d3fa96 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.search-input','data' => ['placeholder' => 'Buscar por titulo o ID...']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('search-input'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['placeholder' => 'Buscar por titulo o ID...']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal1c4b45f62348de9b6fa41ee823d3fa96)): ?>
<?php $attributes = $__attributesOriginal1c4b45f62348de9b6fa41ee823d3fa96; ?>
<?php unset($__attributesOriginal1c4b45f62348de9b6fa41ee823d3fa96); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal1c4b45f62348de9b6fa41ee823d3fa96)): ?>
<?php $component = $__componentOriginal1c4b45f62348de9b6fa41ee823d3fa96; ?>
<?php unset($__componentOriginal1c4b45f62348de9b6fa41ee823d3fa96); ?>
<?php endif; ?>
                         <?php $__env->endSlot(); ?>

                        
                        <?php if (isset($component)) { $__componentOriginalb921c1d8f3114956c1eefb7c2c21f5b8 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalb921c1d8f3114956c1eefb7c2c21f5b8 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.filter-chip','data' => ['label' => 'Estado','options' => $statuses,'wireModel' => 'status','value' => $status]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('filter-chip'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['label' => 'Estado','options' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($statuses),'wireModel' => 'status','value' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($status)]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginalb921c1d8f3114956c1eefb7c2c21f5b8)): ?>
<?php $attributes = $__attributesOriginalb921c1d8f3114956c1eefb7c2c21f5b8; ?>
<?php unset($__attributesOriginalb921c1d8f3114956c1eefb7c2c21f5b8); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalb921c1d8f3114956c1eefb7c2c21f5b8)): ?>
<?php $component = $__componentOriginalb921c1d8f3114956c1eefb7c2c21f5b8; ?>
<?php unset($__componentOriginalb921c1d8f3114956c1eefb7c2c21f5b8); ?>
<?php endif; ?>
                        <?php if (isset($component)) { $__componentOriginalb921c1d8f3114956c1eefb7c2c21f5b8 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalb921c1d8f3114956c1eefb7c2c21f5b8 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.filter-chip','data' => ['label' => 'Prioridad','options' => $priorities,'wireModel' => 'priority','value' => $priority]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('filter-chip'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['label' => 'Prioridad','options' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($priorities),'wireModel' => 'priority','value' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($priority)]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginalb921c1d8f3114956c1eefb7c2c21f5b8)): ?>
<?php $attributes = $__attributesOriginalb921c1d8f3114956c1eefb7c2c21f5b8; ?>
<?php unset($__attributesOriginalb921c1d8f3114956c1eefb7c2c21f5b8); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalb921c1d8f3114956c1eefb7c2c21f5b8)): ?>
<?php $component = $__componentOriginalb921c1d8f3114956c1eefb7c2c21f5b8; ?>
<?php unset($__componentOriginalb921c1d8f3114956c1eefb7c2c21f5b8); ?>
<?php endif; ?>
                        <?php if (isset($component)) { $__componentOriginalb921c1d8f3114956c1eefb7c2c21f5b8 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalb921c1d8f3114956c1eefb7c2c21f5b8 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.filter-chip','data' => ['label' => 'Fecha limite','options' => $deadlineOptions,'wireModel' => 'deadline','value' => $deadline]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('filter-chip'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['label' => 'Fecha limite','options' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($deadlineOptions),'wireModel' => 'deadline','value' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($deadline)]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginalb921c1d8f3114956c1eefb7c2c21f5b8)): ?>
<?php $attributes = $__attributesOriginalb921c1d8f3114956c1eefb7c2c21f5b8; ?>
<?php unset($__attributesOriginalb921c1d8f3114956c1eefb7c2c21f5b8); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalb921c1d8f3114956c1eefb7c2c21f5b8)): ?>
<?php $component = $__componentOriginalb921c1d8f3114956c1eefb7c2c21f5b8; ?>
<?php unset($__componentOriginalb921c1d8f3114956c1eefb7c2c21f5b8); ?>
<?php endif; ?>

                        
                        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if(!empty($extraFilters ?? [])): ?>
                            <?php if (isset($component)) { $__componentOriginal998aae73fc463ff48ed6f2c9a271e491 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal998aae73fc463ff48ed6f2c9a271e491 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.filter-dropdown','data' => ['label' => 'Mas filtros','activeCount' => $secondaryFiltersCount]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('filter-dropdown'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['label' => 'Mas filtros','activeCount' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($secondaryFiltersCount)]); ?>
                                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if(in_array('type', $extraFilters ?? [])): ?>
                                    <?php if (isset($component)) { $__componentOriginalb921c1d8f3114956c1eefb7c2c21f5b8 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalb921c1d8f3114956c1eefb7c2c21f5b8 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.filter-chip','data' => ['label' => 'Tipo','options' => $types ?? [],'wireModel' => 'type','value' => $type ?? []]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('filter-chip'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['label' => 'Tipo','options' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($types ?? []),'wireModel' => 'type','value' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($type ?? [])]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginalb921c1d8f3114956c1eefb7c2c21f5b8)): ?>
<?php $attributes = $__attributesOriginalb921c1d8f3114956c1eefb7c2c21f5b8; ?>
<?php unset($__attributesOriginalb921c1d8f3114956c1eefb7c2c21f5b8); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalb921c1d8f3114956c1eefb7c2c21f5b8)): ?>
<?php $component = $__componentOriginalb921c1d8f3114956c1eefb7c2c21f5b8; ?>
<?php unset($__componentOriginalb921c1d8f3114956c1eefb7c2c21f5b8); ?>
<?php endif; ?>
                                <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if(in_array('category', $extraFilters ?? [])): ?>
                                    <?php if (isset($component)) { $__componentOriginalb921c1d8f3114956c1eefb7c2c21f5b8 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalb921c1d8f3114956c1eefb7c2c21f5b8 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.filter-chip','data' => ['label' => 'Categoria','options' => ($categories ?? collect())->pluck('name', 'id')->toArray(),'wireModel' => 'category','value' => $category ?? []]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('filter-chip'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['label' => 'Categoria','options' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(($categories ?? collect())->pluck('name', 'id')->toArray()),'wireModel' => 'category','value' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($category ?? [])]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginalb921c1d8f3114956c1eefb7c2c21f5b8)): ?>
<?php $attributes = $__attributesOriginalb921c1d8f3114956c1eefb7c2c21f5b8; ?>
<?php unset($__attributesOriginalb921c1d8f3114956c1eefb7c2c21f5b8); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalb921c1d8f3114956c1eefb7c2c21f5b8)): ?>
<?php $component = $__componentOriginalb921c1d8f3114956c1eefb7c2c21f5b8; ?>
<?php unset($__componentOriginalb921c1d8f3114956c1eefb7c2c21f5b8); ?>
<?php endif; ?>
                                <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if(in_array('creator', $extraFilters ?? [])): ?>
                                    <?php if (isset($component)) { $__componentOriginalb921c1d8f3114956c1eefb7c2c21f5b8 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalb921c1d8f3114956c1eefb7c2c21f5b8 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.filter-chip','data' => ['label' => 'Creador','options' => ($users ?? collect())->pluck('name', 'id')->toArray(),'wireModel' => 'creator','value' => $creator ?? []]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('filter-chip'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['label' => 'Creador','options' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(($users ?? collect())->pluck('name', 'id')->toArray()),'wireModel' => 'creator','value' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($creator ?? [])]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginalb921c1d8f3114956c1eefb7c2c21f5b8)): ?>
<?php $attributes = $__attributesOriginalb921c1d8f3114956c1eefb7c2c21f5b8; ?>
<?php unset($__attributesOriginalb921c1d8f3114956c1eefb7c2c21f5b8); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalb921c1d8f3114956c1eefb7c2c21f5b8)): ?>
<?php $component = $__componentOriginalb921c1d8f3114956c1eefb7c2c21f5b8; ?>
<?php unset($__componentOriginalb921c1d8f3114956c1eefb7c2c21f5b8); ?>
<?php endif; ?>
                                <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if(in_array('assignee', $extraFilters ?? [])): ?>
                                    <?php if (isset($component)) { $__componentOriginalb921c1d8f3114956c1eefb7c2c21f5b8 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalb921c1d8f3114956c1eefb7c2c21f5b8 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.filter-chip','data' => ['label' => 'Responsable','options' => ($users ?? collect())->pluck('name', 'id')->toArray(),'wireModel' => 'assignee','value' => $assignee ?? []]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('filter-chip'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['label' => 'Responsable','options' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(($users ?? collect())->pluck('name', 'id')->toArray()),'wireModel' => 'assignee','value' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($assignee ?? [])]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginalb921c1d8f3114956c1eefb7c2c21f5b8)): ?>
<?php $attributes = $__attributesOriginalb921c1d8f3114956c1eefb7c2c21f5b8; ?>
<?php unset($__attributesOriginalb921c1d8f3114956c1eefb7c2c21f5b8); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalb921c1d8f3114956c1eefb7c2c21f5b8)): ?>
<?php $component = $__componentOriginalb921c1d8f3114956c1eefb7c2c21f5b8; ?>
<?php unset($__componentOriginalb921c1d8f3114956c1eefb7c2c21f5b8); ?>
<?php endif; ?>
                                <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                             <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal998aae73fc463ff48ed6f2c9a271e491)): ?>
<?php $attributes = $__attributesOriginal998aae73fc463ff48ed6f2c9a271e491; ?>
<?php unset($__attributesOriginal998aae73fc463ff48ed6f2c9a271e491); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal998aae73fc463ff48ed6f2c9a271e491)): ?>
<?php $component = $__componentOriginal998aae73fc463ff48ed6f2c9a271e491; ?>
<?php unset($__componentOriginal998aae73fc463ff48ed6f2c9a271e491); ?>
<?php endif; ?>
                        <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                     <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginale9f22847d79d6273acb27aff60f1f678)): ?>
<?php $attributes = $__attributesOriginale9f22847d79d6273acb27aff60f1f678; ?>
<?php unset($__attributesOriginale9f22847d79d6273acb27aff60f1f678); ?>
<?php endif; ?>
<?php if (isset($__componentOriginale9f22847d79d6273acb27aff60f1f678)): ?>
<?php $component = $__componentOriginale9f22847d79d6273acb27aff60f1f678; ?>
<?php unset($__componentOriginale9f22847d79d6273acb27aff60f1f678); ?>
<?php endif; ?>

                    
                    <?php if (isset($component)) { $__componentOriginalae460e2dda85a1b49ba0476be36beba8 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalae460e2dda85a1b49ba0476be36beba8 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.tickets-table','data' => ['tickets' => $tickets,'showCreator' => in_array('creator', $extraFilters ?? []),'sortField' => $sortField,'sortDirection' => $sortDirection,'interactive' => $interactive ?? false]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('tickets-table'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['tickets' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($tickets),'showCreator' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(in_array('creator', $extraFilters ?? [])),'sortField' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($sortField),'sortDirection' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($sortDirection),'interactive' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($interactive ?? false)]); ?>
                         <?php $__env->slot('empty', null, []); ?> 
                            <?php if (isset($component)) { $__componentOriginal074a021b9d42f490272b5eefda63257c = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal074a021b9d42f490272b5eefda63257c = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.empty-state','data' => ['icon' => 'ticket','title' => $emptyMessage ?? 'No hay tickets','description' => ($emptyAction ?? false) ? 'Crea tu primer ticket para empezar.' : 'No se encontraron tickets con los filtros aplicados.']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('empty-state'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['icon' => 'ticket','title' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($emptyMessage ?? 'No hay tickets'),'description' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(($emptyAction ?? false) ? 'Crea tu primer ticket para empezar.' : 'No se encontraron tickets con los filtros aplicados.')]); ?>
                                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($emptyAction ?? false): ?>
                                    <?php if (isset($component)) { $__componentOriginal2c87ebf539427d59172ec176cf809196 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal2c87ebf539427d59172ec176cf809196 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.ui.new-ticket-button','data' => []] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('ui.new-ticket-button'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal2c87ebf539427d59172ec176cf809196)): ?>
<?php $attributes = $__attributesOriginal2c87ebf539427d59172ec176cf809196; ?>
<?php unset($__attributesOriginal2c87ebf539427d59172ec176cf809196); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal2c87ebf539427d59172ec176cf809196)): ?>
<?php $component = $__componentOriginal2c87ebf539427d59172ec176cf809196; ?>
<?php unset($__componentOriginal2c87ebf539427d59172ec176cf809196); ?>
<?php endif; ?>
                                <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                             <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal074a021b9d42f490272b5eefda63257c)): ?>
<?php $attributes = $__attributesOriginal074a021b9d42f490272b5eefda63257c; ?>
<?php unset($__attributesOriginal074a021b9d42f490272b5eefda63257c); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal074a021b9d42f490272b5eefda63257c)): ?>
<?php $component = $__componentOriginal074a021b9d42f490272b5eefda63257c; ?>
<?php unset($__componentOriginal074a021b9d42f490272b5eefda63257c); ?>
<?php endif; ?>
                         <?php $__env->endSlot(); ?>
                     <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginalae460e2dda85a1b49ba0476be36beba8)): ?>
<?php $attributes = $__attributesOriginalae460e2dda85a1b49ba0476be36beba8; ?>
<?php unset($__attributesOriginalae460e2dda85a1b49ba0476be36beba8); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalae460e2dda85a1b49ba0476be36beba8)): ?>
<?php $component = $__componentOriginalae460e2dda85a1b49ba0476be36beba8; ?>
<?php unset($__componentOriginalae460e2dda85a1b49ba0476be36beba8); ?>
<?php endif; ?>

                    
                    <?php if (isset($component)) { $__componentOriginalfc7aa36c6e9ee34a1e43ba6b8e5462f6 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalfc7aa36c6e9ee34a1e43ba6b8e5462f6 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.tickets-mobile-list','data' => ['tickets' => $tickets,'fromAdmin' => $interactive ?? false]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('tickets-mobile-list'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['tickets' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($tickets),'fromAdmin' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($interactive ?? false)]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginalfc7aa36c6e9ee34a1e43ba6b8e5462f6)): ?>
<?php $attributes = $__attributesOriginalfc7aa36c6e9ee34a1e43ba6b8e5462f6; ?>
<?php unset($__attributesOriginalfc7aa36c6e9ee34a1e43ba6b8e5462f6); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalfc7aa36c6e9ee34a1e43ba6b8e5462f6)): ?>
<?php $component = $__componentOriginalfc7aa36c6e9ee34a1e43ba6b8e5462f6; ?>
<?php unset($__componentOriginalfc7aa36c6e9ee34a1e43ba6b8e5462f6); ?>
<?php endif; ?>

                    
                    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($tickets->hasPages()): ?>
                        <div class="mt-6">
                            <?php echo e($tickets->links()); ?>

                        </div>
                    <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
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
<?php /**PATH /var/www/html/resources/views/livewire/tickets/ticket-list.blade.php ENDPATH**/ ?>