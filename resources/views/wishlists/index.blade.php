<x-app-layout>
    <div class="mb-8">
        <h1 class="text-2xl px-12 pt-4">Wishlists</h1>
        @foreach($listsGroupedByUsers as $users => $wishlists)
            <x-card>
                <x-slot:header>
                    <h2>{{ $users }}</h2>
                </x-slot:header>
                <ul>
                    @foreach ($wishlists as $wishlist)
                        <li class="mb-4">
                            <a href="{{ route('wishlist.show', $wishlist->id) }}" class="underline block">
                                {{ $wishlist->name }}
                            </a>
                            <span class="text-gray-500">
                                Updated {{ $wishlist->lastUpdated()->toFormattedDateString() }}
                            </span>
                        </li>
                    @endforeach
                </ul>
            </x-card>
        @endforeach
    </div>
</x-app-layout>
