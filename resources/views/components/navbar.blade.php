<header class="w-screen bg-[#FFF] border-b-[0.05rem] border-[#BFBA73] flex justify-center">
  <nav class="w-[144rem] py-[1.6rem] flex justify-between items-center">
    <div>
      <a href="/"><h2 class="text-[3.2rem] text-[#025939] font-[Jura] font-bold">Записька</h2></a>
    </div>
    <div class="flex gap-[1.6rem] items-center">
      <x-navbar-link href="/">Головна</x-navbar-link>
      <x-navbar-link href="/posts">Публікації</x-navbar-link>
      <x-navbar-link href="/workshop">Творчість</x-navbar-link>

      @guest
      <x-navbar-profile href="/auth">Вхід</x-navbar-profile>
      @endguest

      @auth
      <x-navbar-profile href="/profile">Профіль</x-navbar-profile>
      @endauth

    </div>
  </nav>
</header>