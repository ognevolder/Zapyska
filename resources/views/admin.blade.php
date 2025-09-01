<h1>admin panel</h1>
<table border="1" cellpadding="8" cellspacing="0">
  <tr>
      <th>Імʼя</th>
      <th>Username</th>
      <th>Email</th>
      <th>Authorship</th>
  </tr>

  @foreach ($users as $user)
      <tr>
          <td>{{ $user->name }}</td>
          <td>{{ $user->username }}</td>
          <td>{{ $user->email }}</td>
          <td>
            @if($user->authorship)
              {{ $user->authorship }}
            @else
              <form action="/admin/author/store" method="POST">
                @csrf
                <input type="hidden" name="role" value="Автор">
                <input type="hidden" name="user_id" value="{{ $user->id }}">
                <button>Додати автора</button>
              </form>
            @endif
          </td>
      </tr>
  @endforeach
</table>