<div id="sidebar" class="c-sidebar c-sidebar-fixed c-sidebar-lg-show" style="background-color:#001780">

    <div class="c-sidebar-brand d-md-down-none">
        <a class="c-sidebar-brand-full h4" href="#">
            {{ trans('panel.site_title') }}
        </a>
    </div>

    <ul class="c-sidebar-nav">
        <li class="c-sidebar-nav-item">
            <a href="{{ route("admin.home")}}" class="c-sidebar-nav-link">
                <i class="c-sidebar-nav-icon fas fa-fw fa-tachometer-alt">

                </i>
                {{ trans('global.dashboard') }}
            </a>
        </li>
        @can('user_management_access')
            <li class="c-sidebar-nav-dropdown">
                <a class="c-sidebar-nav-dropdown-toggle" href="#">
                    <i class="fa-fw fas fa-users c-sidebar-nav-icon">

                    </i>
                    {{ trans('cruds.userManagement.title') }}
                </a>
                <ul class="c-sidebar-nav-dropdown-items">
                    @can('permission_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.permissions.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/permissions") || request()->is("admin/permissions/*") ? "active" : "" }}">
                                <i class="fa-fw fas fa-unlock-alt c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.permission.title') }}
                            </a>
                        </li>
                    @endcan
                    @can('role_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.roles.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/roles") || request()->is("admin/roles/*") ? "active" : "" }}">
                                <i class="fa-fw fas fa-briefcase c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.role.title') }}
                            </a>
                        </li>
                    @endcan
                    @can('user_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.users.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/users") || request()->is("admin/users/*") ? "active" : "" }}">
                                <i class="fa-fw fas fa-user c-sidebar-nav-icon">

                                </i>
                               All {{ trans('cruds.user.title') }}
                            </a>
                        </li> 
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.teacher") }}" class="c-sidebar-nav-link {{ request()->is("admin/users") || request()->is("admin/users/*") ? "active" : "" }}">
                                <i class="fa-fw fas fa-user c-sidebar-nav-icon">

                                </i>
                                Teatcher
                            </a>
                        </li>
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.student") }}" class="c-sidebar-nav-link {{ request()->is("admin/users") || request()->is("admin/users/*") ? "active" : "" }}">
                                <i class="fa fa-graduation-cap c-sidebar-nav-icon">

                                </i>
                                Student
                            </a>
                        </li>
                    @endcan
                </ul>
            </li>
        @endcan
        @can('quiz_access')
            <li class="c-sidebar-nav-item">
                <a href="{{ route("admin.quizzes.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/quizzes") || request()->is("admin/quizzes/*") ? "active" : "" }}">
                    <i class="fa fa-clone c-sidebar-nav-icon">

                    </i>
                    {{ trans('cruds.quiz.title') }}
                </a>
            </li>
        @endcan
        @can('question_access')
            <li class="c-sidebar-nav-item">
                <a href="{{ route("admin.questions.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/questions") || request()->is("admin/questions/*") ? "active" : "" }}">
                    <i class="fa fa-question-circle-o c-sidebar-nav-icon" >

                    </i>
                    {{ trans('cruds.question.title') }}
                </a>
            </li>
        @endcan
        @can('answer_access')
            <li class="c-sidebar-nav-item">
               <!-- <a href="{{ route("admin.answers.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/answers") || request()->is("admin/answers/*") ? "active" : "" }}">
                    <i class="fa fa-list  c-sidebar-nav-icon">

                    </i>
                    {{ trans('cruds.answer.title') }}
                </a>-->
            </li>
        @endcan
        @can('classe_access')
            <li class="c-sidebar-nav-item">
                <a href="{{ route("admin.classes.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/classes") || request()->is("admin/classes/*") ? "active" : "" }}">
                    <i class="fa-fw fas fa-cogs c-sidebar-nav-icon">

                    </i>
                    {{ trans('cruds.classe.title') }}
                </a>
            </li>
        @endcan
        @if(file_exists(app_path('Http/Controllers/Auth/ChangePasswordController.php')))
            @can('profile_password_edit')
                <li class="c-sidebar-nav-item">
                    <a class="c-sidebar-nav-link {{ request()->is('profile/password') || request()->is('profile/password/*') ? 'active' : '' }}" href="{{ route('profile.password.edit') }}">
                        <i class="fa-fw fas fa-key c-sidebar-nav-icon">
                        </i>
                        {{ trans('global.change_password') }}
                    </a>
                </li>
            @endcan
        @endif
        <li class="c-sidebar-nav-item">
            <a href="#" class="c-sidebar-nav-link" onclick="event.preventDefault(); document.getElementById('logoutform').submit();">
                <i class="c-sidebar-nav-icon fas fa-fw fa-sign-out-alt">

                </i>
                {{ trans('global.logout') }}
            </a>
        </li>
    </ul>

</div>