  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="{{route('admin.index')}}" class="brand-link">
      <img src="{{ asset('administrator/dist/img/AdminLTELogo.png') }}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">Origami Admin</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="{{ asset('images/'.auth()->user()->avatar) }}" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block">{{auth()->user()->name}}</a>
        </div>
      </div>

      <!-- SidebarSearch Form -->
      <div class="form-inline">
        <div class="input-group" data-widget="sidebar-search">
          <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
          <div class="input-group-append">
            <button class="btn btn-sidebar">
              <i class="fas fa-search fa-fw"></i>
            </button>
          </div>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->

              @if (auth()->user()->level == 1)
                  
              
              <li class="nav-item">
                <a href="{{route('admin.index')}}" class="nav-link">
                  <i class="nav-icon fas fa-user"></i>
                  <p>
                    Dashboard
                  </p>
                </a>
              </li>

            <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-user"></i>
              <p>
                User
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ route('admin.user.index') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>User List</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('admin.user.create') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>User Create</p>
                </a>
              </li>
            </ul>
          </li>

          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Category
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ route('admin.category.index') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Category List</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('admin.category.create') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Category Create</p>
                </a>
              </li>
            </ul>
          </li>

          @endif

          @if (auth()->user()->level == 2)
            <li class="nav-item">
              <a href="{{route('admin.user.edit', ['id' => auth()->user()->id])}}" class="nav-link">
                <i class="nav-icon fas fa-user"></i>
                <p>
                  User
                </p>
              </a>
            </li>
          @endif
                  

          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-warehouse"></i>
              <p>
                Origami
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ route('admin.origami.index') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Origami List</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('admin.origami.create') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Origami Create</p>
                </a>
              </li>
            </ul>
          </li>

          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-warehouse"></i>
              <p>
                Content Image
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">              
              <li class="nav-item">
                <a href="{{ route('admin.image.index') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Content Image List</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('admin.image.create') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Content Image Create</p>
                </a>
              </li>
            </ul>
          </li>

          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-warehouse"></i>
              <p>
                Feedback
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ route('admin.feedback.index') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Feedback List</p>
                </a>
              </li>
            </ul>
          </li>

          <li class="nav-item">
            <a href="{{ route('logout') }}"><button type="button" class="btn btn-block btn-secondary btn-flat">Logout</button></a>  
          </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>