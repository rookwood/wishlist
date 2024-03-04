<x-guest-layout>
    <div class="flex justify-between">
        <h1 class="text-xl mb-4">{{ $wishlist->name }}</h1>
        <h3 class="text-md text-gray-500 mb-4">By {{ $wishlist->owners }}</h3>
    </div>
    <ul class="divide-gray-300 divide-y">
        @foreach($wishlist->items as $item)
            <x-wishlist-item :item="$item" key="{{ $item->id }}"/>
        @endforeach
    </ul>
</x-guest-layout>
