<x-app-layout>
    <div class="m-8">
        <h1>Add an item to your wishlist ({{ $wishlist->name }})</h1>
    </div>
    <div>
        <x-card>
            <form method="post" action="{{ route('items.create', $wishlist) }}">
                @csrf
                <x-flex class="mb-4 md:mb-8">
                    <x-input field="name" placeholder="Shiny new toy" class="w-full md:mr-8 mb-4 md:mb-0" />
                    <x-input field="price" placeholder="$49.99" />
                </x-flex>
                <x-flex class="mb-4 md:mb-8">
                    <x-input field="quantity" class="md:mr-8 mb-4 md:mb-0" value="1" />
                    <x-input field="notes" class="w-full" placeholder="add fries, no mayo" />
                </x-flex>
                <div class="mb-8">
                    <x-input field="url" label="Link" placeholder="https://store.com/products/4" />
                </div>
                <div class="flex flex-row-reverse md:flex-row">
                    <input type="submit" value="Add to Wishlist" class="rounded-md bg-indigo-600 px-3.5 py-2.5 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600" />
                </div>
            </form>
        </x-card>
    </div>
</x-app-layout>
