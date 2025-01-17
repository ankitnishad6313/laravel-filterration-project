<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Products') }}
        </h2>
    </x-slot>

    <div class="pt-10 pb-2">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <form action="" method="get">
                        <input type="text" class="form-input rounded-full px-4 py-3" placeholder="Enter Name" />

                        <select class="form-select rounded-full px-4 py-3">
                            <option value="">Select Category</option>
                            <option value=""></option>
                            <option value=""></option>
                            <option value=""></option>
                        </select>

                        <input type="checkbox" class="form-checkbox rounded text-pink-500" />
                    </form>
                </div>
            </div>
        </div>
    </div>

    <div class="pb-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    @if (session('status'))
                        <p x-data="{ show: true }" x-show="show" x-transition x-init="setTimeout(() => show = false, 5000)"
                            class="text-lg text-gray-900 dark:text-gray-100 mb-5">{{ __(session('status')) }}</p>
                    @endif

                    <table class="w-full text-left">
                        <thead>
                            <tr>
                                <th>Sr. No.</th>
                                <th>Image</th>
                                <th>Category Name</th>
                                <th>Product Name</th>
                                <th>Price</th>
                                <th>Discount</th>
                                <th>Status</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($products as $key => $product)
                                <tr>
                                    <th>{{ $products->firstItem() + $key }}</th>
                                    <td>
                                        <img src="{{ $product->image }}" alt="Product Image" height="50"
                                            width="100" />
                                    </td>
                                    <td>{{ $product->category->name }}</td>
                                    <td>{{ $product->name }}</td>
                                    <td>{{ $product->price }}</td>
                                    <td>{{ $product->discount }}%</td>
                                    <td>{{ $product->status }}</td>
                                    <td class="flex gap-4">
                                        <form method="post"
                                            action="{{ route('product.edit', ['id' => $product->id]) }}"
                                            class="mt-2 space-y-6">
                                            @csrf
                                            @method('get')
                                            <x-primary-button>{{ __('Edit') }}</x-primary-button>
                                        </form>

                                        <form method="post"
                                            action="{{ route('product.delete', ['id' => $product->id]) }}"
                                            class="mt-2 space-y-6">
                                            @csrf
                                            @method('DELETE')
                                            <x-danger-button>{{ __('Delete') }}</x-danger-button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

                <div class="p-6 text-gray-900 dark:text-gray-100">
                    {{ $products->links() }}
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
