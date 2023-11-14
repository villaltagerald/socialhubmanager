<x-layout>
    <x-setting heading="Queued publication" :link="['instant','queued','scheduled']" url="publishing">
        <div class="w-85">
            <form method="POST" action="#" enctype="multipart/form-data">
                @csrf
                <div class="grid grid-cols-3 gap-4">
                    <div class="row-span-3">
                        <x-panel>
                            <x-social/>
                        </x-panel>
                    </div>

                    <div class="col-span-2">
                        <x-panel>
                            <x-form.input name='title' />
                            <x-form.textarea name='body' />
                            <x-form.input name='thumbnail' type='file'/>
                        </x-panel>
                    </div>

                    <div class="row-span-2 col-span-2">
                        
                    </div>
                </div>
                <x-form.button>Publish</x-submit-button>
            </form>
        </div>
    </x-setting>
</x-layout>

  
  