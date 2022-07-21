<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <link rel="icon" href="images/favicon.ico" />
        <link
            rel="stylesheet"
            href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css"
            integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g=="
            crossorigin="anonymous"
            referrerpolicy="no-referrer"
        />
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
</head>
<body>
    
    <h1>dashboard (all certificates)</h1>
    @unless(count($certificates) == 0)

    @foreach($certificates as $certificate)
    
    <div class="bg-gray-50 border border-gray-200 rounded p-6">
        <div class="flex">
            <img
                class="hidden w-48 mr-6 md:block"
                src="images/acme.png"
                alt=""
            />
            <div>
                <h3 class="text-2xl">
                    <a href="/certificates/{{$certificate['id']}}">{{$certificate['title']}}</a>
                </h3>
                <div class="text-xl font-bold mb-4">Acme Corp</div>
                <ul class="flex">
                    <li
                        class="flex items-center justify-center bg-black text-white rounded-xl py-1 px-3 mr-2 text-xs"
                    >
                        <a href="#">Laravel</a>
                    </li>
                    <li
                        class="flex items-center justify-center bg-black text-white rounded-xl py-1 px-3 mr-2 text-xs"
                    >
                        <a href="#">API</a>
                    </li>
                    <li
                        class="flex items-center justify-center bg-black text-white rounded-xl py-1 px-3 mr-2 text-xs"
                    >
                        <a href="#">Backend</a>
                    </li>
                    <li
                        class="flex items-center justify-center bg-black text-white rounded-xl py-1 px-3 mr-2 text-xs"
                    >
                        <a href="#">Vue</a>
                    </li>
                </ul>
                <div class="text-lg mt-4">
                    <i class="fa-solid fa-location-dot"></i> Boston,
                    MA
                </div>
            </div>
        </div>
    </div>

    {{-- <h2>
        certificate name:
        <a href="/certificates/{{$certificate['id']}}">{{$certificate['title']}}</a>
    </h2>
    certificate description:
    <p>{{$certificate['description']}}</p> --}}

    @endforeach

    @else
    <p>No Certificates Found</p>
    @endunless
</body>
</html>