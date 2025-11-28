<!-- Mobile -->
<nav class="lg:hidden">
  <x-nav-link href="/profile/bio">
    <p>Персональні дані</p>
  </x-nav-link>
  <x-nav-link href="/profile/posts">
    <p>Мої публікації</p>
  </x-nav-link>
  @if (Auth::user()->authorship != 0)
  <x-nav-link href="/profile/writings">
    <p>Тексти</p>
  </x-nav-link>
  @endif
  <x-nav-link>
    <p>Підтримка</p>
  </x-nav-link>
</nav>

<!-- Desktop -->
<section class="max-lg:hidden flex">
  <nav class="flex flex-col gap-4 border-1">
    <x-profile-button id="profile_bio">Персональні дані</x-profile-button>
    <x-profile-button id="profile_posts">Мої публікації</x-profile-button>
  <x-nav-link>
    <p>Творчість</p>
  </x-nav-link>
  <x-nav-link>
    <p>Підтримка</p>
  </x-nav-link>
  </nav>
  <aside id="container" class="border-1">
    ff
  </aside>
</section>

<script>
// User data
document.getElementById('profile_bio').addEventListener('click', function() {
    fetch("{{ route('profile.bio') }}", {
        method: "POST",
        headers: {
            "Content-Type": "application/json",
            "X-CSRF-TOKEN": "{{ csrf_token() }}",
            "X-Requested-With": "XMLHttpRequest"
        }
    })
    .then(res => res.json())
    .then(data => {
        document.getElementById('container').innerHTML = data.html;
    })
    .catch(err => console.error(err));
});

// User posts
document.getElementById('profile_posts').addEventListener('click', function() {
    fetch("{{ route('profile.posts') }}", {
        method: "POST",
        headers: {
            "Content-Type": "application/json",
            "X-CSRF-TOKEN": "{{ csrf_token() }}",
            "X-Requested-With": "XMLHttpRequest"
        }
    })
    .then(res => res.json())
    .then(data => {
        document.getElementById('container').innerHTML = data.html;
    })
    .catch(err => console.error(err));
});
</script>