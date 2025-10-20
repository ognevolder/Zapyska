<div id="profile-posts-wrapper" class="mx-4 bg-[#fff] overflow-hidden max-h-0 opacity-0 transition-all duration-2500 ease-out transform">
  <!-- Посилання назад на сторінку профілю -->
  <a href="/profile" class="lg:hidden">Назад</a>
  <!-- Публікації користувача -->
  @if ($posts->isEmpty())
  <div class="text-center text-gray-500 py-8">
    <p class="text-lg font-medium">У вас ще немає публікацій 📝</p>
    <a href="{{ route('posts.create') }}" class="inline-block mt-4 px-4 py-2 bg-green-600 text-white rounded-lg hover:bg-green-700 transition">
        Створити першу публікацію
    </a>
  </div>
  @else
  <div class="space-y-4">
    @foreach ($posts as $post)
    <div class="border-b border-gray-200 pb-3">
      <h3 class="text-lg font-semibold text-gray-900">{{ $post->title }}</h3>
      <p class="text-gray-600 text-sm mt-1">{{ Str::limit($post->body, 120) }}</p>
      <div class="text-xs text-gray-400 mt-1">
          Опубліковано: {{ $post->created_at->format('d.m.Y') }}
      </div>
    </div>
    @endforeach
  </div>
  @endif
</div>



