<!DOCTYPE html>
<html lang="ja">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>@yield('title', 'FashionablyLate')</title>
  <link rel="stylesheet" href="{{ asset('css/sanitize.css') }}" />
  <link rel="stylesheet" href="{{ asset('css/index.css') }}" />
  <link rel="stylesheet" href="{{ asset('css/admin.css') }}">
</head>

<body>
  <header class="header">
    <a class="header__logo" href="/">FashionablyLate</a>
    
     <!-- ログアウトフォーム -->
    <form action="{{ route('logout') }}" method="POST" style="display: inline;">
        @csrf
        <button type="submit" class="btn" style="float: right; margin-top: -10px;">logout</button>
    </form>
</header>


  <main>
    <div class="container">
      @yield('content')
    </div>
  </main>
</body>

</html>
