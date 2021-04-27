<!doctype html>
<html>
    <meta charset="utf-8">
    <title>lol</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" href="<?= url("/favicon.ico") ?>">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/app.css') }}">
</head>

<body>
    <nav>
      <ul>
        <li>
          <a href="/">Home</a>
        </li>
        <li>
          <a href="{{ route('hello') }}">Hello</a>
        </li>
        <li>
          <a href="{{ route('dice') }}">Game</a>
        </li>
      </ul>
    </nav>
    @yield('content')
</body>
</html>
