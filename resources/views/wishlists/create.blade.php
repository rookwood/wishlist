<x-app-layout>
    <div class="mb-8">
        <div class="flex justify-between px-12 pt-4">
            <h1 class="text-2xl">Add Wishlist</h1>
        </div>
        <x-card>
            <form action="{{ route('wishlist.create') }}" method="POST">
                @csrf
                <div>
                    <label for="name" class="block text-sm font-medium leading-6 text-gray-900">Name</label>
                    <div class="mt-2 flex rounded-md shadow-sm">
                        <div class="relative flex flex-grow items-stretch focus-within:z-10">
                            <input type="text" name="name" id="name"
                                   class="block w-full rounded-none rounded-l-md border-0 py-1.5 pl-2 text-gray-900 ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6"
                                   placeholder="Stuff I Want">
                        </div>
                        <input type="submit"
                               value="Add"
                               class="relative -ml-px inline-flex items-center gap-x-1.5 rounded-r-md px-3 py-2 text-sm font-semibold text-white bg-indigo-500 ring-1 ring-inset ring-gray-300 hover:bg-indigo-600"
                        />
                    </div>
                </div>
            </form>
        </x-card>
    </div>
</x-app-layout>
