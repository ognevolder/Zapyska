<header class="w-[144rem] flex justify-between py-[1.6rem] px-[1.6rem] border-[0.05rem] border-[#BFBA73] bg-[#fff]">
  <section>
    @auth
      <h2 class="text-[#025939] text-[2.4rem] font-medium font-[Raleway]">Привіт, {{ auth()->user()->name }}!</h2>
    @endauth
    <p class="text-[#BFBA73] text-[1.6rem] font-light font-[Raleway]">Персональне середовище</p>
  </section>

  <section class="flex gap-[1.6rem] justify-center items-center">

    @if(auth()->check() && auth()->user()->role === 'Admin')
      <a class="border py-[0.8rem] px-[1.6rem] text-[1.6rem] text-[#025939] font-[Jura] font-medium" href="{{ route('admin.dashboard') }}">Адміністрування</a>
    @endif

    <form action="/logout" method="POST" class="border py-[0.8rem] px-[1.6rem] text-[1.6rem] text-[#025939] font-[Jura] font-medium">
      @csrf
      <button>Вихід</button>
    </form>

  </section>
</header>