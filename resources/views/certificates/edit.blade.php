<x-layout>

    @php
        $certificate_companies = explode(',', $certificate->company_id);
        $certificate_products = explode(',', $certificate->product_code);
    @endphp

    <div class="mx-4">
        <div class="bg-gray-50 border border-gray-200 p-10 rounded max-w-lg mx-auto mt-24">
            <header class="text-center">
                <h2 class="text-2xl font-bold uppercase mb-1 mx-auto w-120">
                    Update Certificate {{ $certificate->title }}
                </h2>
            </header>

            <form method="POST" action="/certificates/{{ $certificate->id }}" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <div class="mb-6">
                    <label for="title" class="inline-block text-lg mb-2">
                        Certificate Title</label>
                    <input class="border border-gray-200 rounded p-2 w-full" type="text" name="title"
                        placeholder="" value="{{ $certificate->title }}" />
                    @error('title')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>

                {{-- <div class="mb-6">
                    <label for="company_id" class="inline-block text-lg mb-2">Company id</label>
                    <input class="border border-gray-200 rounded p-2 w-full" type="text" name="company_id"
                        value="{{ $certificate->company_id }}" />
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
                        @foreach ($certificate_companies as $certificate_company)
                            @if ($companies->find($certificate_company))
                                <option selected="selected" value="{{ $certificate_company }}">
                                    {{ $companies->find($certificate_company)->title }}
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
                    <label for="product_code" class="inline-block text-lg mb-2">
                        Product Code</label>
                    <input class="border border-gray-200 rounded p-2 w-full" type="text" name="product_code"
                        value="{{ $certificate->product_code }}" />
                    @error('product_code')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div> --}}

                <!-- For defining select2 -->
                <div class="mb-6">
                    <label for="product_code" class="inline-block text-lg mb-2">
                        Associated Products</label>
                    <select id='sel_prod' class="border border-gray-200 rounded p-2 w-full" name="product_code[]"
                        multiple='multiple'>
                        @foreach ($certificate_products as $certificate_product)
                            @if ($products->find($certificate_product))
                                <option selected="selected" value="{{ $certificate_product }}">
                                    {{ $products->find($certificate_product)->title }}
                                </option>
                            @endif
                        @endforeach
                    </select>
                    @error('product_code')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Script -->
                <script type="text/javascript">
                    // CSRF Token
                    var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
                    $(document).ready(function() {

                        $("#sel_prod").select2({
                            placeholder: "Select a Products",
                            allowClear: true,
                            ajax: {
                                url: "{{ route('getProducts') }}",
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
                    <label for="expiry_date" class="inline-block text-lg mb-2">
                        Certificate expiry date
                    </label>
                    <input class="border border-gray-200 rounded p-2 w-full" type="date" name="expiry_date"
                        value="{{ $certificate->expiry_date }}" />
                    @error('expiry_date')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mb-6">
                    <label for="category" class="inline-block text-lg mb-2">
                        Categories (Comma Separated)
                    </label>
                    <input class="border border-gray-200 rounded p-2 w-full" type="text" name="category"
                        placeholder="Example: Organic, Kosher, etc" value="{{ $certificate->category }}" />
                    @error('category')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mb-6">
                    <label for="uploads" class="inline-block text-lg mb-2">
                        File upload
                    </label>
                    <input type="file" class="border border-gray-200 rounded p-2 w-full" name="uploads" />
                    @error('uploads')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                    <img class="w-48 mr-6 mb-6"
                        src="{{ $certificate->uploads ? asset('storage/' . $certificate->uploads) : asset('/images/no-image.png') }}"
                        alt="" />
                </div>

                <div class="mb-6">
                    <label for="description" class="inline-block text-lg mb-2">
                        Description
                    </label>
                    <textarea class="border border-gray-200 rounded p-2 w-full" name="description" rows="10">{{ $certificate->description }}</textarea>
                    @error('description')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mb-6">
                    <button class="bg-laravel text-white rounded py-2 px-4 hover:bg-black">
                        update Certificate
                    </button>

                    <a href="/"> Back </a>
                </div>
            </form>
        </div>

</x-layout>
