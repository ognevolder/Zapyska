@props(['post'])

<section class="flex gap-[1.6rem] justify-between border-[0.05rem] border-[#BFBA73] py-[1.6rem] px-[1.6rem] font-[Raleway] font-normal text-[#025239] text-[1.6rem]">
  <a href="/posts/{{ $post->id }}">
    <div class="w-full flex flex-col pr-[1.6rem]">
      <p class="font-bold">{{ $post->title }}</p>
      <p>{{ $post->created_at->format('d.m.Y') }}</p>
    </div>
  </a>

  <div class="flex gap-[1.6rem] border-l-[0.05rem] pl-[1.6rem] items-center">
    <a href="/posts/{{ $post->id }}/edit">Редагувати</a>
    <form action="/posts/{{ $post->id }}/destroy" method="POST">
      @csrf
      @method('DELETE')
      <button class="cursor-pointer text-[#f63b2e]">Видалити</button>
    </form>
  </div>
</section>