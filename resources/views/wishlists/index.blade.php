<x-guest-layout>
    <h1>Wishlists</h1>
    <ul>
        @foreach ($wishlists as $wishlist)
            <li>{{ $wishlist->name }}</li>
        @endforeach
    </ul>
</x-guest-layout>
