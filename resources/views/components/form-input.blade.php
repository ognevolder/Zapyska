@props(['id', 'type' => 'text', 'name', 'value' => ''])

<div class="relative w-full">
  <input
  id="{{ $id }}"
  type="{{ $type }}"
  name="{{ $name }}"
  class="w-full peer border-b-1 border-lightgreen bg-transparent px-1 pt-8 pb-1 text-black text-base lg:text-xl font-semibold focus:border-darkgreen focus:outline-none focus:bg-transparent"
  placeholder=" "
  value="{{ $value }}"
  />
  <label for="{{ $name }}"
         class="absolute left-0 top-2 text-lightgreen text-base
                transition-all peer-placeholder-shown:top-8 peer-placeholder-shown:text-base
                peer-placeholder-shown:text-lightgreen peer-focus:top-2 peer-focus:text-base peer-focus:text-darkgreen peer-focus:bg-transparent">
    {{ $slot }}
  </label>
  @error($name)
    <p class="text-sm text-error font-semibold">{{ $message }}</p>
  @enderror
</div>
