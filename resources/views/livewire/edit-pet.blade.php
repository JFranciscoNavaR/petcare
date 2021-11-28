<div>
    <a class="font-bold text-white py-2 px-4 rounded cursor-pointer bg-yellow-600 hover:bg-yellow-500" wire:click="$set('open', true)">
        <i class="fas fa-edit"></i>    
    </a>
    <x-jet-dialog-modal wire:model="open">
        <x-slot name="title">
            Editar Mascota
        </x-slot>
        <x-slot name="content">        
            <div class="mb-4">
                <x-jet-label value="Nombre de la Mascota"/>
                <x-jet-input type="text" require class="w-full" wire:model="pet.nombre"/>
                <x-jet-input-error for="pet.nombre"/>
            </div>
            <div class="mb-4">
                <x-jet-label value="Edad (Años) de la Mascota"/>
                <x-jet-input type="number" require class="w-full" wire:model="pet.edad"/>
                <x-jet-input-error for="pet.edad"/>
            </div>
            <div class="mb-4">
                <x-jet-label value="Peso (Kg) de la Mascota"/>
                <x-jet-input type="number" require class="w-full" wire:model="pet.peso"/>
                <x-jet-input-error for="pet.peso"/>
            </div>
            <div class="mb-4">
                <x-jet-label value="Color de la Mascota"/>
                <x-jet-input type="text" require class="w-full" wire:model="pet.color"/>
                <x-jet-input-error for="pet.color"/>
            </div>
            <div class="mb-4">
                <x-jet-label value="Raza de la Mascota"/>
                <x-jet-input type="text" require class="w-full" wire:model="pet.raza"/>
                <x-jet-input-error for="pet.raza"/>
            </div>
            <div class="mb-4">
                <x-jet-label value="Especie de la Mascota"/>
                <x-jet-input type="text" require class="w-full" wire:model="pet.especie"/>
                <x-jet-input-error for="pet.especie"/>
            </div>
            <div class="mb-4">
                <x-jet-label value="Descripción de la Mascota"/>
                <textarea rows="6" require wire:model="pet.descripcion" class="block w-full h-40 px-4 py-2 text-gray-700 bg-white border border-gray-300 rounded-md dark:bg-gray-800 dark:text-gray-300 dark:border-gray-600 focus:border-blue-500 dark:focus:border-blue-500 focus:outline-none focus:ring"></textarea>
                <x-jet-input-error for="pet.descripcion"/>
            </div>
            <div class="mb-4">
                <input type="file" wire:model="image" id="{{$identificador}}">
                <x-jet-input-error for="pet.image"/>
            </div>
            <div wire:loading  wire:target="image" class="mb-4 bg-blue-100 border border-blue-400 text-blue-700 px-4 py-3 rounded relative" role="alert">
                <strong class="font-bold">Imagen Cargando!</strong>
                <span class="block sm:inline">Espere un momento.</span>
            </div>
            @if ($image)
                <img class="mb-4" src="{{$image->temporaryUrl()}}">
            @else
                <img src="{{$pet->image}}" alt="">
            @endif
        </x-slot>
        <x-slot name="footer">
            <x-jet-secondary-button wire:click="$set('open', false)">
                Cancelar
            </x-jet-secondary-button>
            <x-jet-secondary-button wire:click="save" wire:loading.attr="disabled" wire:target="save" class="disabled:opacity-25">
                Actualizar
            </x-jet-secondary-button>
        </x-slot>
    </x-jet-dialog-modal>
</div>
