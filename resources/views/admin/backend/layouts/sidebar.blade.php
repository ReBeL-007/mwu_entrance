<!-- Sidebar -->
  <div class="sidebar">
    <!-- Sidebar user panel (optional) -->
    <div class="user-panel mt-3 pb-3 mb-3 d-flex">
      <div class="image">
        <img src="{{ asset('/backend/dist/img/AdminLTELogo.png')}}" class="img-circle elevation-2" alt="User Image">
      </div>
      <div class="info">
        <a href="{{ route('admin.dashboard')}}" class="d-block">{{Auth::user()->name}}</a>
      </div>
    </div>

    
    <!-- Sidebar Menu -->
    <nav class="mt-2">
      <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
        <!-- Add icons to the links using the .nav-icon class
             with font-awesome or any other icon font library -->
      
        <li class="nav-item">
          <a href="{{ route('admin.dashboard')}}" class="nav-link {{ (request()->is('/admin')) ? 'active' : '' }}">
            <p>
            <i class="nav-icon fas fa-tachometer-alt"></i>
             <span> {{ trans('global.dashboard') }} </span>
            </p>
          </a>
        </li>
        
        @foreach(Auth::user()->groups as $group)
        @if($group->title==='Owner')
            @can('user-management-access')
            <li class="nav-item has-treeview {{ request()->is('admin/permissions*') ? 'menu-open' : '' }} {{ request()->is('admin/roles*') ? 'menu-open' : '' }} {{ request()->is('admin/groups*') ? 'menu-open' : '' }} {{ request()->is('admin/users*') ? 'menu-open' : '' }}">
                <a class="nav-link nav-dropdown-toggle" href="#">
                    <i class="fa-fw fas fa-users">

                    </i>
                    <p>
                        <span>{{ trans('cruds.userManagement.title') }}</span>
                        <i class="right fa fa-fw fa-angle-left"></i>
                    </p>
                </a>
                <ul class="nav nav-treeview">
                    @can('permission-access')
                        <li class="nav-item">
                            <a href="{{ route("admin.permissions.index") }}" class="nav-link {{ request()->is('admin/permissions') || request()->is('admin/permissions/*') ? 'active' : '' }}">
                                <i class="fa-fw fas fa-unlock-alt">

                                </i>
                                <p>
                                    <span>{{ trans('cruds.permission.title') }}</span>
                                </p>
                            </a>
                        </li>
                    @endcan
                    @can('role-access')
                        <li class="nav-item">
                            <a href="{{ route("admin.roles.index") }}" class="nav-link {{ request()->is('admin/roles') || request()->is('admin/roles/*') ? 'active' : '' }}">
                                <i class="fa-fw fas fa-briefcase">

                                </i>
                                <p>
                                    <span>{{ trans('cruds.role.title') }}</span>
                                </p>
                            </a>
                        </li>
                    @endcan
                    @can('group-access')
                      <li class="nav-item">
                          <a href="{{ route("admin.groups.index") }}" class="nav-link {{ request()->is('admin/groups') || request()->is('admin/groups/*') ? 'active' : '' }}">
                            <i class="fas fa-user-friends"></i>
                              <p>
                                  <span>{{ trans('cruds.group.title') }}</span>
                              </p>
                          </a>
                      </li>
                    @endcan
                    @can('user-access')
                        <li class="nav-item">
                            <a href="{{ route("admin.users.index") }}" class="nav-link {{ request()->is('admin/users') || request()->is('admin/users/*') ? 'active' : '' }}">
                                <i class="fa-fw fas fa-user">

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

    {{-- additional menu goes here --}}
    @can('faculty-access')
      <li class="nav-item">
          <a href="{{ route("admin.faculty.index") }}" class="nav-link {{ request()->is('admin/faculty') || request()->is('admin/faculty/*') ? 'active' : '' }}">
            <i class="fas fa-university">

              </i>
              <p>
                  <span>{{ trans('cruds.faculty.title') }}</span>
              </p>
          </a>
      </li>
    @endcan

    @can('level-access')
      <li class="nav-item">
          <a href="{{ route("admin.levels.index") }}" class="nav-link {{ request()->is('admin/levels') || request()->is('admin/levels/*') ? 'active' : '' }}">
            <i class="fas fa-university">

              </i>
              <p>
                  <span>{{ trans('cruds.level.title') }}</span>
              </p>
          </a>
      </li>
    @endcan

    @can('course-access')
      <li class="nav-item">
          <a href="{{ route("admin.courses.index") }}" class="nav-link {{ request()->is('admin/courses') || request()->is('admin/courses/*') || request()->is('admin/subs/*') ? 'active' : '' }}">
            <i class="fas fa-university">

              </i>
              <p>
                  <span>{{ trans('cruds.program.title') }}</span>
              </p>
          </a>
      </li>
    @endcan
@endif
@endforeach
    {{-- @can('sub-access')
      <li class="nav-item">
          <a href="{{ route("admin.subs.index") }}" class="nav-link {{ request()->is('admin/subs') || request()->is('admin/subs/*') ? 'active' : '' }}">
            <i class="fas fa-university">

              </i>
              <p>
                  <span>{{ trans('cruds.sub.title') }}</span>
              </p>
          </a>
      </li>
    @endcan --}}

  @can('program-access')
    <li class="nav-item">
      <a href="{{ route('admin.programs.index') }}" class="nav-link {{ request()->is('admin/programs') || request()->is('admin/programs/*') ? 'active' : '' }}">
          <i class="fa fa-book"></i>
          <p> <span>{{ trans('cruds.program.title') }}</span></p>
      </a>
    </li>
    @endcan
    @can('subject-access')
    <li class="nav-item">
      <a href="{{ route('admin.subjects.index') }}" class="nav-link {{ request()->is('admin/subjects') || request()->is('admin/subjects/*') ? 'active' : '' }}">
          <i class="fa fa-book"></i>
          <p> <span>{{ trans('cruds.subject.title') }}</span></p>
      </a>
    </li>
    @endcan
    @can('question-access')
    <li class="nav-item">
      <a href="{{ route('admin.questions.index') }}" class="nav-link {{ request()->is('admin/questions') || request()->is('admin/questions/*') ? 'active' : '' }}">
          <i class="fa fa-question"></i>
          <p> <span>{{ trans('cruds.question.title') }}</span></p>
      </a>
    </li>
    @endcan
    @can('answer-access')
    <li class="nav-item">
      <a href="{{ route('admin.answers.index') }}" class="nav-link {{ request()->is('admin/answers') || request()->is('admin/answers/*') ? 'active' : '' }}">
          <i class="fa fa-plus-circle"></i>
          <p> <span>{{ trans('cruds.answer.title') }}</span></p>
      </a>
    </li>
    @endcan
    @can('form-access')
    <li class="nav-item">
      <a href="{{ route('admin.forms.index') }}" class="nav-link {{ request()->is('admin/forms') || request()->is('admin/forms/*') ? 'active' : '' }}">
          <i class="fa fa-plus-circle"></i>
          <p> <span>Applicants</span></p>
      </a>
    </li>
    @endcan


    {{-- menu to change password --}}
        <li class="nav-item">
          <a href="{{ route('admin.password.create') }}" class="nav-link {{ request()->is('admin/change-password') || request()->is('admin/change-password/*') ? 'active' : '' }}">
              <i class="fa fa-key"></i>
              <p> <span>{{ trans('global.change_password') }}</span></p>
          </a>
        </li>
       
      </ul>
    </nav>
    <!-- /.sidebar-menu -->
  </div>

  <div class="sidebar sidebar_footer" style="text-align:center;">
    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
      <li class="nav-item">
        <a href="{{route('admin.logout')}}" class="nav-link">
          <p>
          <i class="nav-icon fas fa-sign-out-alt"></i>
            <span>{{trans('global.logout')}}</span>
          </p>
        </a>
      </li>
    </ul>
  </div>
  <!-- /.sidebar -->