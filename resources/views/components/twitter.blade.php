<x-layout>
    <x-setting heading="Twitter Authorization" :link="['twitter','reddit','pinterest']" url="authorization">
        <div class="w-85">
            <form method="POST" action="#" enctype="multipart/form-data">
                @csrf
                
                <x-form.input name='consumer_key' />
                <x-form.input name='consumer_secret' />
                <x-form.input name='access_token' />
                <x-form.input name='token_secret' />
                <x-form.input name='bearer_token' />
                <x-form.input name='client_id' />
                <x-form.input name='client_secret' />
                        
                <x-form.button>Publish</x-submit-button>
            </form>
        </div>
    </x-setting>
</x-layout>

  
  