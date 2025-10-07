<x-layout>
  <main class="w-full h-full grid place-items-center">
    <form id="loginForm" action="/auth" method="POST" class="w-full">
      <!-- CSRF-token -->
      @csrf
      <ul class="w-full flex flex-col gap-16">
        <x-form-header>Авторизація</x-form-header>
        <ul class="mx-8 flex flex-col gap-8 font-display">
          <!-- Email input-field -->
          <x-form-input id="email" form="loginForm" name="email" :value="old('email')">Електронна пошта</x-form-input>

          <!-- Password input-field -->
          <x-form-input id="password" form="loginForm" name="password" type="password">Пароль</x-form-input>

          <!-- Errors -->
          @error('login')
            <p class="text-sm text-error font-semibold">{{ $message }}</p>
          @enderror

          @error('block')
            <p class="text-sm text-error font-semibold">{{ $message }}</p>
          @enderror

          <ul class="flex flex-col gap-3">
            <!-- Submit button -->
            <x-form-button>Вхід</x-form-button>

            <!-- Password reset -->
            <a href="#" class="text-center font-medium text-lightgreen">Відновити пароль</a>
          </ul>
          <x-form-link href="/registration" class="text-center">Не зареєстровані? → <span class="text-darkgreen font-medium">Реєстрація</span></x-form-link>
        </ul>
      </ul>
    </form>
  </main>
</x-layout>