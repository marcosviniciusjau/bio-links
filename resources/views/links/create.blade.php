<x-layout.app>
    <x-container>
        <x-card title="Create a new link">
            <x-form :route="route('links.create')" post id="form">
                <x-input name="link" placeholder="link" value="{{ old('link') }}"/>
                <x-input name="name" placeholder="name" value="{{ old('name') }}"/>
            </x-form>
            <x-slot:actions>
                <x-a :href="route('dashboard')">Cancel</x-a>
                <x-button type="submit" form="form">Create new link</x-button>
            </x-slot>
        </x-card>
    </x-container>
</x-layout.app>

