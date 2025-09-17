<header class="w-full bg-[#FFF] flex border-b-lightgreen border-b-[0.5px] justify-center">

  <!-- MOBILE -->
  <nav class="w-full py-4 mx-8 flex items-center justify-between md:hidden">

    <a href="/" class="text-3xl text-darkgreen font-accent font-bold">Записька</a>

    <div class="flex gap-4 justify-center items-center">
      @guest
      <x-mobile-nav-link href="/auth" class="border border-darkgreen text-2xl">Вхід</x-mobile-nav-link>
      @endguest

      @auth
      <x-mobile-nav-link href="/profile" class="border border-darkgreen text-2xl">Профіль</x-mobile-nav-link>
      @endauth

      <button id="menu-btn" class="text-3xl">
        &#9776;
      </button>
    </div>

    <!-- Menu -->
    <div id="menu" class="overflow-hidden h-0 transition-all duration-500 ease-in-out flex flex-col justify-center items-center gap-2 bg-[#fff] absolute top-18 left-0 w-full font-display font-medium text-darkgreen text-3xl">
      <x-mobile-nav-link href="/">Головна</x-mobile-nav-link>
      <x-mobile-nav-link href="/posts">Публікації</x-mobile-nav-link>
      <x-mobile-nav-link href="/">Творчість</x-mobile-nav-link>
    </div>
  </nav>

  <script>
    const menu = document.getElementById('menu');

    let isOpen = false;

    document.getElementById('menu-btn').addEventListener('click', () => {
      if (!isOpen) {
        menu.classList.remove('h-0');
        menu.classList.add('h-screen'); // розкривається
      } else {
        menu.classList.remove('h-screen');
        menu.classList.add('h-0'); // закривається
      }
      isOpen = !isOpen;
    });
  </script>

  <!-- AFTER 768px -->
  <nav class="max-md:hidden w-full 2xl:w-[1440px] border-b-lightgreen flex justify-between items-center py-4 xl:py-5 mx-8">
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