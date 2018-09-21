@inject('request', 'Illuminate\Http\Request')
<!-- Left side column. contains the logo and sidebar -->
<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
		<!-- Sidebar user panel -->
		<div class="user-panel">
			<div class="pull-left image">
				<img src="{{URL::asset('public/dist/img/user2-160x160.jpg')}}" class="img-circle" alt="User Image">
			</div>
			<div class="pull-left info">
				<p>{{ Auth::user()->name }}</p>
				<a href="#"><i class="fa fa-circle text-success"></i> Online</a>
			</div>
		</div>
		<!-- search form -->
		<form action="#" method="get" class="sidebar-form">
			<div class="input-group">
				<input type="text" name="q" class="form-control" placeholder="Search...">
				<span class="input-group-btn">
					<button type="submit" name="search" id="search-btn" class="btn btn-flat">
						<i class="fa fa-search"></i>
					</button>
				</span>
			</div>
		</form>
		<!-- /.search form -->
		<!-- sidebar menu: : style can be found in sidebar.less -->
		<ul class="sidebar-menu" data-widget="tree">
			<li class="header">MAIN NAVIGATION</li>
			<li class="{{ $request->segment(1) == 'home' ? 'active' : '' }} treeview menu-open">
				<a href="{{ route('dashboard') }}">
					<i class="fa fa-dashboard"></i> <span>@lang('quickadmin.qa_dashboard')</span>
				</a>
			</li>
			
			@can('event_access')
			<li class="{{ $request->segment(2) == 'events' ? 'active' : '' }}">
				<a href="{{ route('events.index') }}">
					<i class="fa fa-th"></i> <span>@lang('quickadmin.events.title')</span>
				</a>
			</li>
			@endcan
			
			@can('ticket_access')
            <li class="{{ $request->segment(2) == 'tickets' ? 'active' : '' }}">
                <a href="{{ route('tickets.index') }}">
                    <i class="fa fa-gears"></i>
                    <span class="title">@lang('quickadmin.tickets.title')</span>
                </a>
            </li>
            @endcan
			
			<?php /* @can('payment_access')
            <li class="{{ $request->segment(2) == 'payments' ? 'active' : '' }}">
                <a href="{{ route('admin.payments.index') }}">
                    <i class="fa fa-gears"></i>
                    <span class="title">@lang('quickadmin.payments.title')</span>
                </a>
            </li>
            @endcan */?>
			
			@can('user_management_access')
			<li class="treeview">
				<a href="#">
					<i class="fa fa-users"></i>
					<span>@lang('quickadmin.user-management.title')</span>
						<span class="pull-right-container">
						<i class="fa fa-angle-left pull-right"></i>
					</span>
				</a>
				<ul class="treeview-menu">
					@can('role_access')
					<li class="{{ $request->segment(2) == 'roles' ? 'active active-sub' : '' }}">
						<a href="{{ route('roles.index') }}"><i class="fa fa-circle-o"></i>@lang('quickadmin.roles.title')</a>
					</li>
					@endcan
					
					@can('user_access')
					<li class="{{ $request->segment(2) == 'users' ? 'active active-sub' : '' }}">
						<a href="{{ route('users.index') }}"><i class="fa fa-user"></i> @lang('quickadmin.users.title')</a>
					</li>
					@endcan
				</ul>
			</li>
			@endcan
			
			<li class="{{ $request->segment(1) == 'change_password' ? 'active' : '' }}">
                <a href="{{ route('auth.change_password') }}">
                    <i class="fa fa-key"></i>
                    <span class="title">Change password</span>
                </a>
            </li>
			
			<!--<li>
                <a href="#logout" onclick="$('#logout').submit();">
                    <i class="fa fa-arrow-left"></i>
                    <span class="title">@lang('quickadmin.qa_logout')</span>
                </a>
            </li>-->
			
		</ul>
    </section>
    <!-- /.sidebar -->
</aside>