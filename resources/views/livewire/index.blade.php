@section('titulo')
    {{ $titulo }}
@endsection

<div wire:init="loadPets">
    <div class="max-w-full mx-auto sm:px-6 lg:px-8">
        <header class="w-screen">
            <div class="container col-md-12">
                <div class="text-center text-white">
                    <div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel">
                        <div class="carousel-inner w-screen">
                            <div class="carousel-item active">
                                <img src="img/q.jpeg" class="d-block w-100 imgc" alt="...">
                            </div>
                            <div class="carousel-item">
                                <img src="img/progat.jpeg" class="d-block w-100 imgc" alt="...">
                            </div>
                            <div class="carousel-item">
                                <img src="img/g.jpeg" class="d-block w-100 imgc" alt="...">
                            </div>
                        </div>
                        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls"
                            data-bs-slide="prev">
                            <span class="carousel-control-prev-icon bg-gray-500" aria-hidden="true"></span>
                            <span class="visually-hidden">Previous</span>
                        </button>
                        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls"
                            data-bs-slide="next">
                            <span class="carousel-control-next-icon bg-gray-500" aria-hidden="true"></span>
                            <span class="visually-hidden">Next</span>
                        </button>
                    </div>
                </div>
            </div>
        </header>
        <br>
        @if (count($pets))
        <div class="px-6 py-4 flex items-center overflow-hidde sm:rounded-lg">
            <div class="flex items-center">
                <span>Mostrar</span>
                <select wire:model="cantidad"
                    class="ml-2 mr-2 border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm">
                    <option value="4">4</option>
                    <option value="8">8</option>
                    <option value="20">20</option>
                    <option value="40">40</option>
                    <option value="100">100</option>
                </select>
                <span>mascotas</span>
            </div>
            <x-jet-input class="flex-1 ml-4 mr-4" placeholder="Buscar" type="text" wire:model="search" />
        </div>
            <section class="py-5">
                <div class="container px-4 px-lg-5 mt-1">
                    <div class="row gx-4 gx-lg-5 row-cols-2 row-cols-md-3 row-cols-xl-4 justify-items-start">
                        @foreach ($pets as $item)
                            <div class="col mb-5 w-screen">
                                <div class="card h-100">
                                    <img class="card-img-top imgcard" src="{{ $item->image }}"
                                        alt="{{ $item->nombre }}" />
                                    <div class="card-body">
                                        <div class="text-center">
                                            <h5 class="fw-bolder">{{ $item->nombre }}</h5>
                                            <div class="input-group text-left">
                                                <h6>Edad: {{ $item->edad }}</h6>
                                            </div>
                                            <div class="input-group text-left">
                                                <h6>Sexo: {{ $item->sexo }}</h6>
                                            </div>
                                            <div class="input-group text-left">
                                                <h6>Estatus: {{ $item->statu->nombre }}</h6>
                                            </div>
                                            <div class="input-group text-left">
                                                <h6>Descripción: {{ Str::limit($item->descripcion, 100) }}</h6>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Product actions-->
                                    <div class="card-footer p-4 pt-0 border-top-0 bg-transparent">
                                        <div class="text-center">
                                            {{--<a class="btn btn-outline-dark mt-auto" wire:click="show({{$item}})">
                                                Ver más
                                            </a>--}}
                                            <a class="font-bold text-white py-2 px-4 rounded cursor-pointer bg-blue-600 hover:bg-blue-500" wire:click="show({{$item}})">
                                                Ver más
                                                <i class="fas fa-eye"></i>    
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </section>

            <div class="px-6 py-3">
                {{$pets->links()}}
            </div>
        @endif
    </div>
    <footer class="py-5 bg-dark w-full">
        <div class="container">
            <p class="m-0 text-center text-white">Copyright &copy; PetCare 2021</p>
        </div>
    </footer>
    <x-jet-dialog-modal wire:model="open_show">
        <x-slot name="title">
            Información de la Mascota
        </x-slot>
        <x-slot name="content">
            <div class="max-w-sm rounded bg-gray-400 overflow-hidden">
                <img class="w-full mx-auto" src="{{$pet->image}}" alt="">
                <div class="px-6 py-4">
                    <div class="text-center font-bold text-xl mb-2">
                        {{$pet->nombre}}
                    </div>
                </div>
                <div class="flex items-center justify-between px-4 py-2 bg-gray-900">
                    <div class="input-group text-left">
                        <h6>Edad: {{ $pet->edad }} meses</h6>
                    </div>
                    <div class="input-group text-left">
                        <h6>Sexo: {{ $pet->sexo }}</h6>
                    </div>
                </div>
                <div class="flex items-center justify-between px-4 py-2 bg-gray-900">
                    <div class="input-group text-left">
                        <h6>Peso: {{ $pet->peso }} Kg</h6>
                    </div>
                    <div class="input-group text-left">
                        <h6>Color: {{ $pet->color }}</h6>
                    </div>
                </div>
                <div class="flex items-center justify-between px-4 py-2 bg-gray-900">
                    <div class="input-group text-left">
                        <h6>Raza: {{ $pet->raza }}</h6>
                    </div>
                    <div class="input-group text-left">
                        <h6>Especie: {{ $pet->especie }}</h6>
                    </div>
                </div>
                <div class="flex items-center justify-between px-4 py-2 bg-gray-900">
                    <div class="input-group text-left"> 
                            @if ($pet->type_id == 1)
                                <h6>Tipo: Gato</h6>
                            @else
                                <h6>Tipo: Perro</h6>
                            @endif
                    </div>
                    <div class="input-group text-left">
                        <h6>Estatus: Disponible</h6>
                    </div>
                </div>
                <div class="px-4 py-2 input-group text-justify">
                    <h6>Descripción: {{ Str::limit($pet->descripcion, 100) }}</h6>
                </div>
              </div>
        </x-slot>
        <x-slot name="footer">
            <x-jet-danger-button wire:click="$set('open_show', false)">
                Cerrar
            </x-jet-danger-button>
        </x-slot>
    </x-jet-dialog-modal>
    @push('js')
        <script src="sweetalert2.all.min.js"></script>
    @endpush
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="js/scripts.js"></script>
</div>