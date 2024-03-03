<x-guest-layout>
    <h1>Wishlists</h1>
    <ul>
        @foreach ($wishlists as $wishlist)
            <li><a href="{{ route('wishlist.show', $wishlist->id) }}">{{ $wishlist->name }}</a></li>
        @endforeach
    </ul>
</x-guest-layout>
