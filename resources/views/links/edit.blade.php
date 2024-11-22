<div>
    <h1>Editar um link:: {{$link->id}}</h1>

    @if($message = session()->get('message'))
    <div>{{ $message }}</div>
    @endif
   <form action="{{ route('links.edit', $link) }}" method="post">
    @csrf

    @method('PUT')
    <div>
        <input type="text" name="name" placeholder="name" value="{{ old('name', $link->name) }}"/>

        @error('name')
        <span>{{ $message }}</span>
        @enderror
    </div>
    <div>
        <input name="link" placeholder="link" value="{{ old('link', $link->link) }}"/>

        @error('link')
        <span>{{ $message }}</span>
        @enderror
    </div>
  <a href="{{route('dashboard')}}">Cancelar</a>
    <button type="submit">Editar</button>
   </form>
</div>
