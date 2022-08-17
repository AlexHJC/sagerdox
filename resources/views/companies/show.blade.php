<x-layout>


    <a href="/" class="inline-block text-black ml-4 mb-4"><i class="fa-solid fa-arrow-left"></i> Back
    </a>
    <div class="mx-4">
        <div class='bg-gray-50 border border-gray-200 rounded p-6'>
            <h2>
                Company title: {{ $company['title'] }}
            </h2>
            <p class="border-t">Company address: {{ $company['address'] }}</p>
            <p class="border-t">Company phone: {{ $company['phone'] }}</p>
            <p class="border-t">Company email: {{ $company['email'] }}</p>
            <p class="border-t">Company description: {{ $company['description'] }}</p>
        </div>
        <a href="/companies/{{ $company['id'] }}/edit" class="text-blue-400 px-6 py-2 rounded-xl"><i
            class="fa-solid fa-pen-to-square"></i>Edit</a>

        <form method='POST' action="{{ $company->id }}">
            @csrf
            @method('DELETE')
            <button class='px-6 py-2 text-red-500'>
                <i class='fa-solid fa-trash '></i>
                Delete
            </button>
        </form>
    </div>

</x-layout>

{{-- <x-layout>
    <title>Company</title>

    <body>
        <div class='bg-gray-50 border border-gray-200 rounded p-6'>
            <h2>
                {{ $company['title'] }}
            </h2>
            <p>period ID: {{ $company['period_id'] }}</p>

            <a href="/alerts/{{ $company['id'] }}/edit">Edit company</a>
            <form method="POST" action="/alerts/{{ $company->id }}">
                @csrf
                @method('DELETE')
                <button class="text-red-500">
                    <i class="fa-solid fa-trash"></i> Delete
                </button>
            </form>
        </div>
        <a href="/">Back</a>
    </body>

    </html>
</x-layout> --}}
