<!-- Menu -->

<aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">
        <div class="app-brand demo">
            <a href="{{ url('/') }}" class="app-brand-link">
              <span class="app-brand-text demo menu-text fw-bold">Resturant</span>
            </a>

            <a href="javascript:void(0);" class="layout-menu-toggle menu-link text-large ms-auto">
              <i class="ti menu-toggle-icon d-none d-xl-block ti-sm align-middle"></i>
              <i class="ti ti-x d-block d-xl-none ti-sm align-middle"></i>
            </a>
          </div>

          <div class="menu-inner-shadow"></div>

          <ul class="menu-inner py-1">
            <!-- Dashboards -->
            <li class="menu-item active open">
              <a href="javascript:void(0);" class="menu-link menu-toggle">
                <i class="menu-icon tf-icons ti ti-smart-home"></i>
                <div data-i18n="{{trans('site.dashboard')}}">{{trans('site.dashboard')}}</div>
                
              </a>
              <ul class="menu-sub">
                <li class="menu-item active">
                  <a href="{{route('admin.index')}}" class="menu-link">
                    <div data-i18n="{{trans('site.analytics')}}">{{trans('site.analytics')}}</div>
                  </a>
                </li>

              </ul>
            </li>


            <!-- Apps & Pages -->
            <li class="menu-header small text-uppercase">
              <span class="menu-header-text">Apps &amp; Pages</span>
            </li>

        <ul>
        <li class="menu-item">
              <a href="javascript:void(0);" class="menu-link menu-toggle">
                <i class="menu-icon tf-icons ti ti-home"></i>
                <div data-i18n="{{trans('site.home')}}">{{trans('site.home')}}</div>
              </a>
              <ul class="menu-sub">
                <li class="menu-item">
                  <a href="{{ url('/user') }}" class="menu-link">
                    <div data-i18n="{{trans('site.list')}}">{{trans('site.list')}}</div>
                  </a>
                </li>

              </ul>
            </li>
            <li class="menu-item">
              <a href="" class="menu-link menu-toggle">
                <i class="menu-icon tf-icons ti ti-users"></i>
                <div data-i18n="{{trans('site.users')}}">{{trans('site.users')}}</div>
              </a>
              <ul class="menu-sub">
                <li class="menu-item">
                  <a href="{{route('admin.users')}}" class="menu-link">
                    <div data-i18n="{{trans('site.list')}}">{{trans('site.list')}}</div>
                  </a>
                </li>

              </ul>
            </li>

            <li class="menu-item">
              <a href="javascript:void(0);" class="menu-link menu-toggle">
              <i class="menu-icon tf-icons ti ti-table"></i>
                <div data-i18n="{{trans('site.tables')}}">{{trans('site.tables')}}</div>
              </a>
              <ul class="menu-sub">
                <li class="menu-item">
                  <a href="{{route('admin.tables')}}" class="menu-link">
                    <div data-i18n="{{trans('site.list')}}">{{trans('site.list')}}</div>
                  </a>
                </li>

              </ul>
            </li>
            
            <li class="menu-item">
              <a href="javascript:void(0);" class="menu-link menu-toggle">
              <i class="menu-icon tf-icons ti ti-clock"></i>
                <div data-i18n="{{trans('site.reservation')}}">{{trans('site.reservation')}}</div>
              </a>
              <ul class="menu-sub">
                <li class="menu-item">
                  <a href="{{route('admin.reservations')}}" class="menu-link">
                    <div data-i18n="{{trans('site.list')}}">{{trans('site.list')}}</div>
                  </a>
                </li>

              </ul>
            </li>

            <li class="menu-item">
              <a href="javascript:void(0);" class="menu-link menu-toggle">
              <i class="menu-icon tf-icons ti ti-shopping-cart"></i>
                <div data-i18n="{{trans('site.orders')}}">{{trans('site.orders')}}</div>
              </a>
              <ul class="menu-sub">
                <li class="menu-item">
                  <a href="{{route('admin.orders')}}" class="menu-link">
                    <div data-i18n="{{trans('site.list')}}">{{trans('site.list')}}</div>
                  </a>
                </li>

              </ul>
            </li>

            <li class="menu-item">
              <a href="javascript:void(0);" class="menu-link menu-toggle">
              <i class="menu-icon tf-icons ti ti-menu-2"></i>
                <div data-i18n="{{trans('site.menu')}}">{{trans('site.menu')}}</div>
              </a>
              <ul class="menu-sub">
                <li class="menu-item">
                  <a href="{{route('admin.menu')}}" class="menu-link">
                    <div data-i18n="{{trans('site.list')}}">{{trans('site.list')}}</div>
                  </a>
                </li>

              </ul>
            </li>
            
            <li class="menu-item">
              <a href="javascript:void(0);" class="menu-link menu-toggle">
              <i class="menu-icon tf-icons ti ti-users"></i>
                <div data-i18n="{{trans('site.chef')}}">{{trans('site.chef')}}</div>
              </a>
              <ul class="menu-sub">
                <li class="menu-item">
                  <a href="{{route('admin.chefs')}}" class="menu-link">
                    <div data-i18n="{{trans('site.list')}}">{{trans('site.list')}}</div>
                  </a>
                </li>

              </ul>
            </li>
            <li class="menu-item">
              <a href="javascript:void(0);" class="menu-link menu-toggle">
              <i class="menu-icon tf-icons ti ti-info-circle"></i>
                <div data-i18n="{{trans('site.about')}}">{{trans('site.about')}}</div>
              </a>
              <ul class="menu-sub">
                <li class="menu-item">
                  <a href="{{route('admin.abouts')}}" class="menu-link">
                    <div data-i18n="{{trans('site.list')}}">{{trans('site.list')}}</div>
                  </a>
                </li>

              </ul>
            </li>
            

        </ul>
        </aside>
        <!-- / Menu -->
