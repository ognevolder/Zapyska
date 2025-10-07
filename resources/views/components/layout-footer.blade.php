<footer class="w-full font-display font-light text-sm md:text-base text-darkgreen">
  <nav class="mx-8 my-4 py-4 border-y-[0.5px] border-lightgreen flex flex-col gap-2">
    <ul class="flex flex-col items-center">
      <h3 class="font-bold">Розробка:</h3>
      <p class="font-normal">PHP 8, Laravel, MySQL, Vue</p>
    </ul>
    <ul class="flex flex-col items-center">
      <h3 class="font-bold">Контакти:</h3>
      <ul class="flex gap-2">
        <a href="https://ognevolder.pro/">Portfolio</a>
        <a href="https://github.com/ognevolder">GitHub</a>
        <a href="https://www.linkedin.com/in/yurii-timoshenkov-8231ab37b/">LinkedIn</a>
        <a href="https://www.instagram.com/web.ognevolder">Instagram</a>
      <ul>
    </ul>
  </nav>
  <div class="w-full">
    <nav class="mx-8 py-2 flex flex-col items-center">
      <a class="font-medium" href="https://ognevolder.pro/">.ognevolder</a>
      <p>{{ $slot }}</p>
    </nav>
  </div>
</footer>