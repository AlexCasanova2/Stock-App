<div class="bg-gray-100 py-10">
    <h2 class="text-2xl md:text-4xl text-gray-600 text-center font-extrabold my-5">Buscar i filtrar elements</h2>

    <div class="max-w-7xl mx-auto">
        <form wire:submit.prevent="leerDatosFormulario">
            <div class="md:grid md:grid-cols-3 gap-5">
                <div class="mb-5">
                    <label 
                        class="block mb-1 text-sm text-gray-700 uppercase font-bold "
                        for="termino">Terme de cerca
                    </label>
                    <input 
                        id="termino"
                        type="text"
                        placeholder="Buscar por terme: ej. Cursa nocturna"
                        class="rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 w-full"
                        wire:model="terme"
                    />
                </div>

                <div class="mb-5">
                    <label class="block mb-1 text-sm text-gray-700 uppercase font-bold">Client</label>
                    <select wire:model="client" class="border-gray-300 p-2 w-full">
                        <option>Selecciona</option>
            
                        @foreach ($clients as $client )
                            <option value="{{ $client->id }}">{{ $client->name }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="mb-5">
                    <label class="block mb-1 text-sm text-gray-700 uppercase font-bold">Proveidor</label>
                    <select wire:model="proveidor" class="border-gray-300 p-2 w-full">
                        <option>Selecciona</option>
                        @foreach ($proveidors as $proveidor)
                            <option value="{{ $proveidor->id }}">{{$proveidor->name}}</option>
                        @endforeach
                    </select>
                </div>
            </div>

            <div class="flex justify-end">
                <input 
                    type="submit"
                    class="bg-indigo-500 hover:bg-indigo-600 transition-colors text-white text-sm font-bold px-10 py-2 rounded cursor-pointer uppercase w-full md:w-auto"
                    value="Buscar"
                />
            </div>
        </form>
    </div>
</div>