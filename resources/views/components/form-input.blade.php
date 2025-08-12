@props(['id' => '', 'type' => 'text', 'name' => '', 'value' => ''])
<input id="{{ $id }}" type="{{ $type }}" name="{{ $name }}" value="{{ $value }}" {{ $attributes->merge(['class' => '']) }}>