<x-layout>
    <div class="bg-gray-50 border border-gray-200 p-4 rounded">
        <header>
            <h1 class="text-lg text-center font-bold my-6 uppercase">
                <a href="/certificates/manage" class="underline hover:text-laravel">Manage Certificates</a>
            </h1>
        </header>

        <table class="w-full table-auto rounded-sm">
            <tbody>
                @unless($certificates->isempty())

                    @foreach ($certificates as $certificate)
                        <tr class="border-gray-300">
                            <td class="flex px-4 py-8 border-t border-b border-gray-300 text-lg">
                                <a href="/certificates/{{ $certificate['id'] }}">
                                    {{ $certificate['title'] }}
                                </a>
                            </td>
                            <td class="w-80 px-4 py-8 border-t border-b border-gray-300 text-lg">
                                <a href="/certificates/{{ $certificate['id'] }}/edit"
                                    class="text-blue-400 px-6 py-2 rounded-xl"><i class="fa-solid fa-pen-to-square"></i>
                                    Edit</a>
                            </td>
                            <td class="w-80 px-4 py-8 border-t border-b border-gray-300 text-lg">
                                <form method="POST" action="/certificates/{{ $certificate->id }}">
                                    @csrf
                                    @method('DELETE')
                                    <button class="text-red-500">
                                        <i class="fa-solid fa-trash"></i> Delete
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                @else
                    <tr class="border-gray-300">
                        <td class="px-4 py-8 border-t border-b border-gray-300 text-lg">
                            <p class="text-center">No certificates to show</p>
                        </td>
                    </tr>

                @endunless

            </tbody>
        </table>

        <header>
            <h1 class="text-lg text-center font-bold my-6 uppercase">
                <a href="/alerts/manage" class="underline hover:text-laravel">Manage Alerts</a>
            </h1>
        </header>

        <table class="w-full table-auto rounded-sm">
            <tbody>
                @unless($alerts->isempty())

                    @foreach ($alerts as $alert)
                        <tr class="border-gray-300">
                            <td class="flex px-4 py-8 border-t border-b border-gray-300 text-lg">
                                <a href="/alerts/{{ $alert['id'] }}">
                                    {{ $alert['title'] }}
                                </a>
                            </td>
                            <td class="w-80 px-4 py-8 border-t border-b border-gray-300 text-lg">
                                <a href="/alerts/{{ $alert['id'] }}/edit" class="text-blue-400 px-6 py-2 rounded-xl"><i
                                        class="fa-solid fa-pen-to-square"></i>
                                    Edit</a>
                            </td>
                            <td class="w-80 px-4 py-8 border-t border-b border-gray-300 text-lg">
                                <form method="POST" action="/alerts/{{ $alert->id }}">
                                    @csrf
                                    @method('DELETE')
                                    <button class="text-red-500">
                                        <i class="fa-solid fa-trash"></i> Delete
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                @else
                    <tr class="border-gray-300">
                        <td class="px-4 py-8 border-t border-b border-gray-300 text-lg">
                            <p class="text-center">No alerts to show</p>
                        </td>
                    </tr>

                @endunless

            </tbody>
        </table>

        <header>
            <h1 class="text-lg text-center font-bold my-6 uppercase">
                <a href="/companies/manage" class="underline hover:text-laravel">Manage Companies</a>
            </h1>
        </header>

        <table class="w-full table-auto rounded-sm">
            <tbody>
                @unless($companies->isempty())

                    @foreach ($companies as $company)
                        <tr class="border-gray-300">
                            <td class="flex px-4 py-8 border-t border-b border-gray-300 text-lg">
                                <a href="/companies/{{ $company['id'] }}">
                                    {{ $company['title'] }}
                                </a>
                            </td>
                            <td class="w-80 px-4 py-8 border-t border-b border-gray-300 text-lg">
                                <a href="/companies/{{ $company['id'] }}/edit"
                                    class="text-blue-400 px-6 py-2 rounded-xl"><i class="fa-solid fa-pen-to-square"></i>
                                    Edit</a>
                            </td>
                            <td class="w-80 px-4 py-8 border-t border-b border-gray-300 text-lg">
                                <form method="POST" action="/companies/{{ $company->id }}">
                                    @csrf
                                    @method('DELETE')
                                    <button class="text-red-500">
                                        <i class="fa-solid fa-trash"></i> Delete
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                @else
                    <tr class="border-gray-300">
                        <td class="px-4 py-8 border-t border-b border-gray-300 text-lg">
                            <p class="text-center">No companies to show</p>
                        </td>
                    </tr>

                @endunless

            </tbody>
        </table>

        <header>
            <h1 class="text-lg text-center font-bold my-6 uppercase">
                <a href="/products/manage" class="underline hover:text-laravel">Manage products</a>
            </h1>
        </header>

        <table class="w-full table-auto rounded-sm">
            <tbody>
                @unless($products->isempty())

                    @foreach ($products as $product)
                        <tr class="border-gray-300">
                            <td class="flex px-4 py-8 border-t border-b border-gray-300 text-lg">
                                <a href="/products/{{ $product['id'] }}">
                                    {{ $product['title'] }}
                                </a>
                            </td>
                            <td class="w-80 px-4 py-8 border-t border-b border-gray-300 text-lg">
                                <a href="/products/{{ $product['id'] }}/edit" class="text-blue-400 px-6 py-2 rounded-xl"><i
                                        class="fa-solid fa-pen-to-square"></i>
                                    Edit</a>
                            </td>
                            <td class="w-80 px-4 py-8 border-t border-b border-gray-300 text-lg">
                                <form method="POST" action="/products/{{ $product->id }}">
                                    @csrf
                                    @method('DELETE')
                                    <button class="text-red-500">
                                        <i class="fa-solid fa-trash"></i> Delete
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                @else
                    <tr class="border-gray-300">
                        <td class="px-4 py-8 border-t border-b border-gray-300 text-lg">
                            <p class="text-center">No products to show</p>
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
