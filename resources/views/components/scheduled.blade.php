<x-layout>
    <x-setting heading="Scheduled publication" :link="['instant','queued','scheduled','queuing schedule']" url="publishing">
        <div class="w-85">
            <form method="POST" action="{{ route('scheduled.store')}}" enctype="multipart/form-data">
                @csrf
                <div class="grid grid-cols-3 gap-4">
                    <div class="row-span-3">
                        <x-social :apis="$apis"/>
                    </div>

                    <div class="col-span-2">
                        <x-panel>
                            <x-form.textarea name='enunciated' />
                            <x-form.input name='date' type="date"/>
                            <x-form.input name='hour' type="time"/>
                            <x-form.input name='thumbnail' type='file'/>
                            <input type="hidden" name="typepost_id" value="{{ $typepost->id ?? '' }}">
                        </x-panel>
                    </div>
                </div>
                <x-form.button>Publish</x-submit-button>
            </form>
        </div>
    </x-setting>
</x-layout>

  
  