<!DOCTYPE html>
<html lang="en">

<head>

</head>
  @include('layouts.frontend._head')
<body>

  @include('layouts.frontend._topbar')

  @yield('content')

  @include('layouts.frontend._footer')

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  @include('layouts.frontend._js')

</body>

</html>