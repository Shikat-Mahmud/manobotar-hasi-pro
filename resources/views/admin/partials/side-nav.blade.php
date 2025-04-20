<nav class="pc-sidebar">
    <div class="navbar-wrapper">
        <div class="m-header">
            <a href="{{ route('home') }}" class="b-brand text-primary">
                @php
                    $settings = generalSettings();
                @endphp
                @if ($settings->logo)
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
                            <i class="ph ph-gauge"></i></span><span class="pc-mtext">ড্যাশবোর্ড</span></a>
                </li>

                @if (auth()->check() &&
                        auth()->user()->hasAnyPermission(['create-project', 'edit-project', 'show-project', 'delete-project']))
                    <li class="pc-item pc-hasmenu">
                        <a href="{{ route('projects') }}" class="pc-link"><span class="pc-micon">
                                <i class="ph ph-kanban"></i></span><span class="pc-mtext">প্রজেক্ট সমূহ</span></a>
                    </li>
                @endif

                <li class="pc-item pc-hasmenu">
                    <a href="{{ route('blood-doner.list') }}" class="pc-link"><span class="pc-micon">
                            <i class="ph ph-drop"></i></span><span class="pc-mtext">রক্তদাতা তালিকা</span></a>
                </li>

                <li class="pc-item pc-hasmenu">
                    <a href="{{ route('adviser.list') }}" class="pc-link"><span class="pc-micon">
                            <i class="ph ph-users"></i></span><span class="pc-mtext">উপদেষ্টা মণ্ডলী</span></a>
                </li>

                <li class="pc-item pc-hasmenu">
                    <a href="{{ route('committee.list') }}" class="pc-link"><span class="pc-micon">
                            <i class="ph ph-users-three"></i></span><span class="pc-mtext">কমিটির সদস্য</span></a>
                </li>

                <li class="pc-item pc-hasmenu">
                    <a href="{{ route('show.about') }}" class="pc-link"><span class="pc-micon">
                            <i class="ph ph-info"></i></span><span class="pc-mtext">ফাউন্ডেশনের তথ্য</span></a>
                </li>

                <li class="pc-item pc-hasmenu">
                    <a href="{{ route('gallery.list') }}" class="pc-link"><span class="pc-micon">
                            <i class="ph ph-image"></i></span><span class="pc-mtext">ছবি গ্যালারি</span></a>
                </li>

                <li class="pc-item pc-hasmenu">
                    <a href="{{ route('donations') }}" class="pc-link"><span class="pc-micon">
                            <i class="ph ph-money"></i></span><span class="pc-mtext">ডোনেশন</span></a>
                </li>

                <li class="pc-item pc-hasmenu">
                    <a href="{{ route('sponsors') }}" class="pc-link"><span class="pc-micon">
                            <i class="ph ph-handshake"></i></span><span class="pc-mtext">পার্টনার</span></a>
                </li>

                <li class="pc-item pc-hasmenu">
                    <a href="{{ route('invests') }}" class="pc-link"><span class="pc-micon">
                            <i class="ph ph-coins"></i></span><span class="pc-mtext">খরচ সমূহ</span></a>
                </li>

                <li class="pc-item pc-hasmenu">
                    <a href="{{ route('reviews') }}" class="pc-link"><span class="pc-micon">
                            <i class="ph ph-chat"></i></span><span class="pc-mtext">রিভিউ</span></a>
                </li>

                <li class="pc-item pc-hasmenu">
                    <a href="{{ route('contact.list') }}" class="pc-link"><span class="pc-micon">
                            <i class="ph ph-phone"></i></span><span class="pc-mtext">যোগাযোগ</span></a>
                </li>

                @if (auth()->check() &&
                        auth()->user()->hasAnyPermission(['update-general-setting', 'update-email-setting', 'cache-clear']))
                    <li class="pc-item pc-hasmenu">
                        <a href="#!" class="pc-link"><span class="pc-micon">
                                <i class="ph ph-gear"></i></span><span class="pc-mtext">অ্যাপ সেটিংস</span><span
                                class="pc-arrow"><i data-feather="chevron-right"></i></span></a>
                        <ul class="pc-submenu">
                            @if (auth()->check() && auth()->user()->hasPermissionTo('update-general-setting'))
                                <li class="pc-item"><a class="pc-link" href="{{ route('general.setting') }}">সাধারণ
                                        সেটিংস</a></li>
                            @endif
                            @if (auth()->check() && auth()->user()->hasPermissionTo('update-email-setting'))
                                <li class="pc-item"><a class="pc-link" href="{{ route('email.setting') }}">ইমেইল
                                        সেটিংস</a>
                                </li>
                            @endif
                            @if (auth()->check() && auth()->user()->hasPermissionTo('cache-clear'))
                                <li class="pc-item"><a class="pc-link"
                                        href="{{ route('application.cache.clear') }}">ক্যাশ পরিষ্কার</a></li>
                            @endif
                        </ul>
                    </li>
                @endif

                <!-- Roles & Permissions Menu -->
                @if (auth()->check() &&
                        auth()->user()->hasAnyPermission(['set-userRole', 'show-user', 'delete-user', 'create-role', 'edit-role', 'delete-role']))
                    <li class="pc-item pc-hasmenu">
                        <a href="#!" class="pc-link"><span class="pc-micon">
                                <i class="ph ph-shield"></i></span><span class="pc-mtext">রোল এবং পারমিশন</span><span
                                class="pc-arrow"><i data-feather="chevron-right"></i></span></a>
                        <ul class="pc-submenu">
                            @if (auth()->check() &&
                                    auth()->user()->hasAnyPermission(['set-userRole', 'show-user', 'delete-user']))
                                <li class="pc-item">
                                    <a class="pc-link" href="{{ route('admin.users.index') }}">ইউজার</a>
                                </li>
                            @endif
                            @if (auth()->check() &&
                                    auth()->user()->hasAnyPermission(['create-role', 'edit-role', 'delete-role']))
                                <li class="pc-item">
                                    <a class="pc-link" href="{{ route('admin.roles.index') }}">রোল</a>
                                </li>
                            @endif
                        </ul>
                    </li>
                @endif
            </ul>
        </div>
    </div>
</nav>
