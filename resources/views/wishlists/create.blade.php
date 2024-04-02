<x-app-layout>
    <div class="mb-8">
        <div class="flex justify-between px-12 pt-4">
            <h1 class="text-2xl">Add Wishlist</h1>
        </div>
        <x-card>
            <form action="{{ route('wishlist.create') }}" method="POST" class="flex flex-col">
                @csrf
                <x-input field="name" class="mb-4" />
                <x-checkbox name="private" label="Hide from other users?" value="1" />
                <x-button value="Add Wishlist" class="mt-4" />
            </form>
        </x-card>
    </div>
</x-app-layout>
