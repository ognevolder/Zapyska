<x-layout>
  <main class="w-full h-full grid place-items-center">
    <form action="{{ route('admin.password.update')}}" method="POST" class="w-full md:w-[80%] lg:w-[60%]">
      <!-- CSRF-token -->
      @csrf
      <!-- Method -->
      @method('PUT')

      <!-- Header -->
      <x-form-header>Зміна паролю (admnin)</x-form-header>
      <!-- Body -->
      <div class="mx-8 flex flex-col gap-3">
        <!-- Current password input-field -->
        <x-form-input id="curent-password" name="current_password" type="password">Старий пароль</x-form-input>

        <!-- New Password input-field -->
        <x-form-input id="password" name="password" type="password">Новий пароль</x-form-input>
      </div>

      <!-- Buttons -->
      <div class="mx-8 my-4 flex flex-col gap-3">
        <!-- Submit button -->
        <x-form-button type="submit">Зберегти</x-form-button>
      </div>

      <!-- Redirect -->
      <div class="mx-8 mt-12 text-center">
        <x-form-link href="/">← Назад</x-form-link>
      </div>
    </form>
  </main>
</x-layout>
