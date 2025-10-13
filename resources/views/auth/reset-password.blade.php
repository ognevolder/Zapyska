<x-layout>
  <main class="w-full h-full grid place-items-center">
    <!-- Form -->
    <form id="PasswordResetForm" action="{{ route('password.store') }}" method="POST" class="w-full md:w-[80%] lg:w-[60%]">
      <!-- CSRF-token -->
      @csrf

      <!-- Password Reset Token -->
      <input type="hidden" name="token" value="{{ $request->route('token') }}">

      <!-- Header -->
      <x-form-header>Створення нового паролю</x-form-header>

      <!-- Body -->
      <div class="mx-8 flex flex-col gap-3">
        <!-- Email input-field -->
        <x-form-input id="email" name="email" type="email" :value="old('email')">Електронна пошта</x-form-input>

        <!-- Password input-field -->
        <x-form-input id="password" name="password" type="password">Пароль</x-form-input>
      </div>

      <!-- Buttons -->
      <div class="mx-8 my-4 flex flex-col gap-3">
        <!-- Submit button -->
        <x-form-button>Змінити</x-form-button>
      </div>
    </form>
  </main>
</x-layout>








  {{-- <form method="POST" action="{{ route('password.email') }}">
    <!-- CSRF -->
    @csrf
    <!-- Email Address -->
    <div>
      <x-form-input id="email" name="email" type="email" :value="old('email')">Електронна пошта</x-form-input>
    </div>

    <div class="flex items-center justify-end mt-4">
        <x-form-button>
            {{ __('Email Password Reset Link') }}
        </x-form-button>
    </div>

    </form> --}}










{{-- <x-layout>
    <form method="POST" action="{{ route('password.store') }}">
        @csrf

        <!-- Password Reset Token -->
        <input type="hidden" name="token" value="{{ $request->route('token') }}">

        <!-- Email Address -->
        <div>
          <x-form-input id="email" name="email" type="email" :value="old('email', $request->email)" required>Електронна пошта</x-form-input>
        </div>

        <!-- Password -->
        <div class="mt-4">
          <x-form-input id="password" name="password" type="password" required>Пароль</x-form-input>
        </div>

        <div class="flex items-center justify-end mt-4">
            <x-form-button>
                {{ __('Reset Password') }}
            </x-form-button>
        </div>
    </form>
</x-layout> --}}
