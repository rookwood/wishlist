<x-app-layout>
    <div class="mb-8">
        <div class="flex justify-between px-12 pt-4">
            <h1 class="text-2xl">Wishlists</h1>
            <a href="{{ route('wishlist.create') }}" class="rounded-md bg-indigo-600 px-3.5 py-2.5 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Add Wishlist</a>
        </div>

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
                                Updated {{ $wishlist->lastUpdated() }}
                            </span>
                        </li>
                    @endforeach
                </ul>
            </x-card>
        @endforeach
    </div>
</x-app-layout>
