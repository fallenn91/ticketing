@props(['title', 'description'])

@if(trim($title ?? '') !== '' || trim($description ?? '') !== '')
<div class="md:col-span-1 flex justify-between">
    <div class="px-4 sm:px-0">
      @if(trim($title ?? '') !== '')
        <h3 class="text-lg font-medium text-gray-900">{{ $title }}</h3>
      @endif
      @if(trim($title ?? '') !== '')
        <p class="mt-1 text-sm text-gray-600">
            {{ $description }}
        </p>
      @endif
    </div>

    <div class="px-4 sm:px-0">
        {{ $aside ?? '' }}
    </div>
</div>
@endif
