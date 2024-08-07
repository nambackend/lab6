<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Thông tin</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
</head>

<body>
    <div class="container m-5">

        <h1>Thông tin tài khoản</h1>
        <a href="{{route('logoutClient')}}" class="btn btn-dark">Đăng xuất</a>
        @if (session('message'))
            <div class="alert alert-success">
                {{ session('message') }}
            </div>
        @endif
        <form class="form-group" action="{{route('updateClient',$client->id)}}" method="post" enctype="multipart/form-data">
            @csrf
            Fullname : <input class="form-control" name="fullname" type="text" value="{{$client->fullname}}"> 
            Ursename : <input class="form-control" name="username" type="text" value="{{$client->username}}"> 
            Email : <input class="form-control" name="email" type="text" value="{{$client->email}}"> 
            Avatar : <input class="form-control" name="avatar" type="file">
            <img src="{{asset('/storage/'. $client->avatar)}}" width="50px" alt="" class="mt-3"> <br>
            <button type="submit" class="mt-3 btn btn-success">Cập nhật</button>
            <a class="btn btn-primary mt-3" href="{{route('editPassword',$client->id)}}">Đổi mật khẩu</a>
            <a class="btn btn-primary mt-3" href="{{route('loginAdmin')}}">LoginAdmin</a>
        </form>

</body>
</div>

</html>
