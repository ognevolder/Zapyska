@props(['form', 'id', 'type' => 'text', 'name', 'value' => ''])

<div {{ $attributes->merge(['class' => 'flex flex-col gap-1'])}}>
  <label for="{{ $id }}" form="{{ $form }}" class="text-lightgreen">{{$slot}}</label>
  <input
    id="{{ $id }}"
    type="{{ $type }}"
    name="{{ $name }}"
    value="{{ $value }}"
    class="p-2 bg-[#fff] border border-lightgreen text-black"
  >
  @error($name)
    <p class="text-sm text-error font-semibold">{{ $message }}</p>
  @enderror
</div>