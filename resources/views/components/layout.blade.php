<!DOCTYPE html>
<html lang="en">

{{-- View Output --}}
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
    <script src="//unpkg.com/alpinejs" defer></script>
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
    <title>Sagerdox</title>

    <!-- Meta -->
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta charset="utf-8">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- CSS -->
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />

    <!-- Script -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

</head>

<body class="mb-12">
    <nav class="flex justify-between items-center mb-4 border border-gray-200 rounded ml-8 mr-8">
        <a href="/"><img class="w-24" src="{{ asset('images/home.png') }}" alt="" class="logo" /></a>
        <ul class="flex space-x-4 mr-6 text-base">
            @auth
                <li class="flex w-60">
                    <x-flash-message />
                </li>
                <li>
                    <span class="font-bold uppercase">
                        Welcome {{ auth()->user()->name }}
                    </span>
                </li>
                <li>
                    <a href="/certificates/create" class="hover:text-laravel"><i class="fa-solid fa-plus"></i>
                        Create New Certificate</a>
                </li>
                <li>
                    <a href="/alerts/create" class="hover:text-laravel"><i class="fa-solid fa-plus"></i>
                        Create New Alert</a>
                </li>
                <li>
                    <a href="/companies/create" class="hover:text-laravel"><i class="fa-solid fa-plus"></i>
                        Create New Company</a>
                </li>
                <li>
                    <a href="/products/create" class="hover:text-laravel"><i class="fa-solid fa-plus"></i>
                        Create New Product</a>
                </li>
                <li>
                    <a href="/users/manage" class="hover:text-laravel"><i class="fa-solid fa-gear"></i>
                        Manage your data</a>
                </li>
                <li>
                    <form class='inline' method='POST' action="/logout">
                        @csrf
                        <button type='submit'>
                            <i class="fa-solid fa-door-closed"></i>
                            Logout
                        </button>
                    </form>
                </li>
            @else
                <li>
                    <a href="/register" class="hover:text-laravel"><i class="fa-solid fa-user-plus"></i> Register</a>
                </li>
                <li>
                    <a href="/login" class="hover:text-laravel"><i class="fa-solid fa-arrow-right-to-bracket"></i>
                        Login</a>
                </li>
            @endauth
        </ul>
    </nav>
    <main>
        {{ $slot }}
    </main>

</body>

</html>
