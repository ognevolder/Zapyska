<x-layout>
  <main class="w-full h-full grid place-items-center">
    <form id="regForm" action="/admin/registration" method="POST" class="w-full md:w-[80%] lg:w-[60%]">
      <!-- CSRF-token -->
      @csrf
      <!-- Header -->
      <x-form-header>Реєстрація admin</x-form-header>
      <!-- Body -->
      <div class="mx-8 flex flex-col gap-3">
        <!-- Name input-field -->
        <x-form-input id="name" form="regForm" name="name" :value="old('name')">Імʼя</x-form-input>

        <!-- Email input-field -->
        <x-form-input id="email" name="email" type="email" :value="old('email')">Електронна пошта</x-form-input>

        <!-- Password input-field -->
        <x-form-input id="password" name="password" type="password">Пароль</x-form-input>

        <!-- Key input-field -->
        <x-form-input id="key" name="key" type="text">Ключ доступу</x-form-input>
      </div>

      <!-- Buttons -->
      <div class="mx-8 my-4 flex flex-col gap-3">
        <!-- Submit button -->
        <x-form-button>Реєстрація</x-form-button>
      </div>

      <!-- Redirect -->
      <div class="mx-8 mt-12 text-center">
        <x-form-link href="/admin/auth">Вже маєте обліковий запис? → <span class="text-darkgreen font-medium hover:underline">Авторизація</span></x-form-link>
      </div>
    </form>
  </main>
</x-layout>
