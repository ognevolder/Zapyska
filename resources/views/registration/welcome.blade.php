<h1>Hello</h1>
@php
    $url = match ($guard) {
      'admin' => '/admin/auth',
      default => '/auth'
    }
@endphp
<a href="{{ $url }}">eddede</a>