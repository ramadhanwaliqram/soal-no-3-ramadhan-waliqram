<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800">
            {{ __('Product') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="mx-auto flex  justify-center max-w-7xl sm:px-6 lg:px-8">
            <div class="overflow-hidden bg-white shadow-sm sm:rounded-lg">
                <div class="overflow-hidden overflow-x-auto border-b border-gray-200 bg-white p-6">

                    <a href="{{ route('product.create') }}"
                        class="mb-4 inline-flex items-center rounded-md border border-gray-300 bg-white px-4 py-2 text-xs font-semibold uppercase tracking-widest text-gray-700 shadow-sm transition duration-150 ease-in-out hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 disabled:opacity-25">
                        Add DATA
                    </a>

                    <div class="flex flex-col">
                        <div class="overflow-x-auto sm:-mx-6 lg:-mx-8">
                            <div class="inline-block min-w-full py-2 sm:px-6 lg:px-8">
                                <div class="overflow-hidden">
                                    <table class="min-w-full text-left text-sm font-light text-surface dark:text-dark">
                                        <thead class="border-b border-neutral-200 font-medium dark:border-white/10">
                                            <tr>
                                                <th class="bg-gray-50 px-6 py-3 text-left">#</th>
                                                <th class="bg-gray-50 px-6 py-3 text-left">{{ __('Product Code') }}</th>
                                                <th class="bg-gray-50 px-6 py-3 text-left">{{ __('Name') }}</th>
                                                <th class="bg-gray-50 px-6 py-3 text-left">{{ __('Stock') }}</th>
                                                <th class="bg-gray-50 px-6 py-3 text-left">{{ __('Price') }}</th>
                                                <th class="bg-gray-50 px-6 py-3 text-left">{{ __('Image') }}</th>
                                                <th class="bg-gray-50 px-6 py-3 text-left">{{ __('Action') }}</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @if (!empty($products))
                                                @foreach ($products as $product)
                                                    <tr class="bg-white">
                                                        <td
                                                            class="px-6 py-4 text-sm leading-5 text-gray-900 whitespace-no-wrap">
                                                            {{ $loop->iteration }}
                                                        </td>
                                                        <td
                                                            class="px-6 py-4 text-sm leading-5 text-gray-900 whitespace-no-wrap">
                                                            {{ $product->product_code }}
                                                        </td>
                                                        <td
                                                            class="px-6 py-4 text-sm leading-5 text-gray-900 whitespace-no-wrap">
                                                            {{ $product->name }}
                                                        </td>
                                                        <td
                                                            class="px-6 py-4 text-sm leading-5 text-gray-900 whitespace-no-wrap">
                                                            {{ $product->stock }}
                                                        </td>
                                                        <td
                                                            class="px-6 py-4 text-sm leading-5 text-gray-900 whitespace-no-wrap">
                                                            {{ $product->price }}
                                                        </td>
                                                        <td
                                                            class="px-6 py-4 text-sm leading-5 text-gray-900 whitespace-no-wrap">
                                                            <img src="{{ Storage::url('images/product/' . $product->image) }}"
                                                                alt="" width="100">
                                                        </td>
                                                        <td
                                                            class="px-6 py-4 text-sm leading-5 text-gray-900 whitespace-no-wrap">
                                                            <a href="{{ route('product.edit', $product) }}"
                                                                class="inline-flex items-center rounded-md border border-gray-300 bg-white px-4 py-2 text-xs font-semibold uppercase tracking-widest text-gray-700 shadow-sm transition duration-150 ease-in-out hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 disabled:opacity-25">
                                                                Edit
                                                            </a>
                                                            <form action="{{ route('product.destroy', $product) }}"
                                                                method="POST"
                                                                onsubmit="return confirm('Are you sure?')"
                                                                style="display: inline-block;">
                                                                @csrf
                                                                @method('DELETE')
                                                                <x-danger-button>
                                                                    Delete
                                                                </x-danger-button>
                                                            </form>
                                                        </td>
                                                    </tr>
                                                @endforeach
                                            @else
                                                <tr>
                                                    <td colspan="7" class="text-center">No Data</td>
                                                </tr>
                                            @endif
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>

                    {{-- <div class="min-w-full align-middle">
                        <table class="min-w-full border divide-y divide-gray-200">
                            <thead>
                                <tr>
                                    <th class="bg-gray-50 px-6 py-3 text-left">#</th>
                                    <th class="bg-gray-50 px-6 py-3 text-left">{{ __('Product Code') }}</th>
                                    <th class="bg-gray-50 px-6 py-3 text-left">{{ __('Name') }}</th>
                                    <th class="bg-gray-50 px-6 py-3 text-left">{{ __('Stock') }}</th>
                                    <th class="bg-gray-50 px-6 py-3 text-left">{{ __('Price') }}</th>
                                    <th class="bg-gray-50 px-6 py-3 text-left">{{ __('Image') }}</th>
                                    <th class="bg-gray-50 px-6 py-3 text-left">{{ __('Action') }}</th>
                                </tr>
                            </thead>

                            <tbody class="bg-white divide-y divide-gray-200 divide-solid">

                            </tbody>
                        </table>
                    </div> --}}
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
