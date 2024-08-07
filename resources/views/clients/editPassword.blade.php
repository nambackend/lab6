<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>LoginClients</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css
">
</head>

<body>
    <div class="container w-50">
        <h1>LoginClient</h1>
        
        @if (session('errorLogin'))
        <div class="alert alert-danger">
             {{session('errorLogin')}}
        </div>
    @endif
        <form novalidate action="{{ route('updatePassword',$client->id) }}" method="POST">
            @csrf
            <div class="mb-3">
                <label for="" class="form-label">Password</label>
                <input type="password" name="password" class="form-control">
                @error('password')
                    <span class="text-danger">
                        {{$message}}
                    </span>
                @enderror
            </div>
            <div class="mb-3">
                <label for="" class="form-label">Confirm Password</label>
                <input type="password" name="confirmpassword" class="form-control">
                @error('confirmpassword')
                <span class="text-danger">
                    {{$message}}
                </span>
            @enderror
            </div>
            <div class="mb-3">
                <button type="submit" class="btn btn-success">Đổi</button>
            </div>
        </form>
    </div>
</body>

</html>
