@props(['id' => ''])

<button id="{{ $id }}" {{$attributes->merge(['class' => 'hover:text-darkgreen focus:text-darkgreen'])}}>{{ $slot }}</button>