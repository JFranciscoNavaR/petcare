<div>
    <x-jet-secondary-button wire:click="$set('open', true)">
        Agregar estatu
    </x-jet-secondary-button>
    <x-jet-dialog-modal wire:model="open">
        <x-slot name="title">
            Agregar Nuevo Estatu
        </x-slot>
        <x-slot name="content">
            <div class="mb-4">
                <x-jet-label value="Nombre del Estatu"/>
                <x-jet-input type="text" required class="w-full" wire:model="nombre"/>
                <x-jet-input-error for="nombre"/>
            </div>
            <div class="mb-4">
                <x-jet-label value="Descripción del Estatu"/>
                <textarea rows="6" required wire:model="descripcion" class="block w-full h-40 text-gray-700 bg-white border border-gray-300 rounded-md dark:bg-gray-800 dark:text-gray-300 dark:border-gray-600 focus:border-blue-500 dark:focus:border-blue-500 focus:outline-none focus:ring"></textarea>
                <x-jet-input-error for="descripcion"/>
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