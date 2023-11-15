<x-layout>
    <x-setting heading="Queuing publication" :link="['instant','queued','scheduled','queuing schedule']" url="publishing">
        <div class="w-85">
            <form method="POST" action="{{ route('publishing.queuingschedule')}}" enctype="multipart/form-data">
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
                        @for ($i = 0; $i < count($queuing_schedule); $i++)
                            <x-panel>
                                <div >
                                    <p>
                                        {{$queuing_schedule[$i]->name}}
                                    </p>
                                    <p>
                                        {{$queuing_schedule[$i]->publish_at}}
                                    </p>
                                </div>

                                <div>
                                    <p>
                                        Delete
                                    </p>
        
                                </div>
                            </x-panel>
                        @endfor
                    </div>
                </div>
                <x-form.button>Publish</x-submit-button>
            </form>
        </div>
    </x-setting>
</x-layout>

  
  