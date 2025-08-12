<x-layout>
  <div class="flex flex-col gap-[1.2rem] items-center">
    <x-logo>Записька</x-logo>
    <x-h3>Авторизація</x-h3>
    <form id="loginForm" action="/auth" method="POST">
      <!-- CSRF-token -->
      @csrf

      <!-- Login input-field -->
      <x-form-label for="username" form="loginForm">Логін</x-form-label>
      <x-form-input id="username" name="username" :value="old('username')"></x-form-input>
      <x-form-error name="username"></x-form-error>

      <!-- Password input-field -->
      <x-form-label for="password" form="loginForm">Пароль</x-form-label>
      <x-form-input id="password" type="password" name="password"></x-form-input>
      <x-form-error name="password"></x-form-error>

      <!-- Submit button -->
      <x-form-button>Вхід</x-form-button>
    </form>
    <x-form-link href="/registration">Реєстрація</x-form-link>
  </div>
</x-layout>