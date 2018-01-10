<!doctype html>
<html lang="en">
  <head>
    @include('includes.head')
  </head>

  <body>
    @include('includes.header')

    <div class="container-fluid">
      <div class="row">
        @include('includes.left-bar')
        @yield('content')
      </div>
    </div>
    @include('includes.BootstrapJavaScript')
    @yield('js')
  </body>
</html>
