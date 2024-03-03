<x-guest-layout>
    <div class="flex justify-between">
        <h1 class="text-xl mb-4">{{ $wishlist->name }}</h1>
        <h3 class="text-md text-gray-500 mb-12">By {{ $wishlist->owners }}</h3>
    </div>
    <ul class="divide-gray-300 divide-y">
        @foreach($wishlist->items as $item)
            <li class="my-4">
                <div class="my-2">
                    <a href="{{ $item->url }}" class="flex justify-between">
                        <span class="text-lg">{{ $item->name }}</span>
                        <span class="text-gray-600">{{ $item->price }}</span>
                    </a>
                </div>
                <div class="flex justify-between">
                    <div>
                        <span class="text-gray-600">{{ $item->notes }}</span>
                    </div>
                    <div class="flex flex-col">
                        <span class="w-16">Wants {{ $item->quantity }}</span>
                        <span>Has ???</span>
                    </div>
                </div>
                <div>
                    <span class="text-gray-400">Added on {{ $item->created_at->toFormattedDateString() }}</span>
                </div>
            </li>
        @endforeach
    </ul>
</x-guest-layout>
