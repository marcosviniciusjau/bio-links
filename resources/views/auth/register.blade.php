<div>
    {{auth()->id()}}
    <h1>Register</h1>

    @if($message = session()->get('message'))
    <div>{{ $message }}</div>
    @endif
   <form action="{{ route('register') }}" method="post">
    @csrf

    <div>
        <input type="text" name="name" placeholder="name" value="{{ old('name') }}"/>

        @error('name')
        <span>{{ $message }}</span>
        @enderror
    </div>
    <div>
        <input type="email" name="email" placeholder="email" value="{{ old('email') }}"/>

        @error('email')
        <span>{{ $message }}</span>
        @enderror
    </div>

    <div>
        <input type="email" name="email_confirmation" placeholder="email confirmation"/>
    </div>

   <div>
        <input type="password" name="password" placeholder="password"/>
            @error('password')
        <span>{{ $message }}</span>
        @enderror
   </div>

  
    <button type="submit">Registrar</button>
   </form>
</div>
