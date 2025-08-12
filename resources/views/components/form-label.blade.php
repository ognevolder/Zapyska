@props(['for' => '', 'form' => ''])
<label for="{{ $for }}" form="{{ $form }}" {{ $attributes->merge(['class' => '']) }}>{{$slot}}</label>
