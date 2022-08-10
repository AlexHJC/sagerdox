<!DOCTYPE html>
<html lang="en">
<head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Sagerdox</title>
</head>
<body>

    <h1>dashboard</h1>

    <a href="/certificates/create">create a certificate</a> <br>
    @auth
    <span class="font-bold uppercase">
        Welcome {{auth()->user()->name}} <br>
    </span>
    <form class="inline" method="POST" action="/logout">
        @csrf
        <button type="submit">
            <i class="fa-solid fa-door-closed"></i> logout
        </button>
    </form>
    <a href="/certificates/manage">manage certificates</a>
    @else
    <a href="/register">register new user</a> <br>
    <a href="/login">Login</a>
    @endauth

    <form action="/">
            <input
                type="text"
                name="search"
                placeholder="Search"
            />
            <div>
                <button
                    type="submit"
                >
                    Search
                </button>
            </div>
    </form>

    @unless(count($certificates) == 0)

    @foreach($certificates as $certificate)

    <h2>
        certificate name:
        <a href="/certificates/{{$certificate['id']}}">{{$certificate['title']}}</a>
    </h2>
    certificate description:
    <p>{{$certificate['description']}}</p>
    <br>

    @endforeach

    @else
    <p>No Certificates Found</p>
    @endunless

    <div class="mt-6 p-4">
        {{$certificates->links()}}
    </div>

</body>
</html>