<div>
    <h1>Login</h1>

    @if($message = session()->get('message'))
    <div>{{ $message }}</div>
    @endif

   <form action="{{ route('login') }}" method="post">
    @csrf
        <div>
            <input type="text" name="email" placeholder="email" value="{{ old('email') }}"/>
            @error('email')
            <span>{{ $message }}</span>
            @enderror
        </div>
        
        <div>  
            <input type="password" name="password" placeholder="password"/>
            @error('password')
            <span>{{ $message }}</span>
            @enderror
        </div>
  
    <button type="submit">login</button>
   </form>
</div>
