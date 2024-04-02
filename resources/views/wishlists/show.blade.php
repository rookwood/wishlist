<x-app-layout>
    <x-card>
        <x-slot:header>
            <div class="flex justify-between">
                <h1 class="text-xl mb-4">{{ $wishlist->name }}</h1>
                @if(\Illuminate\Support\Facades\Auth::user()->wishlists->contains($wishlist))
                    <a href="{{ route('items.create', $wishlist) }}" class="rounded-md bg-indigo-600 px-3.5 py-2.5 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Add Item to List</a>
                @else
                    <h3 class="text-md text-gray-500 mb-4">By {{ $wishlist->owners }}</h3>
                @endif
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
