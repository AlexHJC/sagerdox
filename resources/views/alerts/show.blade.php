<x-layout>
    <title>Alert</title>

    @php
        $alert_certificates = explode(',', $alert->certificate_id);
    @endphp

    <body>
        <a href="/" class="inline-block text-black ml-4 mb-4"><i class="fa-solid fa-arrow-left"></i> Back
        </a>
        <div class='bg-gray-50 border border-gray-200 rounded p-6'>
            <h2>
                Alert title: {{ $alert['title'] }}
            </h2>
            <p class="border-t">period ID: {{ $alert['period_id'] }}</p>
            @foreach ($alert_certificates as $alert_certificate)
                <p class="border-t">Associated certificate #{{$certificates->find($alert_certificate)->id}}: {{ $certificates->find($alert_certificate)->title }}</p>
            @endforeach
        </div>
            <a href="/alerts/{{ $alert['id'] }}/edit" class="text-blue-400 px-6 py-2 rounded-xl"><i
                class="fa-solid fa-pen-to-square"></i>Edit</a>
            <form method="POST" action="/alerts/{{ $alert->id }}">
                @csrf
                @method('DELETE')
                <button class="px-6 py-2 text-red-500">
                    <i class="fa-solid fa-trash"></i> Delete
                </button>
            </form>
    </body>

    </html>
</x-layout>
