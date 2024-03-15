<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Uber Rider</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&family=Roboto:wght@400;500;700;900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{asset('public/frontend/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('public/frontend/css/datatables.min.css')}}">
    <link rel="stylesheet" href="{{asset('public/frontend/css/all.min.css')}}">
    <link rel="stylesheet" href="{{asset('public/frontend/css/style.css')}}">
</head>
<body>
<nav class="navbar navbar_top navbar-expand-lg bg-light">
    <div class="container">
        <a class="navbar-brand logo" href="{{url('/')}}">Uber</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav main_nav mx-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="{{url('/')}}">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{route('bookaride')}}">Request a Ride</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link " href="{{route('mydriver')}}">Driver</a>
                </li>
                @auth
                <li class="nav-item">
                    <a class="nav-link " href="{{route('users')}}">All Users</a>
                </li>
                    @endauth

            </ul>
            <div class="d-flex">
                @auth
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button type="submit" class="btn btn-danger">Logout</button>
                    </form>
                    @else
                    <a href="{{route('signup')}}" class="btn btn-dark">Signup</a>
                    @endauth
            </div>
        </div>
    </div>
</nav>

    @yield('content')

<footer>
    <div class="footer_div bg-dark p-3">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="footer_text text-center text-white mt-3">
                        <a href="#" class="text-white">Terms & Conditions</a> |
                        <a href="#" class="text-white">Privacy Policy</a>
                        <p class="text-white ">© 2024 Uber Technologies Inc. | Bangladesh ridesharing related information</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>

    <!-- js here -->
    <script src="{{asset('public/frontend/js/jquery-3.7.1.min.js')}}"></script>
<script src="{{asset('public/frontend/js/bootstrap.bundle.min.js')}}"></script>
<script src="{{asset('public/frontend/js/datatables.min.js')}}"></script>

<script>
    $(document).ready( function () {
        $('#myTable').DataTable();
        $('#myTable2').DataTable();
        $('#myTable3').DataTable();
        $('#myTable4').DataTable();
    } );
</script>
</body>
</html>
