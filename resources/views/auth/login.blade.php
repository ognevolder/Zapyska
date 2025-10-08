<x-layout>
  <main class="w-full h-full grid place-items-center">
    <form id="loginForm" action="/auth" method="POST" class="w-full md:w-[80%] lg:w-[60%]">
      <!-- CSRF-token -->
      @csrf
      <!-- Header -->
      <x-form-header>Авторизація</x-form-header>
      <!-- Body -->
      <div class="mx-8 flex flex-col gap-3">
        <!-- Email input-field -->
        <x-form-input id="email" name="email" :value="old('email')">Електронна пошта</x-form-input>

        <!-- Password input-field -->
        <x-form-input id="password" name="password" type="password">Пароль</x-form-input>
      </div>
      <!-- Errors -->
      <div class="mx-8 my-4">
        @error('login')
          <p class="text-sm text-error font-semibold">{!! $message !!}</p>
        @enderror

        @error('block')
          <p class="text-sm text-error font-semibold">{!! $message !!}</p>
        @enderror
      </div>
      <!-- Buttons -->
      <div class="mx-8 my-4 flex flex-col gap-3">
        <!-- Submit button -->
        <x-form-button>Вхід</x-form-button>

        <!-- Password reset -->
        <a href="#" class="text-center font-medium text-lightgreen">Відновити пароль</a>
      </div>
      <!-- Redirect -->
      <div class="mx-8 my-12 text-center">
        <x-form-link href="/registration">Не зареєстровані? → <span class="text-darkgreen font-medium">Реєстрація</span></x-form-link>
      </div>
    </form>
  </main>
</x-layout>