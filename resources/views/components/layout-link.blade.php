@props(['href' => ''])
<div class="w-screen flex justify-center">
  <a href="{{ $href }}" class="w-[144rem] py-[1.6rem] flex justify-start items-center text-[1.6rem] text-[#BFBA73] font-[Raleway] font-light leading-none" {{ $attributes->merge(['class' => '']) }}>{{ $slot }}</a>
</div>