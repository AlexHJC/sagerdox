<x-layout>
    <main>
        <div class="mx-4">
            <div class="bg-gray-50 border border-gray-200 p-10 rounded max-w-lg mx-auto mt-24">
                <header class="text-center">
                    <h2 class="text-2xl font-bold uppercase mb-1">
                        Create an Alert
                    </h2>
                </header>

                <form method="POST" action="/alerts" enctype="multipart/form-data">
                    @csrf

                    <div class="mb-6">
                        <label for="title" class="inline-block text-lg mb-2">
                            Alert Title</label>
                        <input class="border border-gray-200 rounded p-2 w-full" type="text" name="title"
                            placeholder="" value="{{ old('title') }}" />
                        @error('title')
                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    {{-- keep period ID as manual entry for now, possibly later implement multi select --}}

                    <div class="mb-6">
                        <label for="period_id" class="inline-block text-lg mb-2">
                            Number of days before expiry to send notification</label>
                        <input class="border border-gray-200 rounded p-2 w-full" type="text" name="period_id"
                            placeholder="" value="{{ old('period_id') }}" />
                        @error('period_id')
                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- For defining select2 -->
                    <div class="mb-6">
                        <label for="certificate_id" class="inline-block text-lg mb-2">
                            Select associated certificates</label>
                        <select id='sel' class="border border-gray-200 rounded p-2 w-full" name="certificate_id[]"
                            multiple='multiple'>
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
                        <textarea class="border border-gray-200 rounded p-2 w-full" name="description" rows="10">N/A</textarea>
                        @error('description')
                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="mb-6">
                        <button class="bg-laravel text-white rounded py-2 px-4 hover:bg-black">
                            Create Alert
                        </button>

                        <a href="/"> Back </a>
                    </div>
                </form>
            </div>
    </main>
</x-layout>
