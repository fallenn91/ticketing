<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\MorphTo;
use Illuminate\Support\Facades\Storage;

class Attachment extends Model
{
    use HasFactory;

    protected $fillable = [
        'attachable_type',
        'attachable_id',
        'user_id',
        'original_name',
        'stored_name',
        'mime_type',
        'size',
        'disk',
        'path',
    ];

    public const MAX_SIZE_MB = 10;

    public const MAX_SIZE_KB = 10240;

    public const MAX_FILES = 5;

    public const ALLOWED_MIMES = [
        'image/jpeg',
        'image/png',
        'image/gif',
        'application/pdf',
        'application/msword',
        'application/vnd.openxmlformats-officedocument.wordprocessingml.document',
        'application/vnd.ms-excel',
        'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet',
    ];

    public const ALLOWED_EXTENSIONS = 'jpg,jpeg,png,gif,pdf,doc,docx,xls,xlsx';

    public static function validationRules(string $field = 'attachments'): array
    {
        return [
            $field => 'nullable|array|max:'.self::MAX_FILES,
            $field.'.*' => 'file|max:'.self::MAX_SIZE_KB.'|mimes:'.self::ALLOWED_EXTENSIONS,
        ];
    }

    public static function validationMessages(string $field = 'attachments'): array
    {
        return [
            $field.'.max' => 'No puedes subir más de '.self::MAX_FILES.' archivos a la vez.',
            $field.'.*.file' => 'El archivo no es válido.',
            $field.'.*.max' => 'El archivo no puede superar los '.self::MAX_SIZE_MB.' MB.',
            $field.'.*.mimes' => 'Solo se permiten archivos: JPG, PNG, GIF, PDF, DOC, DOCX, XLS, XLSX.',
        ];
    }

    public function attachable(): MorphTo
    {
        return $this->morphTo();
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function isImage(): bool
    {
        return str_starts_with($this->mime_type, 'image/');
    }

    public function getFormattedSizeAttribute(): string
    {
        $bytes = $this->size;
        if ($bytes >= 1048576) {
            return number_format($bytes / 1048576, 2).' MB';
        }

        return number_format($bytes / 1024, 2).' KB';
    }

    public function getIconTypeAttribute(): string
    {
        return match (true) {
            $this->isImage() => 'image',
            str_contains($this->mime_type, 'pdf') => 'pdf',
            str_contains($this->mime_type, 'word') || str_contains($this->mime_type, 'document') => 'word',
            str_contains($this->mime_type, 'excel') || str_contains($this->mime_type, 'spreadsheet') => 'excel',
            default => 'file',
        };
    }

    public function getFullPath(): string
    {
        return Storage::disk($this->disk)->path($this->path);
    }

    public function deleteFile(): bool
    {
        return Storage::disk($this->disk)->delete($this->path);
    }
}
