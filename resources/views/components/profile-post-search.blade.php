<input id="searchbar" placeholder="Введіть запит...">
  <section id="searchcontainer" class="hidden bg-amber-700">
  </section>

  <script>
    const search = document.getElementById('searchbar');
    const container = document.getElementById('searchcontainer');

    search.addEventListener('click', () => {
      container.classList.remove('hidden');
      search.focus();
    });

    let debounceTimer;
    search.addEventListener('input', function() {
        clearTimeout(debounceTimer);
        const query = this.value.trim();

        if (query.length < 2) {
            container.innerHTML = '<p class="text-gray-400 text-center">Введіть більше символів...</p>';
            return;
        }

        debounceTimer = setTimeout(() => {

            container.innerHTML = '';

            fetch(`{{ route('posts.search') }}?query=${encodeURIComponent(query)}`)
                .then(res => res.json())
                .then(data => {

                    if (data.length === 0) {
                        container.innerHTML = '<p class="text-gray-400 text-center">Нічого не знайдено.</p>';
                    } else {
                        container.innerHTML = data.map(post => `
                            <a href="/posts/${post.id}" class="block border-b pb-2 hover:bg-gray-100 px-2 py-1 rounded transition">
                                <h3 class="font-semibold text-blue-600">${post.title}</h3>
                            </a>
                        `).join('');
                    }
                })
                .catch(err => {

                    container.innerHTML = '<p class="text-red-500 text-center">Помилка пошуку</p>';
                    console.error(err);
                });
        }, 1000); // ⏱ затримка 400 мс
      });
  </script>