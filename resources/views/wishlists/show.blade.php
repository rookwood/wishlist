<x-guest-layout>
    <h1 class="text-xl mb-12">{{ $wishlist->name }}</h1>
    <ul>
        @foreach($wishlist->items as $item)
            <li class="mb-8">
                <div>
                    <a href="{{ $item->url }}" class="flex justify-between">
                        <span>{{ $item->name }}</span>
                        <span>{{ $item->price }}</span>
                    </a>
                </div>
                <div class="flex justify-between">
                    <div>
                        <span>{{ $item->notes }}</span>
                    </div>
                    <div>
                        <span>Wants {{ $item->quantity }}</span>
                        <span>Has ???</span>
                    </div>
                </div>
                <div>
                    <span>{{ $item->created_at }}</span>
                </div>
            </li>
        @endforeach
    </ul>
</x-guest-layout>
