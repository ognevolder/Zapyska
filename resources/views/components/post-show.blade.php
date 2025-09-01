@props(['data'])

<article class="w-[144rem]">
  <nav class="mb-[1.6rem]">
    <a class="bg-[#BFBA73] px-[1.2rem] py-[0.4rem] text-[#fff] text-[1.6rem]" href="/posts?tag={{ $data->tag }}">{{ $data->tag}}</a>
  </nav>
  <h1 class="text-[3.2rem] text-[#025239] font-[Raleway] font-bold">{{ $data->title }}</h1>
  <div class="flex gap-[1.6rem] text-[1.6rem] text-[#BFBA73] font-[Raleway] font-normal mb-[1.6rem]">
    <span>{{ $data->author->name}} | {{ $data->author->authorship}}</span>
    <span>{{ $data->created_at->format('d.m.Y')}}</span>
  </div>
  <p class="h-full text-[#025239] text-[2.4rem] font-[Raleway] font-normal">{{ $data->body}}</p>
</article>
