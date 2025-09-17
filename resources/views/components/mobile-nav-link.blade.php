@props(['href'])

<a href="{{ $href }}" {{$attributes->merge(['class' => "px-2 py-1"])}}>{{ $slot }}</a>