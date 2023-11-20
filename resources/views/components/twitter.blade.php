
<x-layout>
    <x-setting heading="{{ isset($consent) ? 'Edit' : 'Create' }} Twitter Authorization" :link="['twitter','reddit','pinterest']" url="authorization">
        <div class="w-85">
            <form method="POST" action="{{ isset($consent) ? route('authorization.twitter.update', $consent->id) : route('authorization.twitter.store') }}" enctype="multipart/form-data">
                @csrf

                @if(isset($consent))
                    @method('PATCH') <!-- Solo si estás en modo de edición -->
                @endif
                
                <x-form.input name='consumer_key' value="{{ old('consumer_key', $consent->consumer_key ?? '') }}" autocomplete="off"/>
                <x-form.input name='consumer_secret' value="{{ old('consumer_secret', $consent->consumer_secret ?? '') }}" autocomplete="off"/>
                <x-form.input name='access_token' value="{{ old('access_token', $consent->access_token ?? '') }}" autocomplete="off"/>
                <x-form.input name='token_secret' value="{{ old('token_secret', $consent->token_secret ?? '') }}" autocomplete="off"/>
                <input type="hidden" name="media_id" value="{{ $media->id ?? '' }}">

                <x-form.button>{{ isset($consent) ? 'Update' : 'Publish' }}</x-submit-button>
            </form>
            @if($consent)
            <form method="POST" action="{{ route('authorization.twitter.destroy', $consent->id) }}">
                @csrf
                @method('DELETE')
                <x-form.button type="submit">Delete</x-form-button>
            </form>
            @endif
        </div>
    </x-setting>
</x-layout>

  