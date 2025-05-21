@php
    $setting = generalSettings();
    $projects = projects();
@endphp
<!-- HEADER SECTION START -->
<header
    class="et-header to-be-fixed py-[30px] xxs:py-[20px] fixed top-0 w-full px-[155px] xxxl:px-[100px] xxl:px-[40px] xs:px-[20px] z-50">
    <div class="flex justify-between items-center">
        <!-- logo -->
        <div class="logo shrink-0">
            <a href="{{ route('home') }}">
                @if (isset($setting->logo))
                    <img src="{{ asset('storage/' . $setting->logo) }}" alt="logo" style="height: 70px;">
                @else
                    <img src="{{ asset('frontend/img/logo-white.png') }}" alt="logo">
                @endif
            </a>
        </div>

        <div class="et-header-right flex items-center gap-[60px] xl:gap-[30px]">
            <div
                class="to-go-to-sidebar-in-mobile flex md:flex-col md:items-start items-center gap-[100px] xl:gap-[30px] md:gap-y-[15px]">
                <!-- nav -->
                <ul
                    class="et-header-nav flex md:flex-col gap-x-[43px] xl:gap-x-[33px] font-kanit text-[17px] font-normal">
                    <li><a href="{{ route('home') }}">হোম</a></li>
                    <li><a href="{{ route('about') }}">আমাদের মিশন</a></li>
                    <li class="has-sub-menu relative">
                        <a role="button">প্রজেক্ট সমূহ <i class="fa fa-angle-down"></i></a>

                        <ul class="et-header-submenu">
                            @foreach ($projects as $project)
                                <li><a href="{{ route('project.details', $project->id) }}">{{ $project->name }}</a>
                                </li>
                            @endforeach                            
                        </ul>
                    </li>
                    <li class="has-sub-menu relative">
                        <a role="button">কমিটি <i class="fa fa-angle-down"></i></a>

                        <ul class="et-header-submenu">
                            <li><a href="{{ route('advisers') }}">উপদেষ্টা পরিষদ</a></li>
                            <li><a href="{{ route('all.committee') }}">কার্যকরী পরিষদ</a></li>
                            <li><a href="{{ route('all.foreign') }}">প্রবাসী পরিষদ</a></li>
                            <li><a href="{{ route('all.member') }}">ফাউন্ডেশনের সদস্যগণ</a></li>
                        </ul>
                    </li>
                    <li><a href="{{ route('blood-doners') }}">রক্তদাতা</a></li>
                    <li><a href="{{ route('gallery') }}">ছবি গ্যালারি</a></li>
                    <li><a href="{{ route('our.doner') }}">ডোনেশন</a></li>
                    <li><a href="{{ route('contact') }}">যোগাযোগ</a></li>
                </ul>

                <!-- button -->
                <a href="{{ route('donate.blood') }}"
                    class="et-btn bg-white flex items-center justify-center gap-x-[15px] h-[50px] px-[15px] text-etBlue font-medium text-[17px] rounded-full group">
                    <i class="fa-solid fa-hand-holding-droplet text-[20px]"></i>
                    রক্তদাতা রেজিস্ট্রেশন</a>
            </div>

            <!-- mobile menu button -->
            <button type="button"
                class="et-mobile-menu-open-btn hidden md:inline-block bg-etBlue rounded-full w-[50px] aspect-square text-white text-[18px] hover:bg-etBlue"><i
                    class="fa-solid fa-bars"></i></button>
        </div>
    </div>
</header>
<!-- HEADER SECTION END -->
