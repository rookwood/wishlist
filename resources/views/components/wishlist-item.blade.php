<li class="my-4">
    <div class="flex">
        <img src="https://placehold.co/100x100.png" alt="placeholder" class="mr-4" />
        <div class="grow py-2">
            <div>
                <a href="{{ $item->url }}" class="flex justify-between">
                    <span class="text-lg">{{ $item->name }}</span>
                    <span class="text-gray-700">{{ $item->price }}</span>
                </a>
            </div>
            <div class="flex justify-between">
                <div>
                    <span class="text-gray-600 text-md">{{ $item->notes }}</span>
                </div>
                @can('see_purchases_for', $wishlist)
                    @if($item->stillNeeds() > 1)
                        <div>
                            <span class="w-16 text-gray-600"><span class="text-gray-500">Wants</span> {{ $item->stillNeeds() }}</span>
                        </div>
                    @endif
                @else
                    <div>
                        <span class="w-16 text-gray-600"><span class="text-gray-500">Requested</span> {{ $item->quantity }}</span>
                    </div>
                @endcan
            </div>
            <div class="flex justify-between">
                <span class="text-gray-400 text-sm pt-1">Added {{ $item->created_at->toFormattedDateString() }}</span>

                @if(! Auth::user()->wishlists->contains($wishlist))
                    <form action="{{ route('purchases.create', $item->id) }}" method="POST" >
                        <div>@csrf</div>
                        <input type="submit" value="Mark purchased" class="rounded bg-gray-600 px-2 py-1 text-sm font-semibold text-white shadow-sm hover:bg-gray-700 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600" />
                    </form>
                @else
                    <form action="{{ route('items.delete', $item) }}" method="POST">
                        <div>@csrf</div>
                        <input type="submit" value="Delete" class="rounded bg-gray-600 px-2 py-1 text-sm font-semibold text-white shadow-sm hover:bg-gray-700 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600" />
                    </form>
                @endif
            </div>
        </div>
    </div>
</li>
