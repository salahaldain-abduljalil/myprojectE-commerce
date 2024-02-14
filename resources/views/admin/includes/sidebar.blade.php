
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="#" class="brand-link bg-warning">
      <img src="{{asset('assets/img/admin.png')}}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
           style="opacity: .8">
      <span class="brand-text font-weight-light"> {{ Auth::user()->role }}</span>
    </a>


<div class="sidebar" style="background-color:#DAA520; color:black;">
    <!-- Sidebar user panel (optional) -->
    <div class="user-panel mt-3 pb-3 mb-3 d-flex">
      <div class="image">
        <img src="{{asset('assets/img/salahaddin.jpg')}} " class="img-circle elevation-2" alt="User Image">

      </div>
      <div class="info">
        <a href="#" class="d-block">  {{ Auth::user()->name }}</a>
      </div>
    </div>

    <!-- Sidebar Menu -->
    <nav class="mt-2">
      <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
        <!-- Add icons to the links using the .nav-icon class
             with font-awesome or any other icon font library -->
        <li class="nav-item has-treeview menu-open">
          <a href="#" class="nav-link active">
            <i class="nav-icon fas fa-tachometer-alt"></i>
            <p>
              Dashboard
              <i class="right fas fa-angle-left"></i>
            </p>
          </a>
          {{-- <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="./index.html" class="nav-link active">
                <i class="far fa-circle nav-icon"></i>
                <p>Dashboard v1</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="/showproduct" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Single Product</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="./index3.html" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Dashboard v3</p>
              </a>
            </li>
          </ul> --}}
        </li>
        <li class="nav-item">
          <a href="/productsTable" class="nav-link">
            <i class="fa-brands fa-product-hunt"></i>            <p>
            جدول المنتجات
              <span class="badge bg-success right">products</span>
            </p>
          </a>
        </li>
        <li class="nav-item has-treeview">
          <a href="/cart" class="nav-link">
            <i class="nav-icon fas fa-copy"></i>
            <p>
             السلة
              <i class="fas fa-angle-left right"></i>
              <span class="badge badge-info right">6</span>
            </p>
          </a>
        </li>
        <li class="nav-item has-treeview">
            <a href="/previousorder" class="nav-link">

             <p>
               الطلبات السابقة
               <span class="badge badge-info right"></span>
              </p>
            </a>
          </li>


      </ul>
    </nav>
    <!-- /.sidebar-menu -->
  </div>
