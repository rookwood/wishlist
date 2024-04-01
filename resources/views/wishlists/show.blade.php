<x-app-layout>
    <x-card>
        <x-slot:header>
            <div class="flex justify-between">
                <h1 class="text-xl mb-4">{{ $wishlist->name }}</h1>
                <h3 class="text-md text-gray-500 mb-4">By {{ $wishlist->owners }}</h3>
            </div>
        </x-slot:header>
        <ul class="divide-gray-300 divide-y">
            @foreach($wishlist->items as $item)
                @if($item->stillNeeds() > 0 || Auth::user()->wishlists->contains($wishlist))
                    <x-wishlist-item :item="$item" :wishlist="$wishlist" key="{{ $item->id }}"/>
                @endif
            @endforeach
        </ul>
    </x-card>
</x-app-layout>
