<x-layout>
  <main class="w-full h-full flex justify-center items-center">
    <section class="max-md:mx-8 w-full flex flex-col justify-center items-center gap-16">
      <x-form-header>Авторизація</x-form-header>

      <form id="loginForm" action="/auth" method="POST" class="w-[90%] md:w-[35%] 2xl:w-96 flex flex-col gap-4 items-center">
        <!-- CSRF-token -->
        @csrf

        <!-- Login input-field -->
        <x-form-input id="username" form="loginForm" name="username" :value="old('username')">Логін</x-form-input>

        <!-- Password input-field -->
        <x-form-input id="password" form="loginForm" name="password" type="password">Пароль</x-form-input>

        <!-- Submit button -->
        <x-form-button>Вхід</x-form-button>
      </form>

      <footer class="w-full text-center">
        <x-form-link href="/registration">Не зареєстровані? → <span class="text-darkgreen font-medium">Реєстрація</span></x-form-link>
      </footer>
    </section>
  </main>
</x-layout>