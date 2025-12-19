<?php

namespace App\Services;

use App\Models\Ticket;
use App\Models\TicketCategory;
use App\Models\User;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Cache;

class TicketDataService
{
    private const CACHE_TTL = 300;

    public function getActiveCategories(): Collection
    {
        return Cache::remember('ticket_categories_active', self::CACHE_TTL, function () {
            return TicketCategory::active()->orderBy('name')->get();
        });
    }

    public function getOrderedUsers(): Collection
    {
        return Cache::remember('users_ordered', self::CACHE_TTL, function () {
            return User::orderBy('name')->get();
        });
    }

    public function getTicketFormData(bool $includeUsers = false): array
    {
        $data = [
            'categories' => $this->getActiveCategories(),
            'statuses' => Ticket::STATUSES,
            'priorities' => Ticket::PRIORITIES,
            'types' => Ticket::TYPES,
        ];

        if ($includeUsers) {
            $data['users'] = $this->getOrderedUsers();
        }

        return $data;
    }

    public function getStatusStats(): array
    {
        return Cache::remember('ticket_status_stats', self::CACHE_TTL, function () {
            return Ticket::selectRaw('status, COUNT(*) as count')
                ->groupBy('status')
                ->pluck('count', 'status')
                ->toArray();
        });
    }

    public function clearCache(): void
    {
        Cache::forget('ticket_categories_active');
        Cache::forget('users_ordered');
        Cache::forget('ticket_status_stats');
    }
}
