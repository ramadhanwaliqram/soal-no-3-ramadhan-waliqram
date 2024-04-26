<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800">
            {{ __('Create Product') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
            <div class="overflow-hidden bg-white shadow-sm sm:rounded-lg">
                <div class="overflow-hidden overflow-x-auto border-b border-gray-200 bg-white p-6">
                    <form action="{{ route('product.update', $product) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        <div class="mt-4">
                            <x-input-label for="product_code" value="Product Code" />
                            <x-text-input id="product_code" name="product_code"
                                value="{{ old('product_code', $product->product_code) }}" type="text"
                                class="block mt-1 w-full" />
                            <x-input-error :messages="$errors->get('product_code')" class="mt-2" />
                        </div>
                        <div class="mt-4">
                            <x-input-label for="name" value="Name" />
                            <x-text-input id="name" name="name" value="{{ old('name', $product->name) }}"
                                type="text" class="block mt-1 w-full" />
                            <x-input-error :messages="$errors->get('name')" class="mt-2" />
                        </div>
                        <div class="mt-4">
                            <x-input-label for="category" value="Category" />
                            <select name="category" id="category"
                                class="border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm block mt-1 w-full">
                                <option value="">--- {{ __('Choose Category') }} ---</option>
                                <option value="tas" @if ($product->category == 'tas') selected @endif>Tas</option>
                                <option value="pakaian" @if ($product->category == 'pakaian') selected @endif>Pakaian
                                </option>
                                <option value="sepatu" @if ($product->category == 'sepatu') selected @endif>Sepatu</option>
                            </select>
                            <x-input-error :messages="$errors->get('category')" class="mt-2" />
                        </div>
                        <div class="mt-4">
                            <x-input-label for="stock" value="Stock" />
                            <x-text-input id="stock" name="stock" value="{{ old('stock', $product->stock) }}"
                                type="number" class="block mt-1 w-full" />
                            <x-input-error :messages="$errors->get('stock')" class="mt-2" />
                        </div>
                        <div class="mt-4">
                            <x-input-label for="price" value="Price" />
                            <x-text-input id="price" name="price" value="{{ old('price', $product->price) }}"
                                type="number" class="block mt-1 w-full" />
                            <x-input-error :messages="$errors->get('price')" class="mt-2" />
                        </div>
                        <div class="mt-4">
                            <x-input-label for="image" value="Image" />
                            <input id="image" name="image" value="{{ old('image', $product->image) }}"
                                type="file" class=" mt-1" />
                            <x-input-error :messages="$errors->get('image')" class="mt-2" />
                        </div>

                        <div class="mt-4">
                            <x-primary-button>
                                Save
                            </x-primary-button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
