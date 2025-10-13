<x-layout>
  <main class="w-full h-full grid place-items-center">
    <!-- Form -->
    <form id="PasswordLinkForm" action="{{ route('password.email') }}" method="POST" class="w-full md:w-[80%] lg:w-[60%]">
      <!-- CSRF-token -->
      @csrf
      <!-- Header -->
      <x-form-header>Вкажіть Вашу електронну пошту, щоб отримати посилання для відновлення паролю.</x-form-header>

      <!-- Body -->
      <div class="mx-8 flex flex-col gap-3">
        <!-- Email input-field -->
        <x-form-input id="email" name="email" type="email" :value="old('email')">Електронна пошта</x-form-input>
      </div>

      <!-- Buttons -->
      <div class="mx-8 my-4 flex flex-col gap-3">
        <!-- Submit button -->
        <x-form-button>Надіслати</x-form-button>
      </div>

      <!-- Session Status -->
      <x-auth-session-status :status="session('status')" />
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

