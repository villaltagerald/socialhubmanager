<x-layout>
    <x-setting heading="Queuing publication" :link="['instant','queued','scheduled','queuing schedule']" url="publishing">
        <div class="w-85">
            <div class="grid grid-flow-row-dense grid-cols-3">
                <div  class="mx-auto">
                    <form method="POST" action="{{ route('queuingschedule.store')}}" enctype="multipart/form-data">
                        @csrf
                        <x-panel>
                            <x-form.input name='name' />
                            <x-form.input name='date' type="date"/>
                            <x-form.input name='hour' type="time"/>
                        </x-panel>
                        <x-form.button>Publish</x-submit-button>
                    </form>
                </div>   

                <div class="col-span-2 ">
                    @for ($i = 0; $i < count($queuing_schedule); $i++)
                    <div class="mb-8">
                        <x-panel class="flex items-center justify-between">
                            <div>
                                <p>
                                    {{$queuing_schedule[$i]->name}}
                                </p>
                                <p>
                                    <time>{{$queuing_schedule[$i]->publish_at}}</time>
                                </p>
                            </div>
                    
                            <div>
                                <form method="POST" action="{{ route('queuingschedule.destroy', $queuing_schedule[$i]->id) }}">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit">
                                        <img src="/images/trash.svg" alt="Delete" class="w-8 h-8 mr-2">
                                    </button>
                                </form>
                            </div>
                        </x-panel>
                    </div>
                    
                    @endfor
                </div>
            </div>
        </div>
    </x-setting>
</x-layout>

  
  