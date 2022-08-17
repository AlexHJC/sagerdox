<x-layout>
    <div class="mx-4">
        <div class="bg-gray-50 border border-gray-200 p-10 rounded max-w-lg mx-auto mt-24">
            <header class="text-center">
                <h2 class="text-2xl font-bold uppercase mb-1 mx-auto w-120">
                    Update Product: {{ $product->title }}
                </h2>
            </header>

            <form method="POST" action="/products/{{ $product->id }}" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <div class="mb-6">
                    <label for="title" class="inline-block text-lg mb-2">
                        product Title</label>
                    <input class="border border-gray-200 rounded p-2 w-full" type="text" name="title"
                        placeholder="" value="{{ $product->title }}" />
                    @error('title')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mb-6">
                    <label for="company_id" class="inline-block text-lg mb-2">
                        product company id</label>
                    <input class="border border-gray-200 rounded p-2 w-full" type="text" name="company_id"
                        placeholder="" value="{{ $product->company_id }}" />
                    @error('company_id')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mb-6">
                    <label for="certificate_id" class="inline-block text-lg mb-2">
                        product certificate id</label>
                    <input class="border border-gray-200 rounded p-2 w-full" type="text" name="certificate_id"
                        placeholder="" value="{{ $product->certificate_id }}" />
                    @error('certificate_id')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mb-6">
                    <label for="product_code" class="inline-block text-lg mb-2">
                        product product code</label>
                    <input class="border border-gray-200 rounded p-2 w-full" type="text" name="product_code"
                        placeholder="" value="{{ $product->product_code }}" />
                    @error('product_code')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mb-6">
                    <label for="description" class="inline-block text-lg mb-2">
                        Description
                    </label>
                    <textarea class="border border-gray-200 rounded p-2 w-full" name="description" rows="10">{{ $product->description }}</textarea>
                    @error('description')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mb-6">
                    <button class="bg-laravel text-white rounded py-2 px-4 hover:bg-black">
                        update product
                    </button>

                    <a href="/"> Back </a>
                </div>
            </form>
        </div>

</x-layout>
