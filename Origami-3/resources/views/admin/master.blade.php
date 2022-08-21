<!DOCTYPE html>
<html lang="en">
<head>
  @include('admin.partial.head')
  @stack('css')
</head>
<body class="hold-transition sidebar-mini">
<!-- Site wrapper -->
<div class="wrapper">

  @include('admin.partial.navbar')

  @include('admin.partial.sidebar')

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    
    @include('admin.partial.contentheader')

    <!-- Main content -->
    <section class="content">

      @if (\Session::has('success'))
          <div class="alert alert-success alert-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
            <h5><i class="icon fas fa-check"></i> Success!</h5>
            {{ Session::get('success') }}
          </div>
      @endif

      @if (\Session::has('loginSuccess'))
        <div class="alert alert-success alert-dismissible">
          <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
          <h5><i class="icon fas fa-check"></i> Success!</h5>
          {{ Session::get('loginSuccess') }}
        </div>
      @endif

      @if (\Session::has('edited'))
          <div class="alert alert-success alert-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
            <h5><i class="icon fas fa-check"></i> Done!</h5>
            {{ Session::get('edited') }}
          </div>
      @endif

      @if (\Session::has('deleted'))
        <div class="alert alert-success alert-dismissible">
          <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
          <h5><i class="icon fas fa-check"></i> Done!</h5>
          {{ Session::get('deleted') }}
        </div>
      @endif

      @if (\Session::has('alert'))
        <div class="alert alert-danger alert-dismissible">
          <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
          <h5><i class="icon fas fa-ban"></i> Error!</h5>
          {{ Session::get('alert') }}
        </div>
      @endif

      @if (\Session::has('deletedError'))
        <div class="alert alert-danger alert-dismissible">
          <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
          <h5><i class="icon fas fa-ban"></i> Error!</h5>
          {{ Session::get('deletedError') }}
        </div>
      @endif

      @if (\Session::has('editError'))
        <div class="alert alert-danger alert-dismissible">
          <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
          <h5><i class="icon fas fa-ban"></i> Error!</h5>
          {{ Session::get('editError') }}
        </div>
      @endif

      @if ($errors->any())
        <div class="alert alert-danger alert-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
            <h5><i class="icon fas fa-ban"></i>Error!</h5>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
      @endif

     @yield('content')

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  @include('admin.partial.footer')

  @include('admin.partial.controlsidebar')
</div>
<!-- ./wrapper -->

  @include('admin.partial.foot')
  @stack('js')
</body>
</html>
