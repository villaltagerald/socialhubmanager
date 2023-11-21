
<x-layout>
    <x-setting heading="{{ isset($consent) ? 'Edit' : 'Create' }} mastodon Authorization" :link="['twitter','reddit','mastodon']" url="authorization">
        <div class="w-85">
            <form method="POST" action="{{ isset($consent) ? route('authorization.mastodon.update', $consent->id) : route('authorization.mastodon.store') }}" enctype="multipart/form-data">
                @csrf

                @if(isset($consent))
                    @method('PATCH') <!-- Solo si estás en modo de edición -->
                @endif
                
                <x-form.input name='bearer_token' value="{{ old('bearer_token', $consent->bearer_token ?? '') }}" autocomplete="off"/>
               <input type="hidden" name="media_id" value="{{ $media->id ?? '' }}">

                <x-form.button>{{ isset($consent) ? 'Update' : 'Publish' }}</x-submit-button>
            </form>
            @if($consent)
            <form method="POST" action="{{ route('authorization.mastodon.destroy', $consent->id) }}">
                @csrf
                @method('DELETE')
                <x-form.button type="submit">Delete</x-form-button>
            </form>
            @endif
        </div>
    </x-setting>
</x-layout>
  