<nav class="pc-sidebar">
    <div class="navbar-wrapper">
        <div class="m-header">
            <a href="{{ route('home') }}" class="b-brand text-primary">
                @php
                    $settings = generalSettings()
                @endphp
                @if($settings->logo)
                    <img src="{{ asset('storage/' . $settings->logo) }}" class="logo-lg" alt="Logo image"
                        style="max-height: 40px; width: auto; max-width: 100%;">
                @else
                    <img src="https://codedthemes.com/demos/admin-templates/gradient-able/bootstrap/default/assets/images/logo-dark.svg"
                        alt="logo image" class="logo-lg">
                @endif
        </div>
        <div class="navbar-content">
            <ul class="pc-navbar">
                <li class="pc-item pc-caption">
                    <label>Navigation</label>
                </li>
                <li class="pc-item pc-hasmenu">
                    <a href="{{ route('admin.index') }}" class="pc-link"><span class="pc-micon">
                            <i class="ph ph-gauge"></i></span><span class="pc-mtext">Dashboard</span></a>
                </li>

                @if(auth()->check() && auth()->user()->hasAnyPermission(['create-event', 'edit-event', 'show-event', 'delete-event',]))
                    <li class="pc-item pc-hasmenu">
                        <a href="{{ route('events') }}" class="pc-link"><span class="pc-micon">
                                <i class="ph ph-calendar"></i></span><span class="pc-mtext">Events</span></a>
                    </li>
                @endif

                @if(auth()->check() && auth()->user()->hasAnyPermission(['create-event-schedule', 'edit-event-schedule', 'show-event-schedule', 'delete-event-schedule',]))
                    <li class="pc-item pc-hasmenu">
                        <a href="{{ route('event.schedule') }}" class="pc-link"><span class="pc-micon">
                                <i class="ph ph-clock"></i></span><span class="pc-mtext">Event Schedules</span></a>
                    </li>
                @endif
                
                @if(auth()->check() && auth()->user()->hasAnyPermission(['edit-register', 'show-register']))
                    <li class="pc-item pc-hasmenu">
                        <a href="{{ route('committee.list') }}" class="pc-link"><span class="pc-micon">
                                <i class="ph ph-users-three"></i></span><span class="pc-mtext">কমিটির সদস্য</span></a>
                    </li>
                @endif
                
                <li class="pc-item pc-hasmenu">
                    <a href="{{ route('gallery.list') }}" class="pc-link"><span class="pc-micon">
                            <i class="ph ph-image"></i></span><span class="pc-mtext">Gallery Photos</span></a>
                </li>
                                
                <li class="pc-item pc-hasmenu">
                    <a href="{{ route('donations') }}" class="pc-link"><span class="pc-micon">
                            <i class="ph ph-money"></i></span><span class="pc-mtext">Donations</span></a>
                </li>
                                
                <li class="pc-item pc-hasmenu">
                    <a href="{{ route('sponsors') }}" class="pc-link"><span class="pc-micon">
                            <i class="ph ph-handshake"></i></span><span class="pc-mtext">Sponsors</span></a>
                </li>
                                
                <li class="pc-item pc-hasmenu">
                    <a href="{{ route('invests') }}" class="pc-link"><span class="pc-micon">
                            <i class="ph ph-coins"></i></span><span class="pc-mtext">Investment</span></a>
                </li>
                                
                <li class="pc-item pc-hasmenu">
                    <a href="{{ route('guests') }}" class="pc-link"><span class="pc-micon">
                            <i class="ph ph-user"></i></span><span class="pc-mtext">Our Guests</span></a>
                </li>

                <li class="pc-item pc-hasmenu">
                    <a href="{{ route('reviews') }}" class="pc-link"><span class="pc-micon">
                            <i class="ph ph-chat"></i></span><span class="pc-mtext">Reveiws</span></a>
                </li>

                <li class="pc-item pc-hasmenu">
                    <a href="{{ route('contact.list') }}" class="pc-link"><span class="pc-micon">
                            <i class="ph ph-phone"></i></span><span class="pc-mtext">Contacts</span></a>
                </li>

                <li class="pc-item pc-hasmenu">
                    <a href="{{ route('adviser.list') }}" class="pc-link"><span class="pc-micon">
                            <i class="ph ph-users"></i></span><span class="pc-mtext">উপদেষ্টা মণ্ডলী</span></a>
                </li>

                @if (auth()->check() && auth()->user()->hasAnyPermission(['update-general-setting', 'update-email-setting', 'cache-clear']))
                    <li class="pc-item pc-hasmenu">
                        <a href="#!" class="pc-link"><span class="pc-micon">
                                <i class="ph ph-gear"></i></span><span class="pc-mtext">Application Settings</span><span class="pc-arrow"><i
                                    data-feather="chevron-right"></i></span></a>
                        <ul class="pc-submenu">
                            @if (auth()->check() && auth()->user()->hasPermissionTo('update-general-setting'))
                                <li class="pc-item"><a class="pc-link" href="{{ route('general.setting') }}">General
                                        Settings</a></li>
                            @endif
                            @if (auth()->check() && auth()->user()->hasPermissionTo('update-email-setting'))
                                <li class="pc-item"><a class="pc-link" href="{{ route('email.setting') }}">Email Settings</a>
                                </li>
                            @endif
                            @if (auth()->check() && auth()->user()->hasPermissionTo('cache-clear'))
                                <li class="pc-item"><a class="pc-link" href="{{ route('application.cache.clear') }}">Cache
                                        Clear</a></li>
                            @endif
                        </ul>
                    </li>
                @endif

                <!-- Roles & Permissions Menu -->
                @if (auth()->check() && auth()->user()->hasAnyPermission(['set-userRole', 'show-user', 'delete-user', 'create-role', 'edit-role', 'delete-role']))
                    <li class="pc-item pc-hasmenu">
                        <a href="#!" class="pc-link"><span class="pc-micon">
                                <i class="ph ph-shield"></i></span><span class="pc-mtext">Roles &
                                Permissions</span><span class="pc-arrow"><i data-feather="chevron-right"></i></span></a>
                        <ul class="pc-submenu">
                            @if (auth()->check() && auth()->user()->hasAnyPermission(['set-userRole', 'show-user', 'delete-user']))
                                <li class="pc-item">
                                    <a class="pc-link" href="{{ route('admin.users.index') }}">CMS Users</a>
                                </li>
                            @endif
                            @if (auth()->check() && auth()->user()->hasAnyPermission(['create-role', 'edit-role', 'delete-role']))
                                <li class="pc-item">
                                    <a class="pc-link" href="{{ route('admin.roles.index') }}">Roles</a>
                                </li>
                            @endif
                        </ul>
                    </li>
                @endif
            </ul>
        </div>
    </div>
</nav>