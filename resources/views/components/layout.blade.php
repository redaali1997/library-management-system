<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Library Management System</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ mix('css/app.css') }}">
    <script src="{{ mix('js/app.js') }}" defer></script>


</head>

<body>

    <nav class="w-screen h-16 bg-blue-500 flex justify-center items-center">
        <div class="w-4/5 flex justify-between items-center">
            <a class="text-xl font-bold px-2 no-underline text-white" href="{{ route('books.index') }}">Library
                Management System</a>
            <div>
                @auth
                    <div class="flex">
                        <div class="btn-group" role="group">
                            <button id="btnGroupDrop1" type="button" class="btn btn-primary dropdown-toggle"
                                data-bs-toggle="dropdown" aria-expanded="false">
                                {{ auth()->user()->name }}
                            </button>
                            <ul class="dropdown-menu" aria-labelledby="btnGroupDrop1">
                                <li><a class="dropdown-item" href="/dashboard">Dashboard</a></li>
                                @if (auth()->user()->isAdmin())
                                    <li><a class="dropdown-item" href="{{ route('admin.panel') }}">Admin Panel</a></li>
                                @endif
                            </ul>
                        </div>
                        <form action="{{ route('logout') }}" method="POST">
                            @csrf
                            <button class="border rounded py-1 px-2 m-2 text-white no-underline">Logout</button>
                        </form>
                    </div>
                @else
                    <a href="{{ route('login') }}" class="border rounded py-1 px-2 m-2 text-white no-underline">Login</a>
                    <a href="{{ route('register') }}"
                        class="border rounded py-1 px-2 m-2 text-white no-underline">Register</a>
                @endauth
            </div>
        </div>
    </nav>

    <main class="flex justify-center items-center overflow-x-hidden w-screen py-5">
        {{ $slot }}
    </main>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous">
    </script>

</body>

</html>
