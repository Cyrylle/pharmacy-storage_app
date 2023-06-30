<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Tablets') }}
        </h2>
    </x-slot>

    <div class="py-12">

                    <div class="mb-3">
                        <a href="{{ route('tablets.create') }}" class="p-2 text-center flex justify-end">
                            <x-secondary-button class="hover:bg-black hover:text-white">
                                    Add Product
                            </x-secondary-button>
                        </a>
                    </div>
                    <x-table>
                        @if (count($tablets)==0)
                        <th>
                                    <div class="p-6 text-center text-bold text-xl">
                                        {{ __('No Tablets Available') }}
                                    </div>
                                </th>
                                @else
                                @foreach ($tablets as $tablet)
                                <tr class="border-b border-gray-200 dark:border-gray-700">
                                    <td class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap bg-gray-50 dark:text-white dark:bg-gray-800">{{ $tablet->id }}</td>
                                    <td>{{ $tablet->name }}</td>
                                    <td class="px-6 py-4 bg-gray-50 dark:bg-gray-800">{{ $tablet->size }}</td>
                                    <td class="px-6 py-4">{{ $tablet->brand }}</td>
                                    <td class="px-6 py-4 bg-gray-50 dark:bg-gray-800">{{ $tablet->price }}</td>
                                    <td class="px-6 py-4">{{ $tablet->quantity }}</td>
                                    <td class="px-6 py-4 dark:bg-gray-800">
                                        <div class="flex justify-center">
                                            <div class="me-2">
                                                <form action="{{ route('tablets.destroy', $tablet->id) }}" method="POST" enctype="multipart/form-data">
                                                    @csrf
                                                    @method('DELETE')
                                                    <x-danger-button type="submit">DELETE</x-danger-button>
                                                </form>
                                            </div>
                                            <a href="{{ route('tablets.show', $tablet->id) }}">
                                                <x-secondary-button>SHOW</x-secondary-button>
                                            </a>
                                        </div>
                                    </td>
                                </tr>
                                @endforeach
                                @endif
                            </x-table>
    </div>

</x-app-layout>
