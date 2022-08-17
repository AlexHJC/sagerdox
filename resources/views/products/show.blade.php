<x-layout>


    <a href="/" class="inline-block text-black ml-4 mb-4"><i class="fa-solid fa-arrow-left"></i> Back
    </a>
    <div class="mx-4">
        <div class='bg-gray-50 border border-gray-200 rounded p-6'>
            <h2>
                product title: {{ $product['title'] }}
            </h2>
            <p class="border-t">product company id: {{ $product['company_id'] }}</p>
            <p class="border-t">product code: {{ $product['product_code'] }}</p>
            <p class="border-t">product certificate id: {{ $product['certificate_id'] }}</p>
            <p class="border-t">product description: {{ $product['description'] }}</p>
        </div>
        <a href="/products/{{ $product['id'] }}/edit" class="text-blue-400 px-6 py-2 rounded-xl"><i
            class="fa-solid fa-pen-to-square"></i>Edit</a>

        <form method='POST' action="{{ $product->id }}">
            @csrf
            @method('DELETE')
            <button class='px-6 py-2 text-red-500'>
                <i class='fa-solid fa-trash '></i>
                Delete
            </button>
        </form>
    </div>

</x-layout>
