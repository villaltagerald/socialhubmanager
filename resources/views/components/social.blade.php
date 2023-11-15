@props (['apis'])
<div class="mb-6">
    @for ($i = 0; $i < count($apis); $i++)
        <x-form.checkbox id="{{$apis[$i]->id}}" name="{{$apis[$i]->name}}" value="{{$apis[$i]->id}}" img='/images/{{$apis[$i]->name}}.svg'/>
    @endfor
</div> 


  
  
