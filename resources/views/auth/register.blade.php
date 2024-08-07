<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Register</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
</head>

<body>
    <div class="container w-50">
        <h1>Register</h1>
        @if (session('message'))
        <div class="alert alert-success">
            {{session('message')}}
        </div>
        @endif
        <form action="{{ route('postRegisterAdmin') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
                <label for="" class="form-label">Fullname</label>
                <input type="text" name="fullname" class="form-control">
            </div>
            <div class="mb-3">
                <label for="" class="form-label">Username</label>
                <input type="text" name="username" class="form-control">
            </div>
            <div class="mb-3">
                <label for="" class="form-label">Email</label>
                <input type="email" name="email" class="form-control">
            </div>
            <div class="mb-3">
                <label for="" class="form-label">Password</label>
                <input type="password" name="password" class="form-control">
            </div>
            <div class="mb-3">
                <label for="" class="form-label">Avatar</label>
                <input type="file" name="avatar" class="form-control">
            </div>
            <div class="mb-3">
                <button type="submit" class="btn btn-sussces">Register</button>
            </div>
            <div class="mb-3">
                 <a href="{{route('postLoginAdmin')}}" class="btn btn-primary">LoginAdmin</a>
                 <a href="{{route('postLoginClient')}}" class="btn btn-primary">LoginClient</a>
            </div>
        </form>
    </div>
</body>

</html>
