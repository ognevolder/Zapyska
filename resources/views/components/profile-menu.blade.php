<!-- Action area -->
<section id="container-mobile" class="w-full flex bg-[#fff] py-4 border-[0.5px] text-xl text-lightgreen font-display font-medium">
  <div id="profile-menu" class="mx-4 flex flex-col gap-2 items-start">
    <!-- Profile data -->
    <x-profile-button id="profile-bio">Інформація</x-profile-button>
    <!-- Posts -->
    <x-profile-button id="profile-posts">Публікації</x-profile-button>
    <!-- Art -->
    <x-profile-button id="profile-art">Творчість</x-profile-button>
    <!-- Help -->
    <x-profile-button id="profile-help">Підтримка</x-profile-button>
    <!-- Settings -->
    <x-profile-button id="profile-settings">Налаштування</x-profile-button>
  </div>
  <div id="container-desktop" class="hidden mx-4 w-full border-l-[0.5px] border-l-lightgreen">Large</div>
</section>

<!-- Script -->
<script>
  document.addEventListener('DOMContentLoaded', function() {
    const menu = document.getElementById('profile-menu');
    const buttons = document.querySelectorAll('#profile-menu button');

    buttons.forEach(button => {
        button.addEventListener('click', function() {
            const screenWidth = window.innerWidth;
            const targetContainer = screenWidth >= 1024
                ? document.getElementById('container-desktop')
                : document.getElementById('container-mobile');

            let url = '';

            // 🔹 Визначаємо маршрут залежно від ID кнопки
            switch (this.id) {
                case 'profile-bio':
                    url = "{{ route('profile.bio') }}";
                    break;
                case 'profile-posts':
                    url = "{{ route('profile.posts') }}";
                    break;
                default:
                    console.error('Невідома дія');
                    return;
            }

            // 🔹 Виконуємо AJAX-запит
            fetch(url, {
                method: "POST",
                headers: {
                    "Content-Type": "application/json",
                    "X-CSRF-TOKEN": "{{ csrf_token() }}"
                }
            })
            .then(res => res.json())
            .then(data => {
                if (screenWidth < 1024) {
                    menu.classList.add('hidden');
                }

                targetContainer.innerHTML = data.html;
                targetContainer.classList.remove('hidden');

                const wrapper = targetContainer.querySelector('#profile-posts-wrapper');
                // Перевіряємо, чи існує wrapper, потім анімація
                if (wrapper) {
                    // Даємо невеликий таймаут, щоб браузер встиг застосувати початкові стилі
                    wrapper.offsetHeight;
                    requestAnimationFrame(() => {
                    // другий рендер-кадр для надійності
                        setTimeout(() => {
                            wrapper.classList.remove('max-h-0', 'opacity-0');
                            wrapper.classList.add('max-h-[2000px]', 'opacity-100');
                        }, 20);
                    });
                } else {
          // fallback: плавно показати контейнер, якщо wrapper немає
          targetContainer.style.transition = 'opacity 0.35s ease';
          targetContainer.style.opacity = 0;
          requestAnimationFrame(() => {
            targetContainer.style.opacity = 1;
          });
        }
      })
      .catch(err => {
        console.error(err);
        // у разі помилки можна показати повідомлення або повернути меню
        if (screenWidth < 1024) {
          menu.classList.remove('hidden');
        }
            })
            .catch(err => console.error(err));
        });
    });
});
</script>


