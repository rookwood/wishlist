<x-app-layout>
    <div class="mb-8">
        <div class="flex justify-between px-12 pt-4">
            <h1 class="text-2xl">Add Wishlist</h1>
        </div>
        <x-card>
            <form action="{{ route('wishlist.create') }}" method="POST">
                @csrf
                <x-input field="name" class="mb-4" />
                <x-button value="Add Wishlist" />
            </form>
        </x-card>
    </div>
</x-app-layout>
