<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <h2>
        {{$certificate['title']}}
    </h2>
    <p>description: {{$certificate['description']}}</p>
    <p>company: {{$certificate['company']}}</p>
    <p>category: {{$certificate['certificate_category']}}</p>
    <p>product id: {{$certificate['product_id']}}</p>
    <p>expiry date: {{$certificate['expiry_date']}}</p>

    <a href="/certificates/{{$certificate['id']}}/edit">Edit certificate</a>
</body>
</html>