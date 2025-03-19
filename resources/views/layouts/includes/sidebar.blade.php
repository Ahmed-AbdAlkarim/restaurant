<!-- Menu -->

<aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">
        <div class="app-brand demo">
            <a href="index.html" class="app-brand-link">
              <span class="app-brand-logo demo">
                <svg width="32" height="22" viewBox="0 0 32 22" fill="none" xmlns="http://www.w3.org/2000/svg">
                  <path
                    fill-rule="evenodd"
                    clip-rule="evenodd"
                    d="M0.00172773 0V6.85398C0.00172773 6.85398 -0.133178 9.01207 1.98092 10.8388L13.6912 21.9964L19.7809 21.9181L18.8042 9.88248L16.4951 7.17289L9.23799 0H0.00172773Z"
                    fill="#7367F0" />
                  <path
                    opacity="0.06"
                    fill-rule="evenodd"
                    clip-rule="evenodd"
                    d="M7.69824 16.4364L12.5199 3.23696L16.5541 7.25596L7.69824 16.4364Z"
                    fill="#161616" />
                  <path
                    opacity="0.06"
                    fill-rule="evenodd"
                    clip-rule="evenodd"
                    d="M8.07751 15.9175L13.9419 4.63989L16.5849 7.28475L8.07751 15.9175Z"
                    fill="#161616" />
                  <path
                    fill-rule="evenodd"
                    clip-rule="evenodd"
                    d="M7.77295 16.3566L23.6563 0H32V6.88383C32 6.88383 31.8262 9.17836 30.6591 10.4057L19.7824 22H13.6938L7.77295 16.3566Z"
                    fill="#7367F0" />
                </svg>
              </span>
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
                <div class="badge bg-label-primary rounded-pill ms-auto">1</div>
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
