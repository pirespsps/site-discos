<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite(['resources/scss/app.scss','resources/js/app.js'])
    <link rel="stylesheet" href="style.css">
    <link rel="shortcut icon" href="{{asset('images/favicon.png')}}" type="image/x-icon">
    <title>Discoteca</title>
</head>
<body>

@yield('content')


@yield('script')

</body>
</html>

