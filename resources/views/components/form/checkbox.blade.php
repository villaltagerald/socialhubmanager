@props(['name','img',"nameCheck"])
<x-form.field>
    <div class="d-flex align-items-center mb-4 border border-gray-200 p-6 rounded-xl">
    <img src={{$img}} alt="Icono " class="w-8 h-8 mr-2">

    <x-form.label name={{$name}} />
    <div class="form-check form-switch d-inline-flex ml-auto">
        <input class="form-check-input custom-checkbox"
            name={{$nameCheck}}
            type="checkbox"
            {{ $attributes(['value' => old($name) ]) }}
        >
    </div>
    
    </div>
    <style>
        .custom-checkbox {
        width: 2.8125rem !important; 
        height: 1.875rem !important; 
    }
    </style>
</x-form.field>
