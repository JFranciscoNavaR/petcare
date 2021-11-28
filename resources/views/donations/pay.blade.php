<x-app-layout>
    <div class="py-12 grid grid-cols-12 gap-6 max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="col-span-7">
            <article class="rounded overflow-hidden shadow-lg bg-white">
                <div class="px-6 py-4">
                    <div class="flex">
                        <img class="w-48 h-28 object-cover" src="{{ asset('img/logopetcare.jpeg') }}" alt="">
                        <div class="ml-4 flex justify-between items-center self-start flex-1">
                            <h1 class="text-gray-500 font-bold text-lg uppercase">{{$donation->nombre}}</h1>
                            <p class="font-bold text-gray-500">$ {{$donation->monto}} MXN</p>
                        </div>
                    </div>
                    <hr class="mt-4 mb-4">
                    <p class="text-sm text-gray-500">{{ Str::limit($donation->descripcion, 100) }}. <a href="" class="text-indigo-500 font-bold">Terminos y Condiciones</a></p>
                </div>
            </article>
        </div>
        <div class="col-span-5">
            @livewire('donation-pay', ['donation' => $donation])
        </div>
    </div>
</x-app-layout>