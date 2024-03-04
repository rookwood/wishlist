<li class="my-4">
    <div class="my-2">
        <a href="{{ $item->url }}" class="flex justify-between">
            <span class="text-lg">{{ $item->name }}</span>
            <span class="text-gray-700">{{ $item->price }}</span>
        </a>
    </div>
    <div class="flex justify-between">
        <div>
            <span class="text-gray-600">{{ $item->notes }}</span>
        </div>
        @if($item->stillNeeds() > 1)
            <div>
                <span class="w-16 text-gray-600"><span class="text-gray-500">Wants</span> {{ $item->stillNeeds() }}</span>
            </div>
        @endif
    </div>
    <div class="flex justify-between">
        <span class="text-gray-400">Added {{ $item->created_at->toFormattedDateString() }}</span>
        <form action="{{ route('purchases.create', $item->id) }}" method="POST" >
            <div>@csrf</div>
            <input type="submit" value="Mark purchased" class="rounded bg-gray-600 px-2 py-1 text-sm font-semibold text-white shadow-sm hover:bg-gray-700 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600" />
        </form>
    </div>
</li>
