<x-layout>
    <main>
        <div class="mx-4">
            <div class="bg-gray-50 border border-gray-200 p-10 rounded max-w-lg mx-auto mt-24">
                <header class="text-center">
                    <h2 class="text-2xl font-bold uppercase mb-1">
                        Create a Certificate
                    </h2>
                </header>

                <form method="POST" action="/certificates" enctype="multipart/form-data">
                    @csrf

                    <div class="mb-6">
                        <label for="title" class="inline-block text-lg mb-2">
                            Certificate Title</label>
                        <input class="border border-gray-200 rounded p-2 w-full" type="text" name="title"
                            placeholder="" value="{{ old('title') }}" />
                        @error('title')
                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- For defining select2 -->
                    <div class="mb-6">
                        <label for="company_id" class="inline-block text-lg mb-2">
                            Select associated certificates</label>
                        <select id='sel' class="border border-gray-200 rounded p-2 w-full" name="company_id[]"
                            multiple='multiple'>
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

                            $("#sel").select2({
                                placeholder: "Select a Company",
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

                    <div class="mb-6">
                        <label for="product_code" class="inline-block text-lg mb-2">
                            Product Code</label>
                        <input class="border border-gray-200 rounded p-2 w-full" type="text" name="product_code"
                            placeholder="" value="{{ old('product_code') }}" />
                        @error('product_code')
                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="mb-6">
                        <label for="expiry_date" class="inline-block text-lg mb-2">
                            Certificate Expiry Date</label>
                        <input class="border border-gray-200 rounded p-2 w-full" type="date" name="expiry_date"
                            value="{{ old('expiry_date') }}" />
                        @error('expiry_date')
                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="mb-6">
                        <label for="category" class="inline-block text-lg mb-2">
                            Categories (Comma Separated)
                        </label>
                        <input class="border border-gray-200 rounded p-2 w-full" type="text" name="category"
                            placeholder="Example: Organic, Kosher, etc" value="{{ old('category') }}" />
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
                    </div>

                    <div class="mb-6">
                        <label for="description" class="inline-block text-lg mb-2">
                            Description
                        </label>
                        <textarea class="border border-gray-200 rounded p-2 w-full" name="description" rows="10">N/A</textarea>
                        @error('description')
                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="mb-6">
                        <button class="bg-laravel text-white rounded py-2 px-4 hover:bg-black">
                            Create Certificate
                        </button>

                        <a href="/"> Back </a>
                    </div>
                </form>
            </div>
    </main>

</x-layout>
