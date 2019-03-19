<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <header class="menu">
        @include('layout.header')
    </header>
    <div class="container">
        @yield('content')
    </div>
    <footer>
        @include('layout.footer')
    </footer>
</body>
</html>