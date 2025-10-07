@props(['form', 'id', 'type' => 'text', 'name', 'value' => ''])

<div {{ $attributes->merge(['class' => 'flex flex-col text-sm text-lightgreen font-normal font-display'])}}>
  <label for="{{ $id }}" form="{{ $form }}">{{$slot}}</label>
  <input
    id="{{ $id }}"
    type="{{ $type }}"
    name="{{ $name }}"
    value="{{ $value }}"
    class="p-1 border-b border-b-lightgreen text-base text-black font-semibold bg-transparent
          focus:ring-2 focus:ring-darkgreen transition"
  >
  @error($name)
    <p class="text-sm text-error font-semibold">{{ $message }}</p>
  @enderror
</div>