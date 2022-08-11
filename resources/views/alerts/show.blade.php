<x-layout>
    <title>Alert</title>

    <body>

        <div class='bg-gray-50 border border-gray-200 rounded p-6'>
            <h2>
                Alert title: {{ $alert['title'] }}
            </h2>
            <p>period ID: {{ $alert['period_id'] }}</p>

            <a href="/alerts/{{ $alert['id'] }}/edit">Edit alert</a>
            <form method="POST" action="/alerts/{{ $alert->id }}">
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
