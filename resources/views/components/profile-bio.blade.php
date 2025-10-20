<div class="mx-4 bg-[#fff]">
  <a href="/profile" class="lg:hidden">Назад</a>
  <!-- Name -->
  <p><strong>Ім’я:</strong> {{ $user->name }}</p>

  <!-- Email -->
  <p><strong>Email:</strong> {{ $user->email }}</p>
  <!-- Email verification -->
  @if (!auth()->user()->hasVerifiedEmail())
  <div class="alert alert-warning">
    <p>⚠️ Ваша електронна адреса ще не верифікована.</p>
    @if (session('status'))
      <div class="alert alert-success">
        {{ session('status') }}
      </div>
    @endif
    <form method="POST" action="{{ route('verification.send') }}">
        @csrf
        <button type="submit" class="bg-lightgreen">
            Verify
        </button>
      </form>
  </div>
  @endif

  <!-- Registered -->
  <p><strong>Дата реєстрації:</strong> {{ $user->created_at->format('d.m.Y') }}</p>

  <!-- Change Password -->
  <form action="/password" method="POST">
    @method('PUT')
    <x-form-link>Current</x-form-link>
    <x-form-link>New Password</x-form-link>
  </form>
</div>



