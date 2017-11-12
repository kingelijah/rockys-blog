<!DOCTYPE html>
<html lang="en">

  <head>

    @include('admin/layouts/header')

  </head>

  <body class="hold-transition skin-purple sidebar-mini">
  <div class="wrapper">
    @include('admin/layouts/navbar')

    @include('admin/layouts/sidebar')
    @section('main-content')
    @show

    @include('admin/layouts/footer')
  </body>

</html>
 