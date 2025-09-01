@props(['post'])

<main class="w-screen flex justify-center">
  <article class="w-[144rem] flex flex-col gap-[3.2rem]">
    <h2 class="text-[3.2rem] text-[#025939] font-[Raleway] font-medium leading-none">{{ $slot }}</h2>
    <form id="postForm" action="/posts/{{ $post->id }}/update" method="POST" class="flex flex-col gap-[0.8rem] items-start text-[2rem] text-[#025939] font-[Raleway] font-regular leading-none">
      <!-- CSRF-token -->
      @csrf
      @method('PATCH')

      <!-- Author ID hidden input -->
      <input type="hidden" name="author_id" value="{{ $post->author_id }}">
      <!-- Post TITLE input-field -->
      <x-form-input id="title" form="postForm" name="title" :value="$post->title" class="w-full">Заголовок</x-form-input>

      <!-- Post BODY input-field -->
      <x-form-textarea id="body" form="postForm" name="body" :value="$post->body" rows="13" class="w-full">Текст</x-form-textarea>

      <!-- Post TAG input-field -->
      <x-form-input id="tag" form="postForm" name="tag" :value="$post->tag" class="w-full">Тег</x-form-input>

      <!-- Submit button -->
      <x-form-button>Зберегти зміни</x-form-button>
    </form>
  </article>
</main>