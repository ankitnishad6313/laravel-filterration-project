<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Categories') }}
        </h2>
    </x-slot>

    <div class="py-12">
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
                                <th>Name</th>
                                <th>Status</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($categories as $key => $category)
                                <tr>
                                    <th>{{ $categories->firstItem() +$key }}</th>
                                    <td>
                                        <img src="{{ $category->image }}" alt="{{ $category->name }} Image"
                                            height="50" width="100" />
                                    </td>
                                    <td>{{ $category->name }}</td>
                                    <td>{{ $category->status }}</td>
                                    <td>
                                        <div class="flex gap-4">
                                            <form method="post"
                                                action="{{ route('category.edit', ['id' => $category->id]) }}"
                                                class="mt-2 space-y-6">
                                                @csrf
                                                @method('get')
                                                <x-primary-button>{{ __('Edit') }}</x-primary-button>
                                            </form>

                                            <form method="post"
                                                action="{{ route('category.delete', ['id' => $category->id]) }}"
                                                class="mt-2 space-y-6">
                                                @csrf
                                                @method('DELETE')
                                                <x-danger-button>{{ __('Delete') }}</x-danger-button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

                <div class="p-6 text-gray-900 dark:text-gray-100">
                    {{ $categories->links() }}
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
