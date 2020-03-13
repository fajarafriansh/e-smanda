<aside class="main-sidebar sidebar-dark-primary elevation-4" style="min-height: 917px;">
    <!-- Brand Logo -->
	<a href="{{ route('home') }}" class="brand-link">
		<img src="{{ asset('img/AdminLTELogo.png') }}" alt="e Smanda" class="brand-image img-circle elevation-3" style="opacity: .8">
		<span class="brand-text font-weight-light">{{ trans('panel.site_title') }}</span>
	</a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user (optional) -->
		<div class="user-panel mt-3 pb-3 mb-3 d-flex">
			<div class="image">
				<img src="{{ asset('img/avatar/'. $user->detail->avatar) }}" class="img-circle elevation-2" alt="User Image">
			</div>
			<div class="info">
				<a href="{{ route('admin.profile', [$user->id]) }}" class="d-block">{{ $user->name }}</a>
			</div>
		</div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <li class="nav-item">
					<a href="{{ route("admin.home") }}" class="nav-link {{ request()->is('admin') ? 'active' : '' }}">
						<i class="nav-icon fas fa-tachometer-alt"></i>
						<p>{{ trans('global.dashboard') }}</p>
					</a>
                </li>
                <li class="nav-item">
                    <a href="{{ route("admin.reports") }}" class="nav-link {{ request()->is('admin/reports') || request()->is('admin/report/*') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>Rapor Siswa</p>
                    </a>
                </li>
                @can('user_management_access')
                    <li class="nav-item has-treeview {{ request()->is('admin/permissions*') ? 'menu-open' : '' }} {{ request()->is('admin/roles*') ? 'menu-open' : '' }} {{ request()->is('admin/users*') ? 'menu-open' : '' }}">
                        <a class="nav-link nav-dropdown-toggle" href="#">
                            <i class="nav-icon fas fa-users">

                            </i>
                            <p>
                                <span>{{ trans('cruds.userManagement.title') }}</span>
                                <i class="right fa fa-fw fa-angle-left"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            @can('permission_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.permissions.index") }}" class="nav-link {{ request()->is('admin/permissions') || request()->is('admin/permissions/*') ? 'active' : '' }}">
                                        <i class="nav-icon fas fa-unlock-alt">

                                        </i>
                                        <p>
                                            <span>{{ trans('cruds.permission.title') }}</span>
                                        </p>
                                    </a>
                                </li>
                            @endcan
                            @can('role_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.roles.index") }}" class="nav-link {{ request()->is('admin/roles') || request()->is('admin/roles/*') ? 'active' : '' }}">
                                        <i class="nav-icon fas fa-briefcase">

                                        </i>
                                        <p>
                                            <span>{{ trans('cruds.role.title') }}</span>
                                        </p>
                                    </a>
                                </li>
                            @endcan
                            @can('user_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.users.index") }}" class="nav-link {{ request()->is('admin/users') || request()->is('admin/users/*') ? 'active' : '' }}">
                                        <i class="nav-icon fas fa-user">

                                        </i>
                                        <p>
                                            <span>{{ trans('cruds.user.title') }}</span>
                                        </p>
                                    </a>
                                </li>
                            @endcan
                        </ul>
                    </li>
                @endcan
                @can('course_access')
                    <li class="nav-item">
                        <a href="{{ route("admin.courses.index") }}" class="nav-link {{ request()->is('admin/courses') || request()->is('admin/courses/*') ? 'active' : '' }}">
                            <i class="nav-icon fas fa-school">

                            </i>
                            <p>
                                <span>{{ trans('cruds.course.title') }}</span>
                            </p>
                        </a>
                    </li>
                @endcan
                @can('lesson_access')
                    <li class="nav-item">
                        <a href="{{ route("admin.lessons.index") }}" class="nav-link {{ request()->is('admin/lessons') || request()->is('admin/lessons/*') ? 'active' : '' }}">
                            <i class="nav-icon fas fa-book-open">

                            </i>
                            <p>
                                <span>{{ trans('cruds.lesson.title') }}</span>
                            </p>
                        </a>
                    </li>
                @endcan
                @can('question_access')
                    <li class="nav-item">
                        <a href="{{ route("admin.questions.index") }}" class="nav-link {{ request()->is('admin/questions') || request()->is('admin/questions/*') ? 'active' : '' }}">
                            <i class="nav-icon fas fa-question">

                            </i>
                            <p>
                                <span>{{ trans('cruds.question.title') }}</span>
                            </p>
                        </a>
                    </li>
                @endcan
                @can('questions_option_access')
                    <li class="nav-item">
                        <a href="{{ route("admin.questions-options.index") }}" class="nav-link {{ request()->is('admin/questions-options') || request()->is('admin/questions-options/*') ? 'active' : '' }}">
                            <i class="nav-icon fas fa-cogs">

                            </i>
                            <p>
                                <span>{{ trans('cruds.questionsOption.title') }}</span>
                            </p>
                        </a>
                    </li>
                @endcan
                @can('test_access')
                    <li class="nav-item">
                        <a href="{{ route("admin.tests.index") }}" class="nav-link {{ request()->is('admin/tests') || request()->is('admin/tests/*') ? 'active' : '' }}">
                            <i class="nav-icon fas fa-book-reader">

                            </i>
                            <p>
                                <span>{{ trans('cruds.test.title') }}</span>
                            </p>
                        </a>
                    </li>
                @endcan
                <li class="nav-item">
                    <a href="#" class="nav-link" onclick="event.preventDefault(); document.getElementById('logoutform').submit();">
                        <i class="fas nav-icon fa-sign-out-alt"></i>
                        <p>{{ trans('global.logout') }}</p>
                    </a>
                </li>
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>