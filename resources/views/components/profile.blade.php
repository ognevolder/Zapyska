@props(['data'])

<article class="w-[144rem] flex gap-[1.6rem] py-[1.6rem] px-[1.6rem] border-[0.05rem] border-[#BFBA73] bg-[#fff]">
  <section class="w-[70%]">
    <h2 class="w-full py-[0.8rem] text-[1.6rem] text-[#025239] font-[Raleway] font-semibold uppercase">Останні публікації:</h2>

    <div class="flex flex-col gap-[1.6rem]">
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

  <section class="w-[30%] flex flex-col gap-[1.6rem] justify-start items-center border-l-[0.05rem] border-[#BFBA73]">
    <a href="/posts/create" class="text-[2.4rem] bg-[#BFBA73] text-[#fff] px-[1.6rem] py-[0.8rem] font-[Raleway] font-semibold uppercase">Створити публікацію</a>
  </section>
</article>