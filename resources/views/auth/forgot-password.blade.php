<x-layout>
  <x-form-header>
    Забули пароль? Не проблема. Вкажіть Вашу електронну пошту, щоб отримати посилання для відновлення паролю.
  </x-form-header>

  <!-- Session Status -->
  <x-auth-session-status class="mb-4" :status="session('status')" />
  <!-- Form -->
  <form method="POST" action="{{ route('password.email') }}">
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

    </form>
</x-layout>
