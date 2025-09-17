@props(['href' => ''])

<section class="w-full my-4 flex 2xl:justify-center">
  <article class="max-xl:mx-8 2xl:w-[144rem]">
    <a href="{{ $href }}" {{ $attributes->merge(['class' => 'text-xl text-lightgreen font-display font-light leading-none']) }}>{{ $slot }}</a>
  </article>
</section>