@props(['data'])

<article class="w-full 2xl:w-[1440px] flex flex-col md:flex-row gap-4 justify-between py-4 px-4 md:px-8 2xl:px-4 border-[0.5px] border-lightgreen bg-[#fff]">

  <section class="w-full border-b-[0.5px] border-b-lightgreen lg:border-r-[0.5px] lg:border-r-lightgreen">
    <ul class="flex flex-col gap-4 items-start mb-4">
      <li class="text-base bg-lightgreen text-[#fff] px-2 py-1 font-display font-semibold uppercase">
        <a href="/posts/create">＋ Нова публікація</a>
      </li>
    </ul>
  </section>

  <section id="profile" class="w-full">
    <h2 class="w-full py-2 text-base text-darkgreen font-display font-semibold uppercase">Останні публікації:</h2>

    <div class="flex flex-col gap-4">
      @if(session('success'))
        <x-flash-message type="success" :message="session('success')" />
      @endif

      @if(session('error'))
        <x-flash-message type="error" :message="session('error')" />
      @endif

      @foreach ($data as $post)
        <x-profile-post :post="$post"></x-profile-post>
      @endforeach
    </div>
  </section>
</article>