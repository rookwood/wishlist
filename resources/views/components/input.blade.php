<div {{ $attributes->merge(['class' => '']) }}>
    <label for="{{ $field }}" class="block text-sm font-medium leading-6 text-gray-900">{{ $label }}</label>
    <div class="mt-2">
        <input type="text" name="{{ $field }}" id="{{ $field }}" placeholder="{{ $placeholder }}" value="{{ $value }}" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6" />
    </div>
</div>
