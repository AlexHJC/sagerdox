<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Certificate</title>
</head>

<body>
    <h2>
        {{ $certificate['title'] }}
    </h2>
    <p>description: {{ $certificate['description'] }}</p>
    <p>company: {{ $certificate['company_id'] }}</p>
    <p>category: {{ $certificate['category'] }}</p>
    <p>product id: {{ $certificate['product_code'] }}</p>
    <p>expiry date: {{ $certificate['expiry_date'] }}</p>

    <a href="/certificates/{{ $certificate['id'] }}/edit">Edit certificate</a>
    <form method="POST" action="/certificates/{{ $certificate->id }}">
        @csrf
        @method('DELETE')
        <button class="text-red-500">
            <i class="fa-solid fa-trash"></i> Delete
        </button>
    </form>
    <a href="/">Back</a>
</body>

</html>
