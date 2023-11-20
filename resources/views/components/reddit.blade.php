
<x-layout>
    <x-setting heading="{{ isset($consent) ? 'Edit' : 'Create' }} Reddit Authorization" :link="['twitter','reddit','pinterest']" url="authorization">
        <div class="w-85">
            <form method="POST" action="{{ route('auth.reddit') }}">
                @csrf
                <x-form.button type="submit">Obtener Token</x-form-button>
            </form>
            <form method="POST" action="{{ isset($consent) ? route('authorization.reddit.update', $consent->id) : route('authorization.reddit.store') }}" enctype="multipart/form-data">
                @csrf

                @if(isset($consent))
                    @method('PATCH') <!-- Solo si estás en modo de edición -->
                @endif
                
                <x-form.input name='bearer_token' value="{{ old('bearer_token', session('reddit_access_token') ?? ($consent->bearer_token ?? '')) }}" autocomplete="off"/>
                <x-form.input name='client_id' value="{{ old('client_id', $consent->client_id ?? '') }}" autocomplete="off"/>
                <x-form.input name='client_secret' value="{{ old('client_secret', $consent->client_secret ?? '') }}" autocomplete="off"/>
                <input type="hidden" name="media_id" value="{{ $media->id ?? '' }}">
                
                <x-form.button>{{ isset($consent) ? 'Update' : 'Publish' }}</x-submit-button>
            </form>
            
            @if($consent)
            <form method="POST" action="{{ route('authorization.reddit.destroy', $consent->id) }}">
                @csrf
                @method('DELETE')
                <x-form.button type="submit">Delete</x-form-button>
            </form>
            @endif
        </div>
    </x-setting>
</x-layout> 
  