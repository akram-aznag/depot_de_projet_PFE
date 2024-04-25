<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <title>{{$title}}</title>
</head>
<body>
    <h1>blogers info list</h1>
    <h3>date: {{$date}}</h3>
    <table border="1" class="table">
        <thead>
            <tr>
                <th>id</th>
                <th>name</th>
                <th>email</th>
                <th>email status</th>
                <th>phone</th>
                <th>address</th>
                <th>role</th>
            </tr>
        </thead>
        <tbody>
            @foreach($users as $user)
            <tr style="margin-bottom: 10px">
                <td>{{$user->id}}</td>
                <td>{{$user->name}}</td>
                <td>{{$user->email}}</td>
                <td>{{$user->email_verified_at ? "verified" : "not verified"}}</td>
                <td>{{$user->phone}}</td>
                <td>{{$user->address?$user->address:'no adress'}}</td>
                <td>bloger</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
