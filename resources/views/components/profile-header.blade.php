<header class="w-full flex justify-center">
  <section class="w-full mx-4 my-4 flex justify-between items-center 2xl:w-[1440px]">
    <div>
      @auth
        <h2 class="text-darkgreen text-xl font-medium font-display">Привіт, {{ auth()->user()->name }}!</h2>
      @endauth
      <p class="text-lightgreen text-sm font-light font-display">Вітаємо в кабінеті</p>
    </div>
    <div class="flex items-center gap-1 bg-darkgreen py-1 px-2">
      <svg class="w-6 h-6 text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="1" d="M10.779 17.779 4.36 19.918 6.5 13.5m4.279 4.279 8.364-8.643a3.027 3.027 0 0 0-2.14-5.165 3.03 3.03 0 0 0-2.14.886L6.5 13.5m4.279 4.279L6.499 13.5m2.14 2.14 6.213-6.504M12.75 7.04 17 11.28"/>
      </svg>
      <a href="/posts/create" class="text-sm text-white font-display font-semibold uppercase">Написати</a>
    </div>
    <a href="/password-update">Змінити пароль</a>
    <form action="/logout" method="POST">
      @csrf
      <button type="submit">Exit</button>
    </form>
  </section>
</header>


