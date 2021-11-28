<div>
    <div class="relative rounded overflow-hidden shadow-lg bg-white">
        <div wire:loading.flex class="absolute w-full h-full bg-gray-100 bg-opacity-25 z-30 items-center justify-center">
            <x-spinner size="20" />
        </div>

        <div class="px-6 py-4">
            <div class="flex justify-between items-center mb-4">
                <h1 class="text-lg font-bold text-gray-700">Método de pago</h1>
                <img class="h-8" src="https://leadershipmemphis.org/wp-content/uploads/2020/08/780370.png" alt="">
            </div>
            <form action="" id="card-form">
                <div class="mb-6">
                    <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2">Nombre de la tarjeta</label>
                    <input required class="appearance-none block w-full bg-gray-100 text-gray-700 border border-gray-100 rounded py-3 px-4 leading-tight focus: outline-none focus:bg-white focus:border-gray-400" id="card-holder-name" type="text" placeholder="Ingrese el nombre del titular de la tarjeta">
                </div>
                <div class="mb-6">
                    <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2">Número de tarjeta</label>
                    <div required class="appearance-none block w-full bg-gray-100 text-gray-700 border border-gray-100 rounded py-3 px-4 leading-tight focus: outline-none focus:bg-white focus:border-gray-400" id="card-element">
                    </div>
                    <span class="text-red-500 text-xs italic" id="card-error"></span>
                </div>
                <button class="font-bold py-2 px-4 rounded bg-indigo-500 text-white" id="card-button">
                    Procesar Pago
                </button>
            </form>
        </div>
    </div>
    @slot('js')
    <script>
        document.addEventListener('livewire:load', function(){
            stripe();
        });
        Livewire.on('resetStripe', function(){
            document.getElementById('card-form').reset();
            stripe();

            alert('La compra se realizo con exito');
        });

        Livewire.on('errorPayment', function(){
            document.getElementById('card-form').reset();
            stripe();

            alert('Hubo un error en la compra intentelo de nuevo');
        })
    </script>
    <script>
        function stripe(){
            const stripe = Stripe("{{ env('STRIPE_KEY') }}");
        
            const elements = stripe.elements();
            const cardElement = elements.create('card');
        
            cardElement.mount('#card-element');

            //token metodo de pago
            const cardHolderName = document.getElementById('card-holder-name');
            const cardButton = document.getElementById('card-button');
            const cardForm = document.getElementById('card-form');

            cardForm.addEventListener('submit', async (e) => {
                e.preventDefault();
                const { paymentMethod, error } = await stripe.createPaymentMethod(
                    'card', cardElement, {
                        billing_details: { name: cardHolderName.value }
                    }
                );

                if (error) {
                    document.getElementById('card-error').textContent = error.message;
                } else {
                    Livewire.emit('paymentMethodCreate', paymentMethod.id);
                }
            });
        }
    </script>
    @endslot
</div>