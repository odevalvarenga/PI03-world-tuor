<h1>Minha Conta</h1>

@if(session('success')) <div style="color:green">{{ session('success') }}</div> @endif

<form action="{{ route('perfil.update') }}" method="POST">
    @csrf
    Nome: <input type="text" name="name" value="{{ old('name', $user->name) }}"><br>
    Email: <input type="email" name="email" value="{{ old('email', $user->email) }}"><br>
    <button type="submit">Atualizar Perfil</button>
</form>
