<?php

namespace App\Livewire\Traits;

use App\Models\Ticket;
use Illuminate\Support\Str;

/**
 * Trait for inline editing of model fields in Livewire components.
 *
 * Components using this trait must:
 * - Define a $ticket property (the model being edited)
 * - Define boolean properties for each editable field: $editing{Field} (e.g., $editingTitle)
 * - Define string properties for field values: ${field} (e.g., $title, $description)
 */
trait HasInlineEditing
{
    protected function getEditableModel(): Ticket
    {
        return $this->ticket;
    }

    protected function getEditableFields(): array
    {
        return ['title', 'description'];
    }

    /**
     * Start editing a field.
     */
    public function startEditing(string $field): void
    {
        if (! in_array($field, $this->getEditableFields())) {
            return;
        }

        $this->authorize('update', $this->getEditableModel());

        $editingProperty = 'editing'.Str::studly($field);
        $this->{$editingProperty} = true;
    }

    /**
     * Cancel editing a field and restore original value.
     */
    public function cancelEditing(string $field): void
    {
        $editingProperty = 'editing'.Str::studly($field);

        // Siempre resetear el estado de edición si la propiedad existe
        if (property_exists($this, $editingProperty)) {
            $this->{$editingProperty} = false;
        }

        // Restaurar valor original solo si el campo es editable
        if (in_array($field, $this->getEditableFields())) {
            $this->{$field} = $this->getEditableModel()->{$field};
        }
    }

    /**
     * Save a field value.
     */
    public function saveField(string $field): void
    {
        if (! in_array($field, $this->getEditableFields())) {
            return;
        }

        $this->authorize('update', $this->getEditableModel());

        $rules = Ticket::validationRules();

        if (isset($rules[$field])) {
            $this->validate(
                [$field => $rules[$field]],
                Ticket::validationMessages()
            );
        }

        $model = $this->getEditableModel();
        $model->update([$field => $this->{$field}]);
        $model->refresh();

        $editingProperty = 'editing'.Str::studly($field);
        $this->{$editingProperty} = false;

        $this->dispatch('saved');
    }
}
