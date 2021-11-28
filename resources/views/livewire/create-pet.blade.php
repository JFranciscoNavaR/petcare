<div>
    <x-jet-button wire:click="$set('open', true)">
        Agregar mascota
    </x-jet-button>
    <x-jet-dialog-modal wire:model="open">
        <x-slot name="title">
            Agregar Nueva Mascota
        </x-slot>
        <x-slot name="content">
            <div class="mb-4">
                <x-jet-label value="Nombre de la Mascota"/>
                <x-jet-input type="text" required class="w-full" wire:model="nombre"/>
                <x-jet-input-error for="nombre"/>
            </div>
            <div class="mb-4">
                <x-jet-label value="Edad (meses) de la Mascota"/>
                <x-jet-input type="number" required class="w-full" wire:model="edad"/>
                <x-jet-input-error for="edad"/>
            </div>
            <div class="mb-4">
                <x-jet-label value="Sexo de la Mascota"/>
                <select wire:model="sexo" required class="w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm">
                    <option value="">Seleccione un sexo</option>
                    <option value="Hembra">Hembra</option>
                    <option value="Macho">Macho</option>
                </select>
                <x-jet-input-error for="sexo"/>
            </div>
            <div class="mb-4">
                <x-jet-label value="Peso (Kg) de la Mascota"/>
                <x-jet-input type="number" required class="w-full" wire:model="peso"/>
                <x-jet-input-error for="peso"/>
            </div>
            <div class="mb-4">
                <x-jet-label value="Color de la Mascota"/>
                <x-jet-input type="text" required class="w-full" wire:model="color"/>
                <x-jet-input-error for="color"/>
            </div>
            <div class="mb-4">
                <x-jet-label value="Raza de la Mascota"/>
                <x-jet-input type="text" required class="w-full" wire:model="raza"/>
                <x-jet-input-error for="raza"/>
            </div>
            <div class="mb-4">
                <x-jet-label value="Especie de la Mascota"/>
                <x-jet-input type="text" required class="w-full" wire:model="especie"/>
                <x-jet-input-error for="especie"/>
            </div>
            <div class="mb-4">
                <x-jet-label value="Tipo de la Mascota"/>
                <select wire:model="type_id" required class="w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm">
                    <option value="">Seleccione un tipo</option>
                    @foreach ($types as $type)
                        <option value="{{$type->id}}">{{$type->nombre}}</option>
                    @endforeach
                </select>
                <x-jet-input-error for="type_id"/>
            </div>
            <div class="mb-4">
                <x-jet-label value="Estatus de la Mascota"/>
                <select wire:model="statu_id" required class="w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm">
                    <option value="">Seleccione un estatus</option>
                    @foreach ($status as $statu)
                        <option value="{{$statu->id}}">{{$statu->nombre}}</option>
                    @endforeach
                </select>
                <x-jet-input-error for="statu_id"/>
            </div>
            <div class="mb-4">
                <x-jet-label value="Descripción de la Mascota"/>
                <textarea rows="6" required wire:model="descripcion" class="block w-full h-40 text-gray-700 bg-white border border-gray-300 rounded-md dark:bg-gray-800 dark:text-gray-300 dark:border-gray-600 focus:border-blue-500 dark:focus:border-blue-500 focus:outline-none focus:ring"></textarea>
                <x-jet-input-error for="descripcion"/>
            </div>
            <div class="mb-4">
                <input type="file" wire:model="image" id="{{$identificador}}">
                <x-jet-input-error for="image"/>
            </div>
            <div wire:loading wire:target="image" class="w-full mb-4 bg-blue-100 border border-blue-400 text-blue-700 px-4 py-3 rounded relative" role="alert">
                <strong class="font-bold">¡Imagen Cargando!</strong>
                <span class="block sm:inline">Espere un momento.</span>
            </div>
            @if ($image)
                <img class="mb-4" src="{{$image->temporaryUrl()}}">
            @endif
        </x-slot>
        <x-slot name="footer">
            <x-jet-danger-button wire:click="$set('open', false)">
                Cancelar
            </x-jet-danger-button>
            <x-jet-button wire:click="save" wire:loading.attr="disabled" wire:target="save, image" class="disabled:opacity-25">
                Agregar
            </x-jet-button>
        </x-slot>
    </x-jet-dialog-modal>
</div>