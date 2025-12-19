<div>
    <div class="py-8">
        <div class="max-w-3xl mx-auto px-4 sm:px-6 lg:px-8 space-y-6">

            <x-page-header title="Crear Nuevo Ticket" :backRoute="route('tickets.index')" />

            <x-ui.card>
                <div class="p-6">
                    <form wire:submit="save">
                        <x-form-field
                            name="title"
                            label="Título"
                            :required="true"
                            placeholder="Breve descripción del problema o solicitud"
                        />

                        <x-form-field
                            name="description"
                            label="Descripción"
                            type="textarea"
                            :required="true"
                            :rows="5"
                            placeholder="Describe detalladamente el problema o la solicitud..."
                        />

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-5 mb-6">
                            <x-form-field name="type" label="Tipo" type="select" :required="true" :options="$types" class="mb-0" />
                            <x-form-field name="priority" label="Prioridad" type="select" :required="true" :options="$priorities" class="mb-0" />
                        </div>

                        <x-form-field name="category_id" label="Categoría" type="select" :options="$categories" nullLabel="Sin categoría" class="mb-6" />

                        <x-form-field
                            name="deadline"
                            label="Fecha límite"
                            type="date"
                            class="mb-6"
                        />

                        @if(auth()->user()->isAdmin())
                        <x-form-field name="assigned_to_id" label="Responsable" type="select" :options="$users" class="mb-6" />
                        @endif

                        <x-file-upload model="attachments" class="mb-6" />

                        <div class="flex flex-col-reverse sm:flex-row sm:justify-end gap-3 pt-6">
                            <x-ui.button variant="secondary" :href="route('tickets.index')">
                                Cancelar
                            </x-ui.button>
                            <x-submit-button target="save" label="Crear Ticket" loadingLabel="Creando..." />
                        </div>
                    </form>
                </div>
            </x-ui.card>
        </div>
    </div>
</div>
