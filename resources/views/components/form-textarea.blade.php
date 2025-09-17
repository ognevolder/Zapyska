@props(['form', 'id', 'name', 'value', 'rows' => '', 'cols' => ''])

<div {{ $attributes->merge(['class' => 'flex flex-col gap-1'])}}>
  <label for="{{ $id }}" form="{{ $form }}" class="text-lightgreen">{{$slot}}</label>
  <textarea
    id="{{ $id }}"
    name="{{ $name }}"
    rows="{{ $rows }}"
    cols="{{ $cols }}"
    class="w-full px-4 py-4 bg-[#fff] border border-lightgreen text-black"
  >
    {{ $value }}
  </textarea>
  @error($name)
    <p class="text-sm text-error font-semibold">{{ $message }}</p>
  @enderror
</div>