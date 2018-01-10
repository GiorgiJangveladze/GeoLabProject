<!doctype html>
<html lang="en">
  <head>
    @include('includes.indexPage.head')
  </head>

  <body>
    <header id="myNav" class="overlay">
      @include('includes.indexPage.header')
    </header>
       
    @yield('content')

    <footer>
      @include('includes.indexPage.footer')
    </footer>
    @include('includes.indexPage.scripts')
  </body>
</html>
