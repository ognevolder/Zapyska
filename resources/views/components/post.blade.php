@props(['post'])

<figure class="px-4 py-4 mx-8 bg-[#fff] border border-lightgreen flex flex-col gap-2 font-display overflow-hidden">
  <!-- Дата + тег -->
  <div class="flex gap-4 text-sm items-center">
    <a href="#"><span class="font-normal text-lightgreen">#{{ $post->tag }}</span></a>
    <span class="font-light text-grey">{{ $post->created_at->format('d.m.Y') }}</span>
  </div>


  <!-- Заголовок і тіло -->

  <div class="flex flex-col text-black overflow-hidden">
    <a href="/posts/{{ $post->id }}">
      <h2 class="text-2xl font-bold leading-auto break-words line-clamp-[2]">
        {{ $post->title}}
      </h2>
    </a>

    <p class="text-base font-normal leading-auto break-words line-clamp-[3]">
      {{ $post->body}}
    </p>
  </div>


  <!-- Автор -->
  <div class="flex gap-2 text-base">
    <a href="/authors/{{ $post->author->username}}"><span class="font-semibold text-darkgreen">{{ $post->author->name}}</span></a>
    <span class="font-light text-grey">{{ $post->author->authorship}}</span>
  </div>
</figure>
