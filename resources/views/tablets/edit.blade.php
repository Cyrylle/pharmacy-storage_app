<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('EDIT') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="m-7">
                    <a href="{{ route('tablets.index') }}">
                        <x-primary-button class="flex justify-center">
                            Back to Tablets
                        </x-primary-button>
                    </a>
                </div>
                <div class="p-6 text-gray-900 flex justify-center">
                    <form action="{{ route('tablets.update',$tablet->id) }}" method="post" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div>
                    <x-input-label for="name" :value="__('Name')" />
                    <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" value="{{ $tablet->name }}" required autofocus autocomplete="name" />
                    <x-input-error :messages="$errors->get('name')" class="mt-2" />
                    </div>
                    <div>
                        <x-input-label for="size" :value="__('Size')" />
                        <x-text-input id="size" class="block mt-1 w-full" type="text" name="size" value="{{ $tablet->size }}" required autofocus autocomplete="size" />
                        <x-input-error :messages="$errors->get('size')" class="mt-2" />
                    </div>
                    <div>
                        <x-input-label for="brand" :value="__('Brand')" />
                        <x-text-input id="brand" class="block mt-1 w-full" type="text" name="brand" value="{{ $tablet->brand }}" required autofocus autocomplete="brand" />
                        <x-input-error :messages="$errors->get('brand')" class="mt-2" />
                    </div>
                    <div>
                        <x-input-label for="price" :value="__('Price')" />
                        <x-text-input id="price" class="block mt-1 w-full" type="number" name="price" value="{{ $tablet->price }}" required autofocus autocomplete="price" />
                        <x-input-error :messages="$errors->get('price')" class="mt-2" />
                    </div>
                    <div>
                        <x-input-label for="quantity" :value="__('Quantity')" />
                        <x-text-input id="quantity" class="block mt-1 w-full" type="number" name="quantity" value="{{ $tablet->quantity }}" required autofocus autocomplete="quantity" />
                        <x-input-error :messages="$errors->get('quantity')" class="mt-2" />
                    </div>
                    <x-primary-button class="mt-3">
                        Update Tablet
                    </x-primary-button>
                </form>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>
