<div>
    {{auth()->id()}}
    <h1>Criar um link</h1>

    @if($message = session()->get('message'))
    <div>{{ $message }}</div>
    @endif
   <form action="{{ route('links.create') }}" method="post">
    @csrf

    <div>
        <input type="text" name="name" placeholder="name" value="{{ old('name') }}"/>

        @error('name')
        <span>{{ $message }}</span>
        @enderror
    </div>
    <div>
        <input name="link" placeholder="link" value="{{ old('link') }}"/>

        @error('link')
        <span>{{ $message }}</span>
        @enderror
    </div>
  
    <button type="submit">Criar</button>
   </form>
</div>
