@section('titulo')
    {{ $titulo }}
@endsection

<div wire:init="loadDonations">
    <div class="max-w-full mx-auto sm:px-6 lg:px-8">
        @if (count($donations))
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
                <span>donaciones</span>
            </div>
            <x-jet-input class="flex-1 ml-4 mr-4" placeholder="Buscar" type="text" wire:model="search" />
        </div>
            <section class="py-5">
                <div class="container px-4 px-lg-5 mt-1">
                    <div class="row gx-4 gx-lg-5 row-cols-2 row-cols-md-3 row-cols-xl-4 justify-items-start">
                        @foreach ($donations as $item)
                            <div class="col mb-5 w-screen">
                                <div class="card h-100">
                                    <div class="card-body">
                                        <div class="overflow-hidden rounded-lg dark:bg-gray-800">
                                            <div class="px-2 py-2">
                                                <h6 class="font-bold text-gray-800 uppercase dark:text-white">{{ $item->nombre }}</h1>
                                                <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">{{ Str::limit($item->descripcion, 100) }}</p>
                                            </div>
                                            <img class="object-cover" src="{{ asset('img/logopetcare.jpeg') }}" alt="{{ $item->nombre }}">
                                        </div>
                                    </div>
                                    <!-- Product actions-->
                                    <div class="card-footer p-4 pt-0 border-top-0 bg-transparent">
                                        <div class="text-center">
                                            <div class="flex items-center justify-between px-2 py-2 bg-gray-900">
                                                <h1 class="text-lg font-bold">$ {{ $item->monto }} MXN</h1>
                                                <a class="font-bold text-white py-2 px-4 rounded cursor-pointer bg-blue-600 hover:bg-blue-500" href="{{ route('donation.pay', $item) }}">
                                                    Donar    
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </section>

            <div class="px-6 py-3">
                {{$donations->links()}}
            </div>
        @endif
    </div>
    <footer class="py-5 bg-dark w-full">
        <div class="container">
            <p class="m-0 text-center text-white">Copyright &copy; PetCare 2021</p>
        </div>
    </footer>
    @push('js')
        <script src="sweetalert2.all.min.js"></script>
    @endpush
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="js/scripts.js"></script>
</div>
