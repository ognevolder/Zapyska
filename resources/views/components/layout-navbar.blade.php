<header x-data="{ menuOpen: false, profileOpen: false }" class="w-full bg-[#FFF] border-b-lightgreen border-b-[0.5px]">

  <!-- MOBILE -->
  <nav class="py-4 mx-4 md:px-6 flex items-center justify-between lg:hidden">

    <a href="/" class="text-3xl text-darkgreen font-accent font-bold">Записька</a>

    <div class="flex gap-2">
      @guest
      <a href="/auth">
        <svg class="w-6 h-6 text-darkgreen" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
          <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 12H4m12 0-4 4m4-4-4-4m3-4h2a3 3 0 0 1 3 3v10a3 3 0 0 1-3 3h-2"/>
        </svg>
      </a>
      @endguest

      @auth
      <button @click="profileOpen = true">
        <svg class="w-6 h-6 text-darkgreen" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
          <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 21a9 9 0 1 0 0-18 9 9 0 0 0 0 18Zm0 0a8.949 8.949 0 0 0 4.951-1.488A3.987 3.987 0 0 0 13 16h-2a3.987 3.987 0 0 0-3.951 3.512A8.948 8.948 0 0 0 12 21Zm3-11a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z"/>
        </svg>
      </button>
      @endauth

      <button class="text-3xl" @click="menuOpen = true">
        <svg class="w-6 h-6 text-darkgreen" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
          <path stroke="currentColor" stroke-linecap="round" stroke-width="2" d="M5 7h14M5 12h14M5 17h14"/>
        </svg>
      </button>
    </div>
  </nav>

  <!-- Menu -->
  <div x-show="menuOpen"
    @click.away="menuOpen = false"
    x-transition:enter="transition-all duration-500 ease-in-out"
    x-transition:enter-start="max-h-0 opacity-0"
    x-transition:enter-end="max-h-screen opacity-100"
    x-transition:leave="transition-all duration-500 ease-in-out"
    x-transition:leave-start="max-h-screen opacity-100"
    x-transition:leave-end="max-h-0 opacity-0"
    class="bg-[#fff] overflow-hidden flex flex-col gap-8 justify-center items-center font-display font-normal text-lightgreen text-2xl">
    <nav class="h-full flex flex-col gap-2 my-8 justify-center items-center">
      <x-mobile-nav-link href="/">Головна</x-mobile-nav-link>
      <x-mobile-nav-link href="/posts">Публікації</x-mobile-nav-link>
      <x-mobile-nav-link href="/">Творчість</x-mobile-nav-link>
    </nav>
  </div>

  <!-- Profile -->
  <div x-show="profileOpen"
    @click.away="profileOpen = false"
    x-transition:enter="transition-all duration-500 ease-in-out"
    x-transition:enter-start="max-h-0 opacity-0"
    x-transition:enter-end="max-h-screen opacity-100"
    x-transition:leave="transition-all duration-500 ease-in-out"
    x-transition:leave-start="max-h-screen opacity-100"
    x-transition:leave-end="max-h-0 opacity-0"
    class="bg-[#fff] overflow-hidden flex flex-col gap-8 justify-center items-center font-display font-normal text-lightgreen text-2xl">
    <nav class="h-full flex flex-col gap-2 my-4 justify-center items-center">
      <!-- Profile -->
      <div class="flex gap-1 items-center border py-1 px-2 text-sm text-darkgreen font-display font-medium">
        <svg class="w-6 h-6 text-darkgreen" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
          <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M15 9h3m-3 3h3m-3 3h3m-6 1c-.306-.613-.933-1-1.618-1H7.618c-.685 0-1.312.387-1.618 1M4 5h16a1 1 0 0 1 1 1v12a1 1 0 0 1-1 1H4a1 1 0 0 1-1-1V6a1 1 0 0 1 1-1Zm7 5a2 2 0 1 1-4 0 2 2 0 0 1 4 0Z"/>
        </svg>
        <a href="{{ route('profile') }}">
          Профіль
        </a>
      </div>
      <!-- Admin -->
      @if(auth()->check() && auth()->user()->role === 'Admin')
      <div class="flex gap-1 items-center border py-1 px-2 text-sm text-darkgreen font-display font-medium">
        <svg class="w-4 h-4 text-darkgreen" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
          <path stroke="currentColor" stroke-linecap="round" stroke-width="2" d="M20 6H10m0 0a2 2 0 1 0-4 0m4 0a2 2 0 1 1-4 0m0 0H4m16 6h-2m0 0a2 2 0 1 0-4 0m4 0a2 2 0 1 1-4 0m0 0H4m16 6H10m0 0a2 2 0 1 0-4 0m4 0a2 2 0 1 1-4 0m0 0H4"/>
        </svg>
        <a href="{{ route('admin.dashboard') }}">
          Адмін-панель
        </a>
      </div>
      @endif
      <!-- Log Out -->
      <form action="/logout" method="POST" class="flex items-center gap-1 border py-1 px-2 text-sm text-darkgreen font-display font-medium">
        @csrf
        <svg class="w-4 h-4 text-darkgreen" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
          <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 12H8m12 0-4 4m4-4-4-4M9 4H7a3 3 0 0 0-3 3v10a3 3 0 0 0 3 3h2"/>
        </svg>
        <button>Вихід</button>
      </form>
    </nav>
  </div>

  <!-- AFTER 768px -->
  <nav class="max-lg:hidden py-4 xl:py-5 px-6 2xl:w-[1440px] border-b-lightgreen flex justify-between items-center">
    <div>
      <a href="/" class="text-3xl xl:text-4xl text-darkgreen font-accent font-bold">Записька</a>
    </div>

    <div class="flex gap-4 items-center text-2xl xl:text-3xl">
      <x-nav-link href="/">Головна</x-nav-link>
      <x-nav-link href="/posts">Публікації</x-nav-link>
      <x-nav-link href="/workshop">Творчість</x-nav-link>

      @guest
      <x-nav-link href="/auth" class="text-white py-2 px-4 bg-darkgreen">Вхід</x-nav-link>
      @endguest

      @auth
      <x-nav-link href="/profile" class="text-white py-2 px-4 bg-darkgreen">Профіль</x-nav-link>
      @endauth

    </div>
  </nav>
</header>