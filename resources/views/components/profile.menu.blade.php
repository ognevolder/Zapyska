<!-- Action area -->
  <section class="flex flex-col gap-2 text-sm text-darkgreen font-display font-medium">
    <!-- Profile data -->
    <button id="profile-info" class="border py-1 px-2">Персональні дані</button>
    <!-- Posts -->
    <button id="profile-info" class="border py-1 px-2 text-sm text-darkgreen font-display font-medium">Останні публікації</button>
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
            <button type="submit" class="btn btn-primary">
                Verify
            </button>
          </form>
      </div>
    @endif

    <!-- Create -->
    {{-- <div class="flex gap-2 items-center">
    <button id="postBtn"  class="text-base bg-lightgreen text-[#fff] px-2 py-1 font-display font-semibold uppercase" >Створити</button>
    <div id="postCreate" class="hidden text-black font-light">
      <a href="/posts/create">Публікація</a>
      <a href="/#">Особисте</a>
    </div>
    <script>
      let selector = document.getElementById('postCreate');
      let isOpen = false;

      document.getElementById('postBtn').addEventListener('click', function() {
        if (!isOpen) {
          selector.classList.remove('hidden');
          selector.classList.add('flex', 'gap-2', 'items-center');
          isOpen = true;
        } else {
          selector.classList.add('hidden');
          selector.classList.remove('flex', 'gap-2', 'items-center');
          isOpen = !isOpen
        }
      });
    </script>
    </div> --}}
  </section>
</header>