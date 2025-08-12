<x-layout>
  <div class="flex flex-col gap-[1.2rem] items-center">
    <x-logo>Записька</x-logo>
    <x-h3>Реєстрація</x-h3>
    <form id="regForm" action="/registration" method="POST">
      <!-- CSRF-token -->
      @csrf

      <!-- Email input-field -->
      <x-form-label for="email" form="regForm">Електронна пошта</x-form-label>
      <x-form-input id="email" type="email" name="email" :value="old('email')"></x-form-input>
      <x-form-error name="email"></x-form-error>

      <!-- Name input-field -->
      <x-form-label for="name" form="regForm">Імʼя</x-form-label>
      <x-form-input id="name" name="name" :value="old('name')"></x-form-input>
      <x-form-error name="name"></x-form-error>

      <!-- Login input-field -->
      <x-form-label for="username" form="regForm">Логін</x-form-label>
      <x-form-input id="username" name="username" :value="old('username')"></x-form-input>
      <x-form-error name="username"></x-form-error>

      <!-- Password input-field -->
      <x-form-label for="password" form="regForm">Пароль</x-form-label>
      <x-form-input id="password" type="password" name="password"></x-form-input>
      <x-form-error name="password"></x-form-error>

      <!-- Submit button -->
      <x-form-button>Зберегти</x-form-button>
    </form>
    <x-form-link href="/auth">Вхід</x-form-link>
  </div>
</x-layout>