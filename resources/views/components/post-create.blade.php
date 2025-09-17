<main class="w-full">
  <article class="mx-8">
    <h2 class="text-2xl text-darkgreen font-display font-medium leading-none">{{ $slot }}</h2>
    <form id="postForm" action="/posts/store" method="POST" class="flex flex-col my-4 gap-4 items-start text-base text-darkgreen font-display font-normal leading-none">
      <!-- CSRF-token -->
      @csrf

      <!-- Post TITLE input-field -->
      <x-form-input id="title" form="postForm" name="title" :value="old('title')" class="w-full">Заголовок</x-form-input>

      <!-- Post BODY input-field -->
      <x-form-textarea id="body" form="postForm" name="body" :value="old('body')" rows="13" class="w-full">Текст</x-form-textarea>

      <!-- Post TAG input-field -->
      <x-form-input id="tag" form="postForm" name="tag" :value="old('tag')" class="w-full">Тег</x-form-input>

      <!-- Submit button -->
      <x-form-button>Зберегти</x-form-button>
    </form>
  </article>
</main>