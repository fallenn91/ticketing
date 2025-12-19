<?php

namespace App\Livewire\Traits;

use App\Services\AttachmentService;
use Illuminate\Database\Eloquent\Model;

trait HasAttachmentHandling
{
    protected function removeFromArray(string $property, int $index): void
    {
        $items = $this->{$property};
        array_splice($items, $index, 1);
        $this->{$property} = $items;
    }

    protected function storeAttachmentsFor(Model $model, string $property, string $subdirectory): void
    {
        $files = $this->{$property};
        if (! empty($files)) {
            app(AttachmentService::class)->storeForModel($model, $files, $subdirectory);
        }
    }
}
