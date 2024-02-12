@php
    $prefix = Request::route()->getPrefix();
    $route = Route::current()->getName();


@endphp

<div class="menu">
    <div class="main-menu">
        <div class="scroll">
            <ul class="list-unstyled">
                <li class="{{ ($route == 'admin.dashboard')?'active':'' }}">
                    <a href=" {{ Route('admin.dashboard') }} ">
                        <i class="iconsminds-dashboard"></i>
                        <span>لوحة القيادة</span>
                    </a>
                </li>
                <li class="{{ ($route == 'user.dashboard')?'active':'' }}">
                    <a href=" {{ Route('user.dashboard') }} ">
                        <i class="iconsminds-dashboard"></i>
                        <span>لوحة القيادة</span>
                    </a>
                </li>
                <li class="{{ ($prefix == '/users')?'active':'' }}">
                    <a href=" {{ Route('users.view') }}">
                        <i class="iconsminds-conference"></i> إدارة المستخدمين
                    </a>
                </li>
                <li>
                    <a href="#applications">
                        <i class="simple-icon-docs"></i> تقارير
                    </a>
                </li>
            </ul>
        </div>
    </div>

    <div class="sub-menu">
    </div>
</div>
