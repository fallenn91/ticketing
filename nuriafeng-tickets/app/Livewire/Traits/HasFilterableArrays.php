<?php

namespace App\Livewire\Traits;

use App\Models\Ticket;

trait HasFilterableArrays
{
    public string $search = '';

    public array $status = [];

    public array $priority = [];

    public string $sortField = 'updated_at';

    public string $sortDirection = 'desc';

    /**
     * Override in component to specify which fields are filterable arrays.
     */
    protected function getFilterableFields(): array
    {
        return ['status', 'priority'];
    }

    /**
     * Override in component to specify which fields to reset when clearing all filters.
     */
    protected function getResettableFields(): array
    {
        return array_merge(['search'], $this->getFilterableFields());
    }

    protected function getFilterLabels(): array
    {
        return [
            'status' => Ticket::STATUSES,
            'priority' => Ticket::PRIORITIES,
            'type' => Ticket::TYPES,
        ];
    }

    public function getActiveFiltersProperty(): array
    {
        $filters = [];
        $labels = $this->getFilterLabels();

        foreach ($this->getFilterableFields() as $field) {
            $values = $this->{$field} ?? [];

            if (! is_array($values)) {
                $values = $values ? [$values] : [];
            }

            foreach ($values as $value) {
                $label = $value;

                if (isset($labels[$field])) {
                    if (is_callable($labels[$field])) {
                        $label = $labels[$field]($value);
                    } elseif (is_array($labels[$field])) {
                        $label = $labels[$field][$value] ?? $value;
                    }
                }

                $filters[] = [
                    'field' => $field,
                    'value' => $value,
                    'label' => $label,
                ];
            }
        }

        return $filters;
    }

    public function updatingSearch(): void
    {
        $this->resetPage();
    }

    public function toggleFilter(string $field, string $value): void
    {
        if (! in_array($field, $this->getFilterableFields())) {
            return;
        }

        if (in_array($value, $this->{$field})) {
            $this->{$field} = array_values(array_diff($this->{$field}, [$value]));
        } else {
            $this->{$field}[] = $value;
        }

        $this->resetPage();
    }

    public function clearFilter(string $field): void
    {
        if (in_array($field, $this->getFilterableFields())) {
            $this->{$field} = [];
            $this->resetPage();
        }
    }

    public function removeFilter(string $field, string $value): void
    {
        if (in_array($field, $this->getFilterableFields()) && in_array($value, $this->{$field})) {
            $this->{$field} = array_values(array_diff($this->{$field}, [$value]));
            $this->resetPage();
        }
    }

    public function sortBy(string $field): void
    {
        if ($this->sortField === $field) {
            $this->sortDirection = $this->sortDirection === 'asc' ? 'desc' : 'asc';
        } else {
            $this->sortField = $field;
            $this->sortDirection = 'desc';
        }
    }

    public function setSortDirection(string $direction): void
    {
        if (in_array($direction, ['asc', 'desc'])) {
            $this->sortDirection = $direction;
        }
    }

    public function clearFilters(): void
    {
        $this->reset($this->getResettableFields());
        $this->resetPage();
    }
}
