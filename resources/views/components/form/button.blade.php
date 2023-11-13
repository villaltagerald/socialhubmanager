<x-form.field>
    <div class="flex justify-end mt-4"> 
    <button 
        type="submit" 
        class="bg-blue-500 text-white uppercase font-semibold text-xs py-2 px-10 rounded-2xl hover:bg-blue-600"
    >
        {{$slot}}
    </button>
    </div>
</x-form.field>