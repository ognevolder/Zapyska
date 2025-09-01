@props(['action', 'type' => 'submit', 'data', 'method' => 'GET'])

<form action="{{ $action }}" method="POST">
  @csrf
  @method("$method")

  <input type="hidden" name="post" :value="{{ $data }}">

  <button type="{{ $type }}">{{ $slot }}</button>
</form>