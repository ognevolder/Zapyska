@props(['href' => ''])

<a href="{{ $href }}" {{ $attributes->merge(['class' => "text-xl text-lightgreen font-display"])}}>{{ $slot }}</a>