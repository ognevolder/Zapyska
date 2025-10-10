<x-layout>
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
</x-layout>
