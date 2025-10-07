<x-mail::message>

<h2>
  Шановний(-а) {{ $post->author->name }}
</h2>

<p>
  Вітаємо, Ваш допис щойно було опубліковано на сервері Zapyska.
</p>

<x-mail::button :url="route('posts.show', $post->id)">
Ваша публікація
</x-mail::button>

</x-mail::message>

