<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>e-commerce store </title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Hanken+Grotesk:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.2/font/bootstrap-icons.min.css">
    <style>
        body {
            font-family: 'Hanken Grotesk', sans-serif !important;

        }
    </style>
</head>

<body class="">
    <nav class=" py-2 border-bottom border-dark-subtle">
        <div class="container d-flex justify-content-between align-items-center ">
            <div class="logo">

                <img src="{{ asset('assets/images/logo.png') }}" alt="logo" style="height: 60px;width: 105px;">
            </div>
            <ul class="item d-flex list-unstyled pt-2 align-items-center">
                <li class=" me-4">
                    <a href="" class="text-decoration-none text-black">Home</a>
                </li>
                <li class="nav-item dropdown me-4">
                    <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                        aria-expanded="false">
                        Category
                    </a>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="#">Action</a></li>
                        <li><a class="dropdown-item" href="#">Another action</a></li>
                        <li>
                            <hr class="dropdown-divider">
                        </li>
                        <li><a class="dropdown-item" href="#">Something else here</a></li>
                    </ul>
                </li>
                <li><a href="" class="text-decoration-none text-black me-4">Contact</a></li>
                @if (Auth::check())
                    <li><a href="" class=" me-4 p-1 fw-bold rounded text-black fs-5"><i
                                class="bi bi-bag-fill"></i></a>
                    <li class="nav-item dropdown me-4">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                            aria-expanded="false">
                            <img style="width: 40px; height: 33px; border-radius:100%;"
                                src="{{ Storage::url(Auth::user()->user_image) }}" alt="">
                            <span class="fs-6">{{ Auth::user()->name }}</span>
                        </a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item"
                                    href="{{ route('profile.index', ['id' => Auth::user()->id]) }}">profile</a></li>
                            <li><a class="dropdown-item" href="{{ route('logout') }}">Logout</a></li>

                        </ul>
                    </li>
                @else
                    <li><a href="{{ route('login') }}" class=" me-4 btn btn-dark btn-sm px-3 py-1 fw-semibold">Login</a>
                @endif


                </li>
            </ul>
        </div>
    </nav>
    <div class="col-6 mx-auto">
        <div class="my-3 mx-auto">
            @if (session('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <strong>Success! </strong>{{ session('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @elseif (session('error'))
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <strong>Error! </strong>{{ session('error') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif
        </div>
    </div>
    <div class="container py-5">
        @yield('main_section')
    </div>
    <footer class="text-center py-3 border-top border-dark-subtle">
        <small>&copy; 2023 Your Website. All rights reserved.</small>
    </footer>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous">
    </script>
</body>

</html>
