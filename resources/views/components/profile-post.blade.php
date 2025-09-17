@props(['post'])

<section class="flex flex-col justify-between border-[0.5px] border-lightgreen py-2 px-4 font-display font-normal text-darkgreen text-base">
  <a href="/posts/{{ $post->id }}">
    <div class="w-full flex flex-col mb-2">
      <p class="font-thin text-sm py-1 ">{{ $post->created_at->format('d.m.Y') }}</p>
      <p class="font-bold text-2xl">{{ $post->title }}</p>
      <p class="leading-auto break-words line-clamp-[3]">{{ $post->body }}</p>
    </div>
  </a>

  <div class="flex gap-4 items-center font-bold">
    <a href="/posts/{{ $post->id }}/edit" class="text-lightgreen">Редагувати</a>
    <form action="/posts/{{ $post->id }}/destroy" method="POST">
      @csrf
      @method('DELETE')
      <button class="cursor-pointer text-error">Видалити</button>
    </form>
  </div>
</section>