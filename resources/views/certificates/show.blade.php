<x-layout>
    <body>
        <a href="/" class="inline-block text-black ml-4 mb-4"><i class="fa-solid fa-arrow-left"></i> Back
        </a>
        <div class='bg-gray-50 border border-gray-200 rounded p-6'>
            <h2>
                Certificate title: {{ $certificate['title'] }}
            </h2>
            <p class="border-t">description: {{ $certificate['description'] }}</p>
            <p class="border-t">company: {{ $certificate['company_id'] }}</p>
            <p class="border-t">category: {{ $certificate['category'] }}</p>
            <p class="border-t">product id: {{ $certificate['product_code'] }}</p>
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