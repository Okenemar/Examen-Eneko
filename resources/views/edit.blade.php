<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Editar Manzana') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <form action="{{ route('manzanas.actualizar', ['manzana' => $manzana]) }}" method="post">
                        @csrf
                        @method('PUT')

                        <div class="mb-4">
                            <input type="hidden" name="manzana_id" value="{{ $manzana->id }}">

                            <label for="tipoManzana"
                                class="block text-sm font-medium text-gray-700 dark:text-gray-300">Tipo Manzana:</label>
                            <input type="text" name="tipoManzana" id="tipoManzana" value="{{ $manzana-> tipoManzana }}"
                                required
                                class="mt-1 p-2 w-full border rounded-md focus:outline-none focus:border-indigo-500 dark:bg-gray-700 dark:border-gray-600 dark:text-white">
                            <label for="precioKilo"
                                class="block text-sm font-medium text-gray-700 dark:text-gray-300">Precio Kilo:</label>
                            <input type="text" name="precioKilo" id="precioKilo" value="{{ $manzana-> precioKilo }}" required
                                class="mt-1 p-2 w-full border rounded-md focus:outline-none focus:border-indigo-500 dark:bg-gray-700 dark:border-gray-600 dark:text-white">
                        </div>

                        <!-- Otros campos del formulario según sea necesario -->

                        <div class="mb-4">
                            <button type="submit"
                                class="py-2 px-4 bg-indigo-500 hover:bg-indigo-600 text-white rounded-md focus:outline-none focus:border-indigo-700 focus:ring focus:ring-indigo-200">
                                Actualizar
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>