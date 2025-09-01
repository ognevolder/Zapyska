@props(['data'])
<div>
  {{ $data->onEachSide(2)->links() }}
</div>