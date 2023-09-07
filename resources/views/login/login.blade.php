<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Rental Buku | Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>

<body>

    <div class="main d-flex flex-column justify-content-center align-items-center">
        <div class="login-box ">
            <h2><span>R</span>-Book</h2>
            <form action="" method="post">
                @if (session('status'))
                    <div class="alert alert-danger alert-dismissible fade show" type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close" role="alert">
                        <strong>{{ session('message') }}</strong>
                    </div>
                @endif
                @csrf
                <div>
                    <label for="username" class="form-label">Nama Pengguna</label>
                    <input type="text" name="username" id="username" class="form-control" autocomplete="off">
                </div>
                <div>
                    <label for="password" class="form-label">Kata Sandi</label>
                    <input type="password" name="password" id="password" class="form-control">
                </div>
                <div>
                    <button type="submit" class="btn btn-primary form-control">Masuk</button>
                </div>
                <div class="text-center">
                    BelumPunyaAkun? <a href="register">Daftar</a>
                </div>
            </form>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>
</body>

</html>
