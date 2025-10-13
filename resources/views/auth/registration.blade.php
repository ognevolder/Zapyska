<x-layout>
  <main class="w-full h-full grid place-items-center">
    <form id="regForm" action="/registration" method="POST" class="w-full md:w-[80%] lg:w-[60%]">
      <!-- CSRF-token -->
      @csrf
      <!-- Header -->
      <x-form-header>Реєстрація</x-form-header>
      <!-- Body -->
      <div class="mx-8 flex flex-col gap-3">
        <!-- Email input-field -->
        <x-form-input id="email" name="email" type="email" :value="old('email')">Електронна пошта</x-form-input>

        <!-- Name input-field -->
        <x-form-input id="name" form="regForm" name="name" :value="old('name')">Імʼя</x-form-input>

        <!-- Login input-field -->
        <x-form-input id="username" form="regForm" name="username" :value="old('username')">Логін</x-form-input>

        <!-- Password input-field -->
        <x-form-input id="password" name="password" type="password">Пароль</x-form-input>
      </div>

      <!-- Buttons -->
      <div class="mx-8 my-4 flex flex-col gap-3">
        <!-- Submit button -->
        <x-form-button>Реєстрація</x-form-button>
      </div>

      <!-- Redirect -->
      <div class="mx-8 mt-12 text-center">
        <x-form-link href="/auth">Вже маєте обліковий запис? → <span class="text-darkgreen font-medium hover:underline">Авторизація</span></x-form-link>
      </div>
    </form>
  </main>
</x-layout>



  {{-- <main class="w-full h-full flex justify-center items-center">
    <section class="max-md:mx-8 w-full flex flex-col justify-center items-center gap-16">
    <x-form-header>Реєстрація</x-form-header>

    <form id="regForm" action="/registration" method="POST" class="w-[90%] md:w-[35%] 2xl:w-96 flex flex-col gap-4 items-center">
      <!-- CSRF-token -->
      @csrf

      <!-- Email input-field -->
      <x-form-input id="email" form="regForm" name="email" type="email" :value="old('email')">Електронна пошта</x-form-input>

      <!-- Name input-field -->
      <x-form-input id="name" form="regForm" name="name" :value="old('name')">Імʼя</x-form-input>

      <!-- Login input-field -->
      <x-form-input id="username" form="regForm" name="username" :value="old('username')">Логін</x-form-input>

      <!-- Password input-field -->
      <x-form-input id="password" form="regForm" name="password" type="password">Пароль</x-form-input>

      <!-- Submit button -->
      <x-form-button>Зберегти</x-form-button>
    </form>

    <footer class="w-full text-center">
      <x-form-link href="/auth">Вже маєте обліковий запис? → <span class="text-darkgreen font-medium">Авторизація</span></x-form-link>
    </footer>
    </section>
  </main> --}}
