<footer class="w-full font-[Raleway] font-light text-[1.6rem] text-[#025939]">
  <nav class="w-[144rem] justify-self-center py-[3.2rem] grid grid-cols-3 gap-[1.6rem] border-y-[0.05rem] border-[#BFBA73]">
    <div>
      <h3 class="font-bold">Інформація</h3>
      <p>Особистий простір для думок, спостережень та творчості. Персональний проєкт. PHP (Laravel).</p>
    </div>
    <div>
      <h3 class="font-bold">Навігація</h3>
      <ul class="flex gap-[1.6rem]">
        <li><a href="/">Головна</a></li>
        <li><a href="/posts">Публікації</a></li>
        <li><a href="/art">Творчість</a></li>
        <li><a href="/profile">Профіль</a></li>
      </ul>
    </div>
    <div>
      <h3 class="font-bold">Розробка</h3>
      <ul class="flex gap-[1.6rem]">
        <li><a href="https://ognevolder.pro/">Portfolio</a></li>
        <li><a href="https://ognevolder.pro/">ognevolder.pro</a></li>
        <li><a href="https://ognevolder.pro/">ognevolder.pro</a></li>
        <li><a href="https://www.instagram.com/web.ognevolder">Instagram</a></li>
      </ul>
    </div>
  </nav>
  <div class="w-[144rem] flex flex-col items-center justify-self-center my-[1.6rem]">
    <a class="font-medium" href="https://ognevolder.pro/">.ognevolder</a>
    <p>{{ $slot }}</p>
  </div>
</footer>