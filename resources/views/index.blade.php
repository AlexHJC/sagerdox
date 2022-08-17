<x-layout>
    @include('partials._search')

    <div class="flex border border-black rounded w-40 place-content-center ml-4 mb-4">
        <div class="text-base font-bold">List of all certificates</div>
    </div>

    <div class="lg:grid lg:grid-cols-2 gap-4 space-y-4 md:space-y-0 mx-4">

        @unless(count($certificates) == 0)

            @foreach ($certificates as $certificate)
                <div class="flex border">
                    <div>
                        <h3 class="underline text-2xl w-80 hover:text-laravel">
                            <a href="certificates/{{ $certificate['id'] }}">{{ $certificate['title'] }}</a>
                        </h3>
                        <div class="text-xs font-bold mb-1">Company ID: {{ $certificate['company_id'] }}</div>
                        <div class="text-xs font-bold mb-1">Product Code: {{ $certificate['product_code'] }}</div>
                        <div class="text-xs font-bold mb-1">Category: {{ $certificate['category'] }}</div>
                        <div class="text-xs font-bold mb-1">Expiry date: {{ $certificate['expiry_date'] }}</div>
                    </div>
                    <div class="text-lg mt-4">
                        <i class="fa-solid fa-info"></i> {{ $certificate['description'] }}
                    </div>

                </div>
            @endforeach
        @else
            <p>No Certificates Found</p>
        @endunless
    </div>

    <div class="flex border border-black rounded w-40 place-content-center ml-4 mb-4 mt-4">
        <div class="text-base font-bold">List of all expired certificates</div>
    </div>

    <div class="lg:grid lg:grid-cols-2 gap-4 space-y-4 md:space-y-0 mx-4">

        @unless(count($certificates) == 0)

            @foreach ($certificates as $certificate)
                @if ($certificate['expiry_date'] <= date('Y-m-d H:i:s'))
                    <div class="flex border">
                        <div>
                            <h3 class="underline text-2xl w-80 hover:text-laravel">
                                <a href="certificates/{{ $certificate['id'] }}">{{ $certificate['title'] }}</a>
                            </h3>
                            <div class="text-xs font-bold mb-1">Company ID: {{ $certificate['company_id'] }}</div>
                            <div class="text-xs font-bold mb-1">Product Code: {{ $certificate['product_code'] }}</div>
                            <div class="text-xs font-bold mb-1">Category: {{ $certificate['category'] }}</div>
                            <div class="text-xs font-bold mb-1">Expiry date: {{ $certificate['expiry_date'] }}</div>
                        </div>
                        <div class="text-lg mt-4">
                            <i class="fa-solid fa-info"></i> {{ $certificate['description'] }}
                        </div>
                    </div>
                @endif
            @endforeach
        @else
            <p>No Certificates Found</p>
        @endunless

    </div>

    <div class="mt-6 p-4">
        {{ $certificates->links() }}
    </div>

</x-layout>

</html>
