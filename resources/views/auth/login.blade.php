<x-layout>
  <main class="w-full h-full flex flex-col items-center justify-center">

      <x-form-header>Авторизація</x-form-header>

      <form id="loginForm" action="/auth" method="POST" class="flex flex-col gap-[0.8rem] items-center my-[1.6rem]">
        <!-- CSRF-token -->
        @csrf

        <!-- Login input-field -->
        <x-form-input id="username" form="loginForm" name="username" :value="old('username')">Логін</x-form-input>

        <!-- Password input-field -->
        <x-form-input id="password" form="loginForm" name="password" type="password">Пароль</x-form-input>

        <!-- Submit button -->
        <x-form-button>Вхід</x-form-button>
      </form>

      <footer>
        <x-form-link href="/registration">Не зареєстровані? → <span class="text-[#025939] font-medium">Реєстрація</span></x-form-link>
      </footer>

  </main>
</x-layout>