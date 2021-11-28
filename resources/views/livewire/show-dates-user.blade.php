@section('titulo')
    {{$titulo}}
@endsection
<div wire:init="loadPets">
    <div class="max-w-full mx-auto sm:px-6 lg:px-8 py-12">
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
                    <span>citas</span>
                </div>
                <x-jet-input class="flex-1 ml-4 mr-4" placeholder="Buscar" type="text" wire:model="search" />
                @livewire('create-date-user')
            </div>
            @if (count($dates))
                <table class="min-w-full divide-y divide-gray-200">
                    <thead class="bg-gray-50">
                        <tr>
                            <th scope="col" colspan="8" class="border-b w-1/4 px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase tracking-wider">
                                @foreach ($dates as $item)
                                    @if ($loop->first)
                                        Citas de {{ $item->user->name }}
                                    @endif
                                @endforeach
                            </th>
                        </tr>
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
                                wire:click="order('fecha')">
                                Fecha
                                @if ($sort == 'tiempo')
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
                                wire:click="order('tiempo')">
                                Hora
                                @if ($sort == 'tiempo')
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
                        @foreach ($dates as $item)
                            <tr>
                                <td class="px-6 py-4 text-sm text-gray-500">
                                    <div class="text-sm text-gray-900">
                                        {{ $item->id }}
                                    </div>
                                </td>
                                <td class="px-6 py-4 text-sm text-gray-500">
                                    <div class="text-sm text-gray-900">
                                        {{ $item->fecha }}
                                    </div>
                                </td>
                                <td class="px-6 py-4 text-sm text-gray-500">
                                    <div class="text-sm text-gray-900">
                                        {{ $item->tiempo }}
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
                                @if (count($dates))
                                    <td class="px-6 py-4 text-sm font-medium flex">
                                        {{--@livewire('edit-pet', ['pet' => $pet], key($pet->id))--}}
                                        <a class="font-bold text-white py-2 px-4 rounded cursor-pointer bg-blue-600 hover:bg-blue-500" wire:click="show({{$item}})">
                                            Ver Cita
                                            <i class="fas fa-eye"></i>    
                                        </a>
                                    </td>
                                @endif
                            </tr>
                        @endforeach
                        <!-- More people... -->
                    </tbody>
                </table>
                @if ($dates->hasPages())
                    <div class="px-6 py-3">
                        {{$dates->links()}}
                    </div>
                @endif
            @else
                <div class="px-6 py-4" wire:loading.remove>
                    Aún no has agendado una cita.
                </div>      
            @endif
        </x-table>
    </div>
    <x-jet-dialog-modal wire:model="open_show">
        <x-slot name="title">
            Ver Fecha
        </x-slot>
        <x-slot name="content">
            <div>        
                <div class="mb-4">
                    <x-jet-label value="Fecha de la Cita"/>
                    <x-jet-input type="date" disable required class="w-full" wire:model="date.fecha"/>
                    <x-jet-input-error for="date.fecha"/>
                </div>
                <div class="mb-4">
                    <x-jet-label value="Hora de la Cita"/>
                    <x-jet-input type="time" disable required class="w-full" wire:model="date.tiempo"/>
                    <x-jet-input-error for="date.tiempo"/>
                </div>
                <div class="mb-4">
                    <x-jet-label value="Estatus de la Cita"/>
                    <select wire:model="date.statu_id" disable required class="w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm">
                        <option value="">Seleccione un estatus</option>
                        @foreach ($status as $statu)
                            <option value="{{$statu->id}}">{{$statu->nombre}}</option>
                        @endforeach
                    </select>
                    <x-jet-input-error for="date.statu_id"/>
                </div>
                <div class="mb-4">
                    <x-jet-label value="Descripción de la Cita"/>
                    <textarea rows="6" required disable wire:model="date.descripcion" class="block w-full h-40 text-gray-700 bg-white border border-gray-300 rounded-md dark:bg-gray-800 dark:text-gray-300 dark:border-gray-600 focus:border-blue-500 dark:focus:border-blue-500 focus:outline-none focus:ring"></textarea>
                    <x-jet-input-error for="date.descripcion"/>
                </div>
            </div>
        </x-slot>
        <x-slot name="footer">
            <x-jet-secondary-button wire:click="$set('open_show', false)">
                Cerrar
            </x-jet-secondary-button>
        </x-slot>
    </x-jet-dialog-modal>
    @push('js')
        <script src="sweetalert2.all.min.js"></script>
    @endpush
</div>
