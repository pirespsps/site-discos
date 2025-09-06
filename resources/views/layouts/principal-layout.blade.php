<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite(['resources/scss/app.scss','resources/js/app.js'])
    <link rel="stylesheet" href="style.css">
    <title>Site Disco</title>
</head>
<body>

@yield('content')


@yield('script')

</body>
</html>

