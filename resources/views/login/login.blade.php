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

    <div class="login-main main d-flex flex-column justify-content-center align-items-center" style="min-height: 100vh">
        <div class="login-box">
            <h2 class="mb-5">Login</h2>
            <form action="" method="post">
                @if (session('status'))
                    <div class="alert alert-danger alert-dismissible fade show" type="button" class="btn-close"
                        data-bs-dismiss="alert" aria-label="Close" role="alert">
                        <strong>{{ session('message') }}</strong>
                    </div>
                @endif
                @csrf
                <div class="form-floating">
                    <input type="text" name="username" id="floatingInput" class="form-control" autocomplete="off"
                        placeholder="Nama Pengguna" required>
                    <label for="floatingInput" class="form-label">Nama Pengguna</label>
                </div>
                <div class="form-floating">
                    <input type="password" name="password" id="floatingPassword" class="form-control"
                        placeholder="Password" required>
                    <label for="floatingPassword" class="form-label">Kata Sandi</label>
                </div>
                <div>
                    <button type="submit" class="btn btn-primary form-control">Masuk</button>
                </div>
                <div class="text-center">
                    BelumPunyaAkun?<a href="">Daftar</a>
                </div>
            </form>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>
</body>

</html>
