<div>
    <x-jet-secondary-button wire:click="$set('open', true)">
        Agregar cita
    </x-jet-secondary-button>
    <x-jet-dialog-modal wire:model="open">
        <x-slot name="title">
            Agregar Nueva Cita
        </x-slot>
        <x-slot name="content">
            <div>        
                <div class="mb-4">
                    <x-jet-label value="Fecha de la Cita"/>
                    <x-jet-input type="date" min="{{ date('Y-m-d', time()) }}" required class="w-full" wire:model="fecha"/>
                    <x-jet-input-error for="fecha"/>
                </div>
                <div class="mb-4">
                    <x-jet-label value="Hora de la Cita"/>
                    <x-jet-input type="time" min="{{ date('H:i:s', time()); }}" required class="w-full" wire:model="tiempo"/>
                    <x-jet-input-error for="tiempo"/>
                </div>
                <div class="mb-4">
                    <x-jet-label value="Estatus de la Cita"/>
                    <select wire:model="statu_id" required class="w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm">
                        <option value="">Seleccione un estatus</option>
                        @foreach ($status as $statu)
                            <option value="{{$statu->id}}">{{$statu->nombre}}</option>
                        @endforeach
                    </select>
                    <x-jet-input-error for="statu_id"/>
                </div>
                <div class="mb-4">
                    <x-jet-label value="Descripción de la Cita"/>
                    <textarea rows="6" required wire:model="descripcion" class="block w-full h-40 text-gray-700 bg-white border border-gray-300 rounded-md dark:bg-gray-800 dark:text-gray-300 dark:border-gray-600 focus:border-blue-500 dark:focus:border-blue-500 focus:outline-none focus:ring"></textarea>
                    <x-jet-input-error for="descripcion"/>
                </div>
            </div>
        </x-slot>
        <x-slot name="footer">
            <x-jet-secondary-button wire:click="$set('open', false)">
                Cancelar
            </x-jet-secondary-button>
            <x-jet-secondary-button wire:click="save" wire:loading.attr="disabled" wire:target="save" class="disabled:opacity-25">
                Agregar
            </x-jet-secondary-button>
        </x-slot>
    </x-jet-dialog-modal>
</div>
