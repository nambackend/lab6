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

        <h1>Danh sách tài khoản</h1>
        <a href="{{ route('logoutAdmin') }}" class="btn btn-dark">Đăng xuất</a>
        @if (session('message'))
            <div class="alert alert-success">
                {{ session('message') }}
            </div>
        @endif
        <table class="table table" border="1">
            <tr>
                <th>ID</th>
                <th>Fullname</th>
                <th>Username</th>
                <th>Email</th>
                <th>Avatar</th>
                <th>Active</th>
                <th>Thao tác</th>
            </tr>

            @foreach ($data as $item)
                <tr>
                    <td>{{ $item->id }}</td>
                    <td>{{ $item->fullname }}</td>
                    <td>{{ $item->username }}</td>
                    <td>{{ $item->email }}</td>
                    <td>
                        <img src="{{ asset('/storage/' . $item->avatar) }}" width="50px" alt="">
                    </td>
                    <td>
                        @if ($item->active == 1)
                            Hoạt động
                        @else
                            Không hoạt động
                        @endif
                    </td>
                    <td>
                        @if ($item->active == 1)
                            <a href="{{ route('active', $item->id) }}" class="btn btn-danger">Ngừng kích hoạt</a>
                        @else
                            <a href="{{ route('active', $item->id) }}" class="btn btn-primary">Kích hoạt</a>
                        @endif
                    </td>
                </tr>
            @endforeach

        </table>
</body>
</div>

</html>
