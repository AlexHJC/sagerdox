<x-layout>
    <main>
        <div class="mx-4">
            <div class="bg-gray-50 border border-gray-200 p-10 rounded max-w-lg mx-auto mt-24">
                <header class="text-center">
                    <h2 class="text-2xl font-bold uppercase mb-1">
                        Create a company
                    </h2>
                </header>

                <form method="POST" action="/companies" enctype="multipart/form-data">
                    @csrf

                    <div class="mb-6">
                        <label for="title" class="inline-block text-lg mb-2">
                            Company Title</label>
                        <input class="border border-gray-200 rounded p-2 w-full" type="text" name="title"
                            placeholder="" value="{{ old('title') }}" />
                        @error('title')
                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="mb-6">
                        <label for="address" class="inline-block text-lg mb-2">Company address</label>
                        <input class="border border-gray-200 rounded p-2 w-full" type="text" name="address"
                            value="{{ old('address') }}" />
                        @error('address')
                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="mb-6">
                        <label for="phone" class="inline-block text-lg mb-2">Company phone number</label>
                        <input class="border border-gray-200 rounded p-2 w-full" type="text" name="phone"
                            value="{{ old('phone') }}" />
                        @error('phone')
                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="mb-6">
                        <label for="email" class="inline-block text-lg mb-2">Company email</label>
                        <input class="border border-gray-200 rounded p-2 w-full" type="text" name="email"
                            value="{{ old('email') }}" />
                        @error('email')
                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    {{-- <div class="mb-6">
                        <label for="description" class="inline-block text-lg mb-2">description</label>
                        <input class="border border-gray-200 rounded p-2 w-full" type="text" name="description"
                            value="{{ old('description') }}" />
                        @error('description')
                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div> --}}

                    <div class="mb-6">
                        <label for="description" class="inline-block text-lg mb-2">
                            Description
                        </label>
                        <textarea class="border border-gray-200 rounded p-2 w-full" name="description" rows="10">{{ old('description') }}</textarea>
                        @error('description')
                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="mb-6">
                        <button class="bg-laravel text-white rounded py-2 px-4 hover:bg-black">
                            Create Company
                        </button>

                        <a href="/"> Back </a>
                    </div>
                </form>
            </div>
    </main>
</x-layout>
