@props(['post'])
<figure class="px-[4.8rem] py-[3.2rem] bg-[#fff] border border-[#BFBA73] flex flex-col gap-[1.6rem] font-[Raleway] overflow-hidden">
  <!-- Дата + тег -->
  <div class="flex gap-[0.8rem] text-[1.6rem]">
    <a href="#"><span class="font-normal text-[#BFBA73]">#{{ $post->tag }}</span></a>
    <span class="font-light text-[#BFBFBF] font-[Jura]">{{ $post->created_at }}</span>
  </div>

  <!-- Заголовок і тіло -->
  <a href="/posts/{{ $post->id }}">
    <div class="flex flex-col gap-[0.8rem] text-[#262626] overflow-hidden">
      <h2 class="text-[3.6rem] font-bold leading-[4.2rem] break-words line-clamp-[2]">
        {{ $post->title}}
      </h2>
      <p class="text-[1.8rem] font-normal leading-[2.4rem] break-words line-clamp-[3]">
        {{ $post->body}}
      </p>
    </div>
  </a>

  <!-- Автор -->
  <div class="flex gap-[0.8rem] text-[1.8rem]">
    <a href="/authors/{{ $post->author->username}}"><span class="font-semibold text-[#025939]">{{ $post->author->name}}</span></a>
    <span class="font-light text-[#BFBFBF]">{{ $post->author->authorship}}</span>
  </div>
</figure>
