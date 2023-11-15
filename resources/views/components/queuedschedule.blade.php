<x-layout>
    <x-setting heading="Queued publication" :link="['instant','queued','scheduled','queued schedule']" url="publishing">
        <div class="w-85">
            <form method="POST" action="#" enctype="multipart/form-data">
                @csrf
                <div class="grid grid-cols-3 gap-4">
                    <div class="row-span-3">
                        <x-panel>
                            <x-form.input name='name' />
                            <x-form.input name='date' type="date"/>
                            <x-form.input name='hour' type="time"/>
                        </x-panel>
                    </div>

                    <div class="col-span-2">
                        
                    </div>

                    <div class="row-span-2 col-span-2">
                        
                    </div>
                </div>
                <x-form.button>Publish</x-submit-button>
            </form>
        </div>
    </x-setting>
</x-layout>

  
  