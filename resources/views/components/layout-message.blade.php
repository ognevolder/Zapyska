<section class="w-full flex 2xl:justify-center">
  <article class="max-xl:mx-16 2xl:w-[144rem]">
    @if(session('success'))
      <x-flash-message type="success" :message="session('success')" />
    @endif

    @if(session('error'))
      <x-flash-message type="error" :message="session('error')" />
    @endif
  </article>
</section>

