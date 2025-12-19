<?php

namespace App\View;

class TicketPresentation
{
    public const STATUS_STYLES = [
        'abierto' => [
            'base' => 'bg-blue-50 text-blue-700 ring-blue-600/20 dark:bg-blue-500/10 dark:text-blue-400 dark:ring-blue-500/30',
            'hover' => 'hover:bg-blue-100 dark:hover:bg-blue-500/20',
            'icon' => '<circle cx="6" cy="6" r="3" fill="currentColor"/>',
        ],
        'en_proceso' => [
            'base' => 'bg-amber-50 text-amber-700 ring-amber-600/20 dark:bg-amber-500/10 dark:text-amber-400 dark:ring-amber-500/30',
            'hover' => 'hover:bg-amber-100 dark:hover:bg-amber-500/20',
            'icon' => '<path d="M6 2a4 4 0 100 8 4 4 0 000-8zM4 6a2 2 0 114 0 2 2 0 01-4 0z" fill="currentColor"/>',
        ],
        'resuelto' => [
            'base' => 'bg-emerald-50 text-emerald-700 ring-emerald-600/20 dark:bg-emerald-500/10 dark:text-emerald-400 dark:ring-emerald-500/30',
            'hover' => 'hover:bg-emerald-100 dark:hover:bg-emerald-500/20',
            'icon' => '<path d="M3 6l2 2 4-4" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" fill="none"/>',
        ],
        'cerrado' => [
            'base' => 'bg-slate-100 text-slate-600 ring-slate-500/20 dark:bg-slate-500/10 dark:text-slate-400 dark:ring-slate-500/30',
            'hover' => 'hover:bg-slate-200 dark:hover:bg-slate-500/20',
            'icon' => '<path d="M4 4l4 4M8 4l-4 4" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"/>',
        ],
    ];

    public const PRIORITY_STYLES = [
        'baja' => [
            'text' => 'text-slate-500 dark:text-slate-400',
            'bg' => 'bg-slate-50 ring-slate-200 dark:bg-slate-500/10 dark:ring-slate-500/30',
            'hover' => 'hover:bg-slate-100 dark:hover:bg-slate-500/20',
            'bars' => 1,
        ],
        'media' => [
            'text' => 'text-blue-500 dark:text-blue-400',
            'bg' => 'bg-blue-50 ring-blue-200 dark:bg-blue-500/10 dark:ring-blue-500/30',
            'hover' => 'hover:bg-blue-100 dark:hover:bg-blue-500/20',
            'bars' => 2,
        ],
        'alta' => [
            'text' => 'text-orange-500 dark:text-orange-400',
            'bg' => 'bg-orange-50 ring-orange-200 dark:bg-orange-500/10 dark:ring-orange-500/30',
            'hover' => 'hover:bg-orange-100 dark:hover:bg-orange-500/20',
            'bars' => 3,
        ],
        'critica' => [
            'text' => 'text-red-500 dark:text-red-400',
            'bg' => 'bg-red-50 ring-red-200 dark:bg-red-500/10 dark:ring-red-500/30',
            'hover' => 'hover:bg-red-100 dark:hover:bg-red-500/20',
            'bars' => 4,
        ],
    ];

    public const TYPE_STYLES = [
        'incidencia' => [
            'base' => 'bg-red-50 text-red-700 ring-red-600/20 dark:bg-red-500/10 dark:text-red-400 dark:ring-red-500/30',
            'icon' => '<path d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z" stroke-linecap="round" stroke-linejoin="round"/>',
        ],
        'peticion' => [
            'base' => 'bg-violet-50 text-violet-700 ring-violet-600/20 dark:bg-violet-500/10 dark:text-violet-400 dark:ring-violet-500/30',
            'icon' => '<path d="M8.228 9c.549-1.165 2.03-2 3.772-2 2.21 0 4 1.343 4 3 0 1.4-1.278 2.575-3.006 2.907-.542.104-.994.54-.994 1.093m0 3h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" stroke-linecap="round" stroke-linejoin="round"/>',
        ],
    ];

    public static function getStatusConfig(string $status): array
    {
        return self::STATUS_STYLES[$status] ?? self::STATUS_STYLES['cerrado'];
    }

    public static function getPriorityConfig(string $priority): array
    {
        return self::PRIORITY_STYLES[$priority] ?? self::PRIORITY_STYLES['baja'];
    }

    public static function getTypeConfig(string $type): array
    {
        return self::TYPE_STYLES[$type] ?? self::TYPE_STYLES['incidencia'];
    }
}
