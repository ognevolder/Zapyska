<footer class="w-full font-display font-light text-sm text-darkgreen">
  <nav class="mx-8 py-4 flex flex-col gap-4 border-y-[0.5px] border-lightgreen">
    <div>
      <h3 class="font-bold">Навігація</h3>
      <ul class="grid grid-cols-2">
        <li><a href="/">Головна</a></li>
        <li><a href="/posts">Публікації</a></li>
        <li><a href="/art">Творчість</a></li>
        <li><a href="/profile">Профіль</a></li>
      </ul>
    </div>
    <div>
      <h3 class="font-bold">Розробка</h3>
      <ul class="grid grid-cols-2">
        <li><a href="https://ognevolder.pro/">Portfolio</a></li>
        <li><a href="https://ognevolder.pro/">ognevolder.pro</a></li>
        <li><a href="https://ognevolder.pro/">ognevolder.pro</a></li>
        <li><a href="https://www.instagram.com/web.ognevolder">Instagram</a></li>
      </ul>
    </div>
  </nav>
  <div class="w-full">
    <nav class="mx-8 py-2 flex flex-col items-center">
      <a class="font-medium" href="https://ognevolder.pro/">.ognevolder</a>
      <p>{{ $slot }}</p>
    </nav>
  </div>
</footer>