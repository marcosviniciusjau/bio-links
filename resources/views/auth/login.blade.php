<div>
    
{{auth()->id()}}
    <h1>login</h1>

    @if($message = session()->get('message'))
    <div>{{ $message }}</div>
    @endif

   <form action="{{ route('login') }}" method="post">
    @csrf
    <input type="text" name="email" placeholder="email"/>

    @error('email')
    <span>{{ $message }}</span>
    @enderror
    <input type="password" name="password" placeholder="password"/>
    @error('password')
    <span>{{ $message }}</span>
    @enderror
    <button type="submit">login</button>
   </form>
</div>
