<x-layout>

    @php
        $certificate_companies = explode(',', $certificate->company_id);
        $certificate_products = explode(',', $certificate->product_code);
    @endphp

    <body>
        <a href="/" class="inline-block text-black ml-4 mb-4"><i class="fa-solid fa-arrow-left"></i> Back
        </a>
        <div class='bg-gray-50 border border-gray-200 rounded p-6'>
            <h2>
                Certificate title: {{ $certificate['title'] }}
            </h2>
            <p class="border-t">description: {{ $certificate['description'] }}</p>

            @foreach ($certificate_companies as $certificate_company)
                <p class="border-t">company #{{$companies->find($certificate_company)->id}}: {{ $companies->find($certificate_company)->title }}</p>
            @endforeach
            @foreach ($certificate_products as $certificate_product)
                <p class="border-t">product id #{{$products->find($certificate_product)->id}}: {{ $products->find($certificate_product)->title }}</p>
            @endforeach
            <p class="border-t">category: {{ $certificate['category'] }}</p>
            <p class="border-t">expiry date: {{ $certificate['expiry_date'] }}</p>
        </div>
            <a href="/certificates/{{ $certificate['id'] }}/edit" class="text-blue-400 px-6 py-2 rounded-xl"><i
                class="fa-solid fa-pen-to-square"></i>Edit</a>
            <form method="POST" action="/certificates/{{ $certificate->id }}">
                @csrf
                @method('DELETE')
                <button class="px-6 py-2 text-red-500">
                    <i class="fa-solid fa-trash"></i> Delete
                </button>
            </form>
    </body>
</x-layout>