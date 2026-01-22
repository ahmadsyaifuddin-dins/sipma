@props(['name', 'label', 'value' => '', 'type' => 'text', 'required' => false, 'placeholder' => ''])

<div class="mb-3">
    <x-form.label :for="$name" :value="$label" :required="$required" />

    <input type="{{ $type }}" name="{{ $name }}" id="{{ $name }}" value="{{ old($name, $value) }}"
        placeholder="{{ $placeholder }}" {{ $required ? 'required' : '' }}
        {{ $attributes->merge(['class' => 'form-control w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm']) }}>

    @error($name)
        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
    @enderror
</div>
