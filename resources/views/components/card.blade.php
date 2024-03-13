<div class="mt-8 mx-8 divide-y divide-gray-200 overflow-hidden rounded-lg bg-white shadow">
        <div class="px-4 py-5 sm:px-6">
            {{ $header }}
        </div>

    <div class="px-4 py-5 sm:p-6">
        {{ $slot }}
    </div>

    @if($footer)
        <div class="px-4 py-4 sm:px-6">
            {{ $footer }}
        </div>
    @endif
</div>
