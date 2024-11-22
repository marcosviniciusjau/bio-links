<div>
    <h1>Profile</h1>

    @if (session('message'))
        <div>{{ session('message') }}</div>
    @endif

   <form action="{{ route('profile') }}" method="post" enctype="multipart/form-data">
    @csrf
    @method('PUT')

    <div>
        <img src="/storage/{{$user->photo}}" alt="{{$user->name}}">
        <input type="file" name="photo"/>
    </div>
    <div>
        <input type="text" name="name" placeholder="Nome" value="{{ old('name',$user->name) }}"/>
        @error('name')
        <span>{{ $message }}</span>
        @enderror
    </div>

    <div>
        <textarea name="description" placeholder="Resumo">{{ old('description',$user->description) }}</textarea>
        @error('description')
        <span>{{ $message }}</span>
        @enderror
    </div>

    <div>
        <span>biolinks.com.br/</span>
        <input type="text" name="handler" placeholder="@seulink" value="{{ old('handler',$user->handler) }}"></input>
        @error('handler')
        <span>{{ $message }}</span>
        @enderror
    </div>
   
    <a href="{{route('dashboard')}}">Cancelar</a>
    <button type="submit">Update</button>
   </form>
</div>
