@props(['name', 'label', 'options' => [], 'value' => '', 'required' => false])

<div class="mb-3">
    <x-form.label :for="$name" :value="$label" :required="$required" />

    <select name="{{ $name }}" id="{{ $name }}"
        class="w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm"
        {{ $required ? 'required' : '' }}>
        <option value="">-- Pilih Salah Satu --</option>
        @foreach ($options as $id => $label)
            <option value="{{ $id }}" {{ (string) $id === (string) $value ? 'selected' : '' }}>
                {{ $label }}
            </option>
        @endforeach
    </select>

    @error($name)
        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
    @enderror
</div>
