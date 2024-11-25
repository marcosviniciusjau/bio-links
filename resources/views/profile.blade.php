<x-layout.app>
    <x-container>
        <x-card title="Profile">
            <x-form :route="route('profile')" put id="form" enctype="multipart/form-data">
                <div class="flex gap-2 items-center">
                    <x-img src="/storage/{{$user->photo}}" alt="{{$user->name}}"></x-img>
                    <x-file-input name="photo"/>
                </div>

                <x-input name="name" placeholder="name" value="{{ old('name', $user->name) }}"/>
                <x-textarea name="description" value="{{ old('description', $user->description) }}"/>
                <x-textarea name="handler" value="{{ old('handler', $user->handler) }}"/>
               <x-input name="handler" prefix="biolinks.com.br/" placeholder="handler" value="{{ old('handler', $user->handler) }}"/>
                
            </x-form>
            <x-slot:actions>
                <x-a :href="route('dashboard')">Cancel</x-a>
                <x-button type="submit" form="form">Update link</x-button>
            </x-slot>
        </x-card>
    </x-container>
</x-layout.app>