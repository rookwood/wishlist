<x-guest-layout>
    <h1>{{ $wishlist->name }}</h1>
    <ul>
        @foreach($wishlist->items as $item)
            <li>
                <a href="{{ $item->url }}">
                    {{ $item->name }} | {{ $item->price }}
                </a>
            </li>
        @endforeach
    </ul>
</x-guest-layout>
