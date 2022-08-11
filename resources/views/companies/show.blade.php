<x-layout>
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
</x-layout>
