<header class="w-full 2xl:w-[1440px] flex flex-col md:flex-row gap-4 justify-between py-4 2xl:py-2 px-4 md:px-8 2xl:px-4 border-[0.5px] border-lightgreen bg-[#fff]">
  <section class="flex flex-col">
    @auth
      <h2 class="text-darkgreen text-2xl font-medium font-display">Привіт, {{ auth()->user()->name }}!</h2>
    @endauth
    <p class="text-lightgreen text-base font-light font-display">Вітаємо в кабінеті</p>
  </section>

  <section class="flex gap-4 justify-start items-center">

    @if(auth()->check() && auth()->user()->role === 'Admin')
      <a class="border py-2 px-4 text-base text-darkgreen font-display font-medium" href="{{ route('admin.dashboard') }}">Адміністрування</a>
    @endif

    <form action="/logout" method="POST" class="border py-2 px-4 text-base text-darkgreen font-display font-medium">
      @csrf
      <button>Вихід</button>
    </form>

  </section>
</header>