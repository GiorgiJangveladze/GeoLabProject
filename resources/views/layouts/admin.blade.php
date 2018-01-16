<!doctype html>
<html lang="en">
  <head>
    @include('includes.adminPage.head')
  </head>

  <body>
    @include('includes.adminPage.header')

    <div class="container-fluid">
      <div class="row">
        @include('includes.adminPage.left-bar')
        @yield('content')
      </div>
    </div>
    @include('includes.adminPage.BootstrapJavaScript')
    @yield('js')
  </body>
</html>
