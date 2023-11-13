@props(['heading'])
<div class="w-85">
    <h1 class="text-lg font-bold mb-8 pb-2 border-b">
        {{$heading}}
    </h1>
    <form method="POST" action="/admin/posts" enctype="multipart/form-data">
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

  
  