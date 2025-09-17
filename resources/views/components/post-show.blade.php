@props(['data'])

<article class="w-full">
  <div class="mx-8 my-8 p-4 bg-[#fff] border-[0.5px] border-lightgreen">
    <nav>
      <a class="bg-lightgreen px-2 py-1 text-white text-base" href="/posts?tag={{ $data->tag }}">{{ $data->tag}}</a>
    </nav>
    <div class="flex gap-4 py-2 text-xl text-grey font-display font-normal">
      <span>{{ $data->author->name}} | {{ $data->author->authorship}}</span>
      <span>{{ $data->created_at->format('d.m.Y')}}</span>
    </div>
    <h1 class="text-4xl mt-4 text-darkgreen font-display font-bold">{{ $data->title }}</h1>
    <p class="text-darkgreen text-xl font-display font-normal">{{ $data->body}}</p>
  </div>
</article>
