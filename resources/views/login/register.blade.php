<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Rental Buku | Register</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href=" {{ asset('css/style.css') }}">
</head>

<body>
    <div class="main d-flex flex-column justify-content-center align-items-center ">
        <div class="register-box">
            <h2 class="mb-3"><span>R</span>-Book</h2>
            {{-- @if ($errors->any())
                <div class="alert alert-danger alert-dismissible fade show" type="button" data-bs-dismiss="alert"
                    aria-label="Close" role="alert" style="width: 437px;border-radius:10px;">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <strong>
                                <li>{{ $error }}</li>
                            </strong>
                        @endforeach
                    </ul>
                </div>
            @endif --}}
            <form action="/register" method="post">
                @csrf
                <div>
                    <label for="username" class="form-label">Nama Pengguna</label>
                    <input type="text" name="username" id="username" class="form-control" autocomplete="off" required>
                </div>

                <div>
                    <label for="password" class="form-label">Kata Sandi</label>
                    <input type="password" name="password" id="password" class="form-control" autocomplete="off" required>
                </div>

                <div>
                    <label for="phone" class="form-label">Telepon</label>
                    <input type="text" name="phone" id="phone" class="form-control" autocomplete="off">
                </div>

                <div>
                    <label for="address" class="form-label">Alamat</label>
                    <textarea name="address" id="email" class="form-control" rows="5" required></textarea>
                </div>

                <div>
                    <button type="submit" class="btn btn-primary form-control">Daftar</button>
                </div>

                <div class="text-center">
                    SudahPunyaAkun? <a href="login">Masuk</a>
                </div>
            </form>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>
    
</body>

</html>
