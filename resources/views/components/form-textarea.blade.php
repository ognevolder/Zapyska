@props(['form', 'id', 'name', 'value', 'rows' => '', 'cols' => ''])

<div {{ $attributes->merge(['class' => 'flex flex-col gap-[0.4rem]'])}}>
  <label for="{{ $id }}" form="{{ $form }}" class="text-[#BFBA73] text-[1.6rem] font-regular font-[Jura]">{{$slot}}</label>
  <textarea
    id="{{ $id }}"
    name="{{ $name }}"
    rows="{{ $rows }}"
    cols="{{ $cols }}"
    class="w-full p-[1.6rem] bg-[#fff] border border-[#BFBA73] text-[2rem] text-[#262626] font-[Raleway] font-regular leading-none"
  >
    {{ $value }}
  </textarea>
  @error($name)
    <p class="text-[1.2rem] text-[#f63b2e] font-[Jura] font-bold">{{ $message }}</p>
  @enderror
</div>