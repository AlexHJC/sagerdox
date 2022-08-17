<x-layout>

    @php
        $product_companies = explode(',', $product->company_id);
        $product_certificates = explode(',', $product->certificate_id);
    @endphp

    <div class="mx-4">
        <div class="bg-gray-50 border border-gray-200 p-10 rounded max-w-lg mx-auto mt-24">
            <header class="text-center">
                <h2 class="text-2xl font-bold uppercase mb-1 mx-auto w-120">
                    Update Product: {{ $product->title }}
                </h2>
            </header>

            <form method="POST" action="/products/{{ $product->id }}" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <div class="mb-6">
                    <label for="title" class="inline-block text-lg mb-2">
                        product Title</label>
                    <input class="border border-gray-200 rounded p-2 w-full" type="text" name="title"
                        placeholder="" value="{{ $product->title }}" />
                    @error('title')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mb-6">
                    <label for="product_code" class="inline-block text-lg mb-2">
                        product code</label>
                    <input class="border border-gray-200 rounded p-2 w-full" type="text" name="product_code"
                        placeholder="" value="{{ $product->product_code }}" />
                    @error('product_code')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>

                {{-- <div class="mb-6">
                    <label for="company_id" class="inline-block text-lg mb-2">
                        product company id</label>
                    <input class="border border-gray-200 rounded p-2 w-full" type="text" name="company_id"
                        placeholder="" value="{{ $product->company_id }}" />
                    @error('company_id')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div> --}}

                <!-- For defining select2 -->
                <div class="mb-6">
                    <label for="company_id" class="inline-block text-lg mb-2">
                        Associated Companies</label>
                    <select id='sel_comp' class="border border-gray-200 rounded p-2 w-full" name="company_id[]"
                        multiple='multiple'>
                        @foreach ($product_companies as $product_company)
                            @if ($companies->find($product_company))
                                <option selected="selected" value="{{ $product_company }}">
                                    {{ $companies->find($product_company)->title }}
                                </option>
                            @endif
                        @endforeach
                    </select>
                    @error('company_id')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Script -->
                <script type="text/javascript">
                    // CSRF Token
                    var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
                    $(document).ready(function() {

                        $("#sel_comp").select2({
                            placeholder: "Select a Companies",
                            allowClear: true,
                            ajax: {
                                url: "{{ route('getCompanies') }}",
                                type: "post",
                                dataType: 'json',
                                delay: 100,
                                data: function(params) {
                                    return {
                                        _token: CSRF_TOKEN,
                                        search: params.term // search term
                                    };
                                },
                                processResults: function(response) {
                                    return {
                                        results: response
                                    };
                                },
                                cache: true
                            }

                        });

                    });
                </script>

                {{-- <div class="mb-6">
                    <label for="certificate_id" class="inline-block text-lg mb-2">
                        product certificate id</label>
                    <input class="border border-gray-200 rounded p-2 w-full" type="text" name="certificate_id"
                        placeholder="" value="{{ $product->certificate_id }}" />
                    @error('certificate_id')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div> --}}

                <!-- For defining select2 -->
                <div class="mb-6">
                    <label for="certificate_id" class="inline-block text-lg mb-2">
                        Associated certificates</label>
                    <select id='sel' class="border border-gray-200 rounded p-2 w-full" name="certificate_id[]"
                        multiple='multiple'>
                        @foreach ($product_certificates as $product_certificate)
                            @if ($certificates->find($product_certificate))
                                <option selected="selected" value="{{ $product_certificate }}">
                                    {{ $certificates->find($product_certificate)->title }}
                                </option>
                            @endif
                        @endforeach
                    </select>
                    @error('certificate_id')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Script -->
                <script type="text/javascript">
                    // CSRF Token
                    var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
                    $(document).ready(function() {

                        $("#sel").select2({
                            placeholder: "Select a Certificate",
                            allowClear: true,
                            ajax: {
                                url: "{{ route('getCertificates') }}",
                                type: "post",
                                dataType: 'json',
                                delay: 100,
                                data: function(params) {
                                    return {
                                        _token: CSRF_TOKEN,
                                        search: params.term // search term
                                    };
                                },
                                processResults: function(response) {
                                    return {
                                        results: response
                                    };
                                },
                                cache: true
                            }

                        });

                    });
                </script>

                <div class="mb-6">
                    <label for="description" class="inline-block text-lg mb-2">
                        Description
                    </label>
                    <textarea class="border border-gray-200 rounded p-2 w-full" name="description" rows="10">{{ $product->description }}</textarea>
                    @error('description')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mb-6">
                    <button class="bg-laravel text-white rounded py-2 px-4 hover:bg-black">
                        update product
                    </button>

                    <a href="/"> Back </a>
                </div>
            </form>
        </div>

</x-layout>
