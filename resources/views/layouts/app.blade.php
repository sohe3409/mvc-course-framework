<!doctype html>
<html>
    <meta charset="utf-8">
    <title>Game app</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" href="<?= url("/favicon.ico") ?>">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/app.css') }}">
</head>

<body>
    <nav>
      <ul>
        <li>
          <a href="{{ route('index') }}">Home</a>
        </li>
        <li>
          <a href="{{ route('hello') }}">Hello</a>
        </li>
        <li>
          <a href="{{ route('game') }}">Game 21</a>
        </li>
      </ul>
    </nav>
    @yield('content')
</body>
</html>
