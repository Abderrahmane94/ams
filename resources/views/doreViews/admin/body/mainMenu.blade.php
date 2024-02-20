@php
    $prefix = Request::route()->getPrefix();
    $route = Route::current()->getName();


@endphp

<div class="menu">
    <div class="main-menu">
        <div class="scroll">
            <ul class="list-unstyled">
                @can('dashAdmin')
                <li class="{{ ($route == 'admin.dashboard')?'active':'' }}">
                    <a href=" {{ Route('admin.dashboard') }} ">
                        <i class="iconsminds-dashboard"></i>
                        <span>لوحة القيادة</span>
                    </a>
                </li>
                @endcan
                @can('dashUser')
                <li class="{{ ($route == 'user.dashboard')?'active':'' }}">
                    <a href=" {{ Route('user.dashboard') }} ">
                        <i class="iconsminds-dashboard"></i>
                        <span>لوحة القيادة</span>
                    </a>
                </li>
                @endcan
                @can('usersAdmin')
                <li class="{{ ($prefix == '/users')?'active':'' }}">
                    <a href=" {{ Route('users.view') }}">
                        <i class="iconsminds-conference"></i> إدارة المستخدمين
                    </a>
                </li>
                <li class="{{ ($route == 'report.view')?'active':'' }}">
                    <a href=" {{ Route('report.view') }}">
                        <i class="simple-icon-docs"></i> تقارير
                    </a>
                </li>
                @endcan
            </ul>
        </div>
    </div>

    <div class="sub-menu">
    </div>
</div>
