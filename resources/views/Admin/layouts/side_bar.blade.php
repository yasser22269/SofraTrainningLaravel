<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="{{ route('Admin') }}" class="brand-link">
      <img src="http://127.0.0.1:8000/AdminLTE/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">Sofra</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar os-host os-theme-light os-host-overflow os-host-overflow-y os-host-resize-disabled os-host-transition os-host-scrollbar-horizontal-hidden"><div class="os-resize-observer-host observed"><div class="os-resize-observer" style="left: 0px; right: auto;"></div></div><div class="os-size-auto-observer observed" style="height: calc(100% + 1px); float: left;"><div class="os-resize-observer"></div></div><div class="os-content-glue" ></div>
    <div class="os-padding"><div class="os-viewport os-viewport-native-scrollbars-invisible" style="><div class="os-content" style="padding: 0px 8px; height: 100%; width: 100%;">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="http://127.0.0.1:8000/AdminLTE/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="{{ route('Admin') }}" class="d-block">{{ auth('res')->user()->name }}</a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->



          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-tree text-info"></i>
              <p>
               العناوين ومدن
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ route('Admin.cities.index') }}" class="nav-link">
                  <i class="far fa-circle nav-icon " ></i>
                  <p>المدن</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('Admin.addresses.index') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>العناوين</p>
                </a>
              </li>
            </ul>
          </li>

        {{-- //  @if (auth()->user()->hasPermission('read_categories')) --}}

          <li class="nav-item">
            <a href="{{ route('Admin.categories.index') }}" class="nav-link">
              <i class="nav-icon far fa-bookmark text-info"></i>
              <p>التصنيفات</p>
            </a>
          </li>
        {{-- //  @endif --}}
        {{-- //  @if (auth()->user()->hasPermission('read_posts')) --}}


       {{-- //   @endif --}}

      {{-- //  @if( auth()->user()->hasRole('super_admin')) --}}
          {{-- <li class="nav-item">
            <a href="{{ route('Admin.users.index') }}" class="nav-link">
              <i class="nav-icon  fas fa-user-plus text-info"></i>
              <p>الاعضاء</p>
            </a>
          </li> --}}
       {{-- // @endif --}}
            <li class="nav-item">
            <a href="{{ route('Admin.Products.index') }}" class="nav-link">
                <i class="nav-icon far fa-bookmark text-info"></i>
                <p>المنتجات</p>
            </a>
                </li>
            <li class="nav-item">
                <a href="{{ route('Admin.offers.index') }}" class="nav-link">
                  <i class="nav-icon fas fa-bookmark text-info"></i>
                  <p>العروض</p>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ route('Admin.Orders.index') }}" class="nav-link">
                  <i class="nav-icon fas fa-thumbs-up text-info"></i>
                  <p>الطلبات</p>
                </a>
            </li>
          <li class="nav-item">
            <a href="{{ route('Admin.contacts.index') }}" class="nav-link">
              <i class="nav-icon far fa-envelope text-info"></i>
              <p>تواصل منعا</p>
            </a>
          </li>

          <li class="nav-item">
            <a href="{{ route('Admin.setting.index') }}" class="nav-link">
              <i class="nav-icon fas fa-plus text-info"></i>
              <p>الاعدادات</p>
            </a>
          </li>


          <li class="nav-item">
            <a href="{{ route('Admin.changePasswordindex') }}" class="nav-link">
              <i class="nav-icon fas fa-sign-out-alt text-info"></i>
              <p>تغيير كلمه المرور</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{ url('/') }}" class="nav-link">
              <i class="nav-icon fas fa-sign-out-alt text-info"></i>
              <p>الموقع</p>
            </a>
          </li>
          <li class="nav-item">
{{-- class="dropdown-item" --}}
          <div  aria-labelledby="navbarDropdown">
            <a class="nav-item" href="{{ route('logout') }}"
               onclick="event.preventDefault();
                             document.getElementById('logout-form').submit();">
              <i class="nav-icon fas fa-sign-out-alt text-info"></i>
                الخروج
            </a>

            <form id="logout-form" class="nav-item" action="{{ route('logout') }}" method="POST" class="d-none">
                @csrf
            </form>
        </div>
    </li>



        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div></div></div><div class="os-scrollbar os-scrollbar-horizontal os-scrollbar-unusable"><div class="os-scrollbar-track"><div class="os-scrollbar-handle" style="width: 100%; transform: translate(0px, 0px);"></div></div></div><div class="os-scrollbar os-scrollbar-vertical"><div class="os-scrollbar-track"><div class="os-scrollbar-handle" style="height: 41.578%; transform: translate(0px, 0px);"></div></div></div><div class="os-scrollbar-corner"></div></div>
    <!-- /.sidebar -->
  </aside>
