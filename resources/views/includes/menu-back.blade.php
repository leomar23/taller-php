    <li class="header">@lang('menu.back_title')</li>

    @if(Route::is('admin.index'))
         <li class="active">
    @else
         <li>
    @endif
    <a href="{{ url('admin') }}"><i class="fa fa-pie-chart "></i><span>@lang('menu.back_dashboard')</span></a></li>

     @if (Entrust::can('user-list'))
        @if(Route::is('users.index'))
             <li class="active">
        @else
             <li>
        @endif
        <a href="{{ route('users.index') }}"><i class="fa fa-users"></i><span>@lang('menu.back_users')</span></a></li>
     @endif

    @if (Entrust::can('role-list'))
        @if(Route::is('roles.index'))
            <li class="active">
        @else
            <li>
        @endif
            <a href="{{ route('roles.index') }}"><i class="fa fa-shield"></i><span>@lang('menu.back_roles')</span></a></li>
    @endif
    @if (Entrust::can('permission-list'))
        @if(Route::is('permission.index'))
            <li class="active">
        @else
            <li>
        @endif
            <a href="{{ route('permission.index') }}"><i class="fa fa-lock"></i><span>@lang('menu.back_permissions')</span></a></li>
    @endif
    @if (Entrust::can('category-list'))
        @if(Route::is('category.index'))
            <li class="active">
        @else
            <li>
        @endif
            <a href="{{ route('category.index') }}"><i class="fa fa-lock"></i><span>Categorias</span></a></li>
    @endif
    @if (Entrust::can('business-list'))
        @if(Route::is('business.index'))
            <li class="active">
        @else
            <li>
        @endif
            <a href="{{ route('business.index') }}"><i class="fa fa-lock"></i><span>Comercios</span></a></li>
    @endif
    @if (Entrust::can('orders-list'))
        @if(Route::is('orders.index'))
             <li class="active">
        @else
             <li>
        @endif
        <a href="{{ route('orders.index') }}"><i class="fa fa-users"></i><span>Ordenes</span></a></li>
     @endif