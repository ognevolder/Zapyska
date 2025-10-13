@props(['status'])

@if ($status)
<div {{ $attributes->merge(['class' => 'font-medium text-sm text-darkgreen']) }}>
  <p class="mx-8 leading-none text-center">{{ $status }}</p>
</div>
@endif
