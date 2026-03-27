<div class="bg-white shadow-md rounded-lg p-4 mt-6">
    <h2 class="text-lg font-semibold text-[var(--negro)] mb-3">Últimas Actividades</h2>
    <ul class="divide-y divide-gray-200">
        @foreach($activities as $activity)
            <li class="py-2 flex items-start space-x-3">
                <i class="{{ $activity['icon'] }} text-[var(--verde)] mt-1"></i>
                <div class="flex-1">
                    <p class="text-sm text-gray-700">
                        <span class="font-semibold">{{ $activity['user'] }}</span> {{ $activity['action'] }}
                    </p>
                    <p class="text-xs text-gray-400">{{ $activity['time'] }}</p>
                </div>
            </li>
        @endforeach
    </ul>
</div>