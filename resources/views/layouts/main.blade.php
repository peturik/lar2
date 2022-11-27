<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>

    <link href="{{ asset('css/my.css') }} " rel="stylesheet" />
    @vite(['resources/js/app.js'])
</head>
<body class="d-flex h-100 text-center text-white bg-dark">
    <div class="cover-container d-flex w-100 h-100 p-3 mx-auto flex-column">
    <header class="mb-auto">
        <div>
          <h3 class="float-md-left mb-0">Обложка</h3>
          <nav class="nav nav-masthead justify-content-center float-md-right">
            <a class="nav-link active" aria-current="page" href="#">Главная</a>
            <a class="nav-link" href="#">Особенности</a>
            <a class="nav-link" href="#">Контакты</a>
          </nav>
        </div>
      </header>

    </div>
    <script src="{{ asset('js/my.js') }}"></script>
</body>
</html>