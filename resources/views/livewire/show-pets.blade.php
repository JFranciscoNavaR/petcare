@section('titulo')
    {{$titulo}}
@endsection
<div wire:init="loadPets">
    <div class="max-w-full mx-auto sm:px-6 lg:px-8 py-12">
        <!-- This example requires Tailwind CSS v2.0+ -->
        <x-table>
            <div class="px-6 py-4 flex items-center">
                <div class="flex items-center">
                    <span>Mostrar</span>
                    <select wire:model="cantidad" class="ml-2 mr-2 border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm">
                        <option value="5">5</option>
                        <option value="10">10</option>
                        <option value="25">25</option>
                        <option value="50">50</option>
                        <option value="100">100</option>
                    </select>
                    <span>mascotas</span>
                </div>
                <x-jet-input class="flex-1 ml-4 mr-4" placeholder="Buscar" type="text" wire:model="search" />
                @livewire('create-pet')
            </div>
            @if (count($pets))
                <table class="min-w-full divide-y divide-gray-200">
                    <thead class="bg-gray-50">
                        <tr>
                            <th scope="col"
                                class="w-24 cursor-pointer px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider"
                                wire:click="order('id')">
                                Id
                                @if ($sort == 'id')
                                    @if ($direction == 'asc')
                                        <i class="fas fa-sort-alpha-up-alt float-right mt-1"></i>
                                    @else
                                        <i class="fas fa-sort-alpha-down-alt float-right mt-1"></i>
                                    @endif
                                @else
                                    <i class="fas fa-sort float-right mt-1"></i>
                                @endif
                            </th>
                            <th scope="col"
                                class="cursor-pointer px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider"
                                wire:click="order('image')">
                                Imagen
                                @if ($sort == 'image')
                                    @if ($direction == 'asc')
                                        <i class="fas fa-sort-alpha-up-alt float-right mt-1"></i>
                                    @else
                                        <i class="fas fa-sort-alpha-down-alt float-right mt-1"></i>
                                    @endif
                                @else
                                    <i class="fas fa-sort float-right mt-1"></i>
                                @endif
                            </th>
                            <th scope="col"
                                class="cursor-pointer px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider"
                                wire:click="order('nombre')">
                                Nombre
                                @if ($sort == 'nombre')
                                    @if ($direction == 'asc')
                                        <i class="fas fa-sort-alpha-up-alt float-right mt-1"></i>
                                    @else
                                        <i class="fas fa-sort-alpha-down-alt float-right mt-1"></i>
                                    @endif
                                @else
                                    <i class="fas fa-sort float-right mt-1"></i>
                                @endif
                            </th>
                            <th scope="col"
                                class="cursor-pointer px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider"
                                wire:click="order('edad')">
                                Edad
                                @if ($sort == 'edad')
                                    @if ($direction == 'asc')
                                        <i class="fas fa-sort-alpha-up-alt float-right mt-1"></i>
                                    @else
                                        <i class="fas fa-sort-alpha-down-alt float-right mt-1"></i>
                                    @endif
                                @else
                                    <i class="fas fa-sort float-right mt-1"></i>
                                @endif
                            </th>
                            <th scope="col"
                                class="cursor-pointer px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider"
                                wire:click="order('sexo')">
                                Sexo
                                @if ($sort == 'sexo')
                                    @if ($direction == 'asc')
                                        <i class="fas fa-sort-alpha-up-alt float-right mt-1"></i>
                                    @else
                                        <i class="fas fa-sort-alpha-down-alt float-right mt-1"></i>
                                    @endif
                                @else
                                    <i class="fas fa-sort float-right mt-1"></i>
                                @endif
                            </th>
                            <th scope="col"
                                class="cursor-pointer px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider"
                                wire:click="order('peso')">
                                Peso
                                @if ($sort == 'peso')
                                    @if ($direction == 'asc')
                                        <i class="fas fa-sort-alpha-up-alt float-right mt-1"></i>
                                    @else
                                        <i class="fas fa-sort-alpha-down-alt float-right mt-1"></i>
                                    @endif
                                @else
                                    <i class="fas fa-sort float-right mt-1"></i>
                                @endif
                            </th>
                            <th scope="col"
                                class="cursor-pointer px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider"
                                wire:click="order('color')">
                                Color
                                @if ($sort == 'color')
                                    @if ($direction == 'asc')
                                        <i class="fas fa-sort-alpha-up-alt float-right mt-1"></i>
                                    @else
                                        <i class="fas fa-sort-alpha-down-alt float-right mt-1"></i>
                                    @endif
                                @else
                                    <i class="fas fa-sort float-right mt-1"></i>
                                @endif
                            </th>
                            <th scope="col"
                                class="cursor-pointer px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider" 
                                wire:click="order('raza')">
                                Raza
                                @if ($sort == 'raza')
                                    @if ($direction == 'asc')
                                        <i class="fas fa-sort-alpha-up-alt float-right mt-1"></i>
                                    @else
                                        <i class="fas fa-sort-alpha-down-alt float-right mt-1"></i>
                                    @endif
                                @else
                                    <i class="fas fa-sort float-right mt-1"></i>
                                @endif
                            </th>
                            <th scope="col"
                                class="cursor-pointer px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider"
                                wire:click="order('especie')">
                                Especie
                                @if ($sort == 'especie')
                                    @if ($direction == 'asc')
                                        <i class="fas fa-sort-alpha-up-alt float-right mt-1"></i>
                                    @else
                                        <i class="fas fa-sort-alpha-down-alt float-right mt-1"></i>
                                    @endif
                                @else
                                    <i class="fas fa-sort float-right mt-1"></i>
                                @endif
                            </th>
                            <th scope="col"
                                class="cursor-pointer px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider"
                                wire:click="order('type_id')">
                                Tipo
                                @if ($sort == 'type_id')
                                    @if ($direction == 'asc')
                                        <i class="fas fa-sort-alpha-up-alt float-right mt-1"></i>
                                    @else
                                        <i class="fas fa-sort-alpha-down-alt float-right mt-1"></i>
                                    @endif
                                @else
                                    <i class="fas fa-sort float-right mt-1"></i>
                                @endif
                            </th>
                            <th scope="col"
                                class="cursor-pointer px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider"
                                wire:click="order('statu_id')">
                                Estatus
                                @if ($sort == 'statu_id')
                                    @if ($direction == 'asc')
                                        <i class="fas fa-sort-alpha-up-alt float-right mt-1"></i>
                                    @else
                                        <i class="fas fa-sort-alpha-down-alt float-right mt-1"></i>
                                    @endif
                                @else
                                    <i class="fas fa-sort float-right mt-1"></i>
                                @endif
                            </th>
                            <th scope="col"
                                class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider"
                                wire:click="order('descripcion')">
                                Descripción
                                @if ($sort == 'descripcion')
                                    @if ($direction == 'asc')
                                        <i class="fas fa-sort-alpha-up-alt float-right mt-1"></i>
                                    @else
                                        <i class="fas fa-sort-alpha-down-alt float-right mt-1"></i>
                                    @endif
                                @else
                                    <i class="fas fa-sort float-right mt-1"></i>
                                @endif
                            </th>
                            <th scope="col" class="relative px-6 py-3">
                                <span class="sr-only">Options</span>
                            </th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200">
                        @foreach ($pets as $item)
                            <tr>
                                <td class="px-6 py-4 text-sm text-gray-500">
                                    <div class="text-sm text-gray-900">
                                        {{ $item->id }}
                                    </div>
                                </td>
                                <td class="px-6 py-4 text-sm text-gray-500">
                                    <div class="text-sm text-gray-900">
                                        <img src="{{$item->image}}" class="w-10 h-10" atl="">
                                    </div>
                                </td>
                                <td class="px-6 py-4 text-sm text-gray-500">
                                    <div class="text-sm text-gray-900">
                                        {{ $item->nombre }}
                                    </div>
                                </td>
                                <td class="px-6 py-4 text-sm text-gray-500">
                                    <div class="text-sm text-gray-900">
                                        {{ $item->edad }} meses
                                    </div>
                                </td>
                                <td class="px-6 py-4 text-sm text-gray-500">
                                    <div class="text-sm text-gray-900">
                                        {{ $item->sexo }}
                                    </div>
                                </td>
                                <td class="px-6 py-4 text-sm text-gray-500">
                                    <div class="text-sm text-gray-900">
                                        {{ $item->peso }} kg
                                    </div>
                                </td>
                                <td class="px-6 py-4 text-sm text-gray-500">
                                    <div class="text-sm text-gray-900">
                                        {{ $item->color }}
                                    </div>
                                </td>
                                <td class="px-6 py-4 text-sm text-gray-500">
                                    <div class="text-sm text-gray-900">
                                        {{ $item->raza }}
                                    </div>
                                </td>
                                <td class="px-6 py-4 text-sm text-gray-500">
                                    <div class="text-sm text-gray-900">
                                        {{ $item->especie }}
                                    </div>
                                </td>
                                <td class="px-6 py-4 text-sm text-gray-500">
                                    <div class="text-sm text-gray-900">
                                        {{ $item->type->nombre }}
                                    </div>
                                </td>
                                <td class="px-6 py-4 text-sm text-gray-500">
                                    <div class="text-sm text-gray-900">
                                        {{ $item->statu->nombre }}
                                    </div>
                                </td>
                                <td class="px-6 py-4 text-sm text-gray-500">
                                    <div class="text-sm text-gray-900">
                                        {{ $item->descripcion }}
                                    </div>
                                </td>
                                @if (count($pets))
                                    <td class="px-6 py-4 text-sm font-medium flex">
                                        {{--@livewire('edit-pet', ['pet' => $pet], key($pet->id))--}}
                                        <a class="font-bold text-white py-2 px-4 rounded cursor-pointer bg-yellow-600 hover:bg-yellow-500" wire:click="edit({{$item}})">
                                            <i class="fas fa-edit"></i>    
                                        </a>
                                        <a class="ml-2 font-bold text-white py-2 px-4 rounded cursor-pointer bg-red-600 hover:bg-red-500" wire:click="$emit('alert_delete_pet', {{$item->id}})">
                                            <i class="fas fa-trash"></i>
                                        </a>
                                    </td>
                                @endif
                            </tr>
                        @endforeach
                        <!-- More people... -->
                    </tbody>
                </table>
                @if ($pets->hasPages())
                    <div class="px-6 py-3">
                        {{$pets->links()}}
                    </div>
                @endif
            @else
                <div class="px-6 py-4" wire:loading.remove>
                    No se ha encontrado ningún registro.
                </div>      
            @endif
        </x-table>
    </div>
    <x-jet-dialog-modal wire:model="open_edit">
        <x-slot name="title">
            Editar Mascota
        </x-slot>
        <x-slot name="content">
            <div>        
                <div class="mb-4">
                    <x-jet-label value="Nombre de la Mascota"/>
                    <x-jet-input type="text" required class="w-full" wire:model="pet.nombre"/>
                    <x-jet-input-error for="pet.nombre"/>
                </div>
                <div class="mb-4">
                    <x-jet-label value="Edad (meses) de la Mascota"/>
                    <x-jet-input type="number" required class="w-full" wire:model="pet.edad"/>
                    <x-jet-input-error for="pet.edad"/>
                </div>
                <div class="mb-4">
                    <x-jet-label value="Sexo de la Mascota"/>
                    <select wire:model="pet.sexo" required class="w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm">
                        <option value="">Seleccione un sexo</option>
                        <option value="Hembra">Hembra</option>
                        <option value="Macho">Macho</option>
                    </select>
                    <x-jet-input-error for="pet.sexo"/>
                </div>
                <div class="mb-4">
                    <x-jet-label value="Peso (Kg) de la Mascota"/>
                    <x-jet-input type="number" required class="w-full" wire:model="pet.peso"/>
                    <x-jet-input-error for="pet.peso"/>
                </div>
                <div class="mb-4">
                    <x-jet-label value="Color de la Mascota"/>
                    <x-jet-input type="text" required class="w-full" wire:model="pet.color"/>
                    <x-jet-input-error for="pet.color"/>
                </div>
                <div class="mb-4">
                    <x-jet-label value="Raza de la Mascota"/>
                    <x-jet-input type="text" required class="w-full" wire:model="pet.raza"/>
                    <x-jet-input-error for="pet.raza"/>
                </div>
                <div class="mb-4">
                    <x-jet-label value="Especie de la Mascota"/>
                    <x-jet-input type="text" required class="w-full" wire:model="pet.especie"/>
                    <x-jet-input-error for="pet.especie"/>
                </div>
                <div class="mb-4">
                    <x-jet-label value="Tipo de la Mascota"/>
                    <select wire:model="pet.type_id" required class="w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm">
                        <option value="">Seleccione un tipo</option>
                        @foreach ($types as $type)
                            <option value="{{$type->id}}">{{$type->nombre}}</option>
                        @endforeach
                    </select>
                    <x-jet-input-error for="pet.type_id"/>
                </div>
                <div class="mb-4">
                    <x-jet-label value="Estatus de la Mascota"/>
                    <select wire:model="pet.statu_id" required class="w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm">
                        <option value="">Seleccione un estatus</option>
                        @foreach ($status as $statu)
                            <option value="{{$statu->id}}">{{$statu->nombre}}</option>
                        @endforeach
                    </select>
                    <x-jet-input-error for="pet.statu_id"/>
                </div>
                <div class="mb-4">
                    <x-jet-label value="Descripción de la Mascota"/>
                    <textarea rows="6" required wire:model="pet.descripcion" class="block w-full h-40 text-gray-700 bg-white border border-gray-300 rounded-md dark:bg-gray-800 dark:text-gray-300 dark:border-gray-600 focus:border-blue-500 dark:focus:border-blue-500 focus:outline-none focus:ring"></textarea>
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
            </div>
        </x-slot>
        <x-slot name="footer">
            <x-jet-danger-button wire:click="$set('open_edit', false)">
                Cancelar
            </x-jet-danger-button>
            <x-jet-button wire:click="update" wire:loading.attr="disabled" wire:target="save, image" class="disabled:opacity-25">
                Actualizar
            </x-jet-button>
        </x-slot>
    </x-jet-dialog-modal>
    @push('js')
        <script src="sweetalert2.all.min.js"></script>
    @endpush
</div>
