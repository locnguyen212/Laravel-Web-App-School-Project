<!DOCTYPE html>
<html lang="en">
<head>

@include('client.partial.head')
</head>
<body class="hold-transition sidebar-mini">
<!-- Site wrapper -->
<div class="wrapper">
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">

    @include('client.partial.header')
    @yield('content')

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  @include('client.partial.footer')

  
</div>
<!-- ./wrapper -->

  @include('client.partial.foot')
  @stack('js')
</body>
</html>

