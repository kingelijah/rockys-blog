<!DOCTYPE html>
<html lang="en">

  <head>

    @include('user/layouts/head')

  </head>

  <body>

    @include('user/layouts/navbar')

    <!-- Main Content -->
    @section('main-content')
      
       @show
    <hr>

    <!-- Footer -->
    @include('user/layouts/footer')

  </body>

</html>
