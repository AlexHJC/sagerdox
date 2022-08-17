<x-layout>
    <div class="bg-gray-50 border border-gray-200 p-4 rounded">
        <header>
            <h1 class="text-lg text-center font-bold my-6 uppercase">
                Manage Products
            </h1>
        </header>

        <table class="w-full table-auto rounded-sm">
            <tbody>
                @unless($products->isempty())

                    @foreach ($products as $product)
                    <tr class="border-gray-300">
                        <td class="flex px-4 py-8 border-t  border-gray-300 text-lg">
                            <a href="/products/{{ $product['id'] }}">
                                {{ $product['title'] }}
                            </a>
                        </td>
                        <td class="w-40 px-4 py-8 border-t  border-gray-300 text-lg">
                            <a href="/products/{{ $product['id'] }}/edit" class="text-blue-400 px-6 py-2 rounded-xl"><i
                                    class="fa-solid fa-pen-to-square"></i>
                                Edit</a>
                        </td>
                        <td class="w-40 px-4 py-8 border-t  border-gray-300 text-lg">
                            <form method="POST" action="/products/{{ $product->id }}">
                                @csrf
                                @method('DELETE')
                                <button class="text-red-500">
                                    <i class="fa-solid fa-trash"></i> Delete
                                </button>
                            </form>
                        </td>
                        <td class="w-80 px-4 py-8 border-t border-gray-300 text-base">
                            <p class="text-blue-400 px-6 py-2 rounded-xl">created at: {{ $product['created_at'] }}</p>
                        </td>
                    </tr>
                    @endforeach
                @else
                    <tr class="border-gray-300">
                        <td class="px-4 py-8 border-t border-b border-gray-300 text-lg">
                            <p class="text-center">No Products to show</p>
                        </td>
                    </tr>

                @endunless

            </tbody>
        </table>

    </div>
    <div class="ml-8 mt-2 text-lg">
        <a href="/"> Back to Homepage </a>
    </div>
</x-layout>
