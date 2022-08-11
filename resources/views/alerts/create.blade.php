<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="icon" href="images/favicon.ico" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css"
        integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        laravel: "#ef3b2d",
                    },
                },
            },
        };
    </script>
    <title>Create Alert</title>
</head>
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

                <div class="mb-6">
                    <label for="period_id" class="inline-block text-lg mb-2">
                        Number of days before expiry to send notification</label>
                    <input class="border border-gray-200 rounded p-2 w-full" type="text" name="period_id"
                        placeholder="" value="{{ old('period_id') }}" />
                    @error('period_id')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>

                {{-- <div class="mb-6">
                    <label for="company_id" class="inline-block text-lg mb-2">Company id</label>
                    <input class="border border-gray-200 rounded p-2 w-full" type="text" name="company_id"
                        value="{{ old('company_id') }}" />
                    @error('company_id')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>

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
                    <label for="product_code" class="inline-block text-lg mb-2">
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
                </div> --}}

                <div class="mb-6">
                    <button class="bg-laravel text-white rounded py-2 px-4 hover:bg-black">
                        Create Alert
                    </button>

                    <a href="/"> Back </a>
                </div>
            </form>
        </div>
</main>

</html>
