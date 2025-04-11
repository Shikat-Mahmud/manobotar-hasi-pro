@extends('frontend.master')
@section('title', 'মানবতার হাসি ফাউন্ডেশন')
@section('content')
<!-- BANNER SECTION START -->
<section class="et-2-banner relative bg-etBlue max-w-[1920px]"
    style="background-image: url('{{asset('frontend/img/banner-2-bg-1.jpg')}}');">
    <div class="swiper-wrapper">
        <!-- single slide -->
        <div
            class="bg-no-repeat bg-cover bg-center pt-[clamp(140px,12.7vw,213px)] text-white relative overflow-hidden z-[1] before:content-normal before:absolute before:inset-0 before:bg-gradient-to-r before:from-[#1900B1] before:from-50% before:to-transparent before:-z-[1] before:opacity-50">
            <div class="mx-[15.5em] xxxl:mx-[10em] xxl:mx-[40px] xs:mx-[12px] mb-[132px] xl:mb-[112px] lg:mb-[82px]">
                <div class="flex md:flex-col items-center justify-between gap-x-[30px] gap-y-[30px] md:grid-cols-1">
                    <div class="left relative z-[20] w-[80%] md:w-full">
                        <h6 class="font-bold text-[2.4rem] mb-[3px]">আপনার আমার একটু প্রচেষ্টা হাসি ফুটাবে অসহায় মানুষদের মুখে ইনশাআল্লাহ!</h6>
                        <h1
                            class="text-[clamp(42px,6.25vw,12rem)] font-bold leading-[1.1] mb-[36px] md:mb-[36px]">
                            মানবতার হাসি ফাউন্ডেশন</h1>

                        <div class="et-banner-btns flex flex-wrap items-center gap-[20px]">
                            <a href="{{ route('ticket') }}"
                                class="et-btn bg-white inline-flex items-center justify-center gap-x-[13px] h-[45px] px-[15px] text-etBlue font-normal text-[17px] rounded-full">রক্তদানে ইচ্ছুক?</a>
                        </div>
                    </div>

                </div>
            </div>

            <!-- counter & video button -->
            <div class="flex gap-[120px] xxxl:gap-[60px] xl:gap-[40px] lg:flex-col-reverse items-center">
                <div class="flex shrink-0 gap-[30px] items-center">
                    <svg width="123" height="123" viewBox="0 0 123 123" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path
                            d="M89.3191 57.1702V110.277H122V1H12.7234V33.6809H65.8298L2 97.5106L25.4894 121L89.3191 57.1702Z"
                            stroke-width="2"
                            class="stroke-[url(#paint0_linear_6096_354)] transition duration-[400ms] group-hover:stroke-etBlue " />
                        <defs>
                            <linearGradient id="paint0_linear_6096_354" x1="241.347" y1="-124.347" x2="5.74999"
                                y2="111.25" gradientUnits="userSpaceOnUse">
                                <stop offset="0" stop-color="#1872FE" />
                                <stop offset="1" stop-color="#1972FE" stop-opacity="0" />
                            </linearGradient>
                        </defs>
                    </svg>

                    <div class="flex items-center gap-[15px] ">
                        <!-- video button -->
                        <!-- <a href="https://www.youtube.com/watch?v=AQleI8oFqZo&amp;t=1s" data-fslightbox="banner-video-1" class="w-[93px] aspect-square rounded-full border border-white/20 flex justify-center items-center text-etBlue ml-auto md:ml-0 relative z-[1] text-[18px] before:absolute before:w-[70px] before:h-[70px] before:bg-white before:rounded-full before:-z-[1] before:transition before:duration-[400ms] hover:text-white hover:border-etBlue hover:before:bg-etBlue animate-[shadow_2s_ease-in_infinite]"><i class="fa-solid fa-play"></i></a>
                                                <span class="font-light text-[18px] xxs:hidden">View Promo</span> -->
                    </div>
                </div>
            </div>

            <!-- vectors -->
            <div class="et-banner-vectors">
                <div class="absolute left-[26px] top-[235px]"><img src="{{asset('frontend/img/team-vector.png')}}"
                        alt="vector" class="w-[50px] !animate-none !rotate-0 md:hidden"></div>
                <div class="absolute bottom-[352px] left-[845px]"><img
                        src="{{asset('frontend/img/banner-vector.png')}}" alt="vector"></div>
                <div class="absolute top-[214px] right-[190px]"><img
                        src="{{asset('frontend/img/banner-vector-2.png')}}" alt="vector" class="w-[21px] h-[21px]">
                </div>
            </div>
        </div>
    </div>
</section>
<!-- BANNER SECTION END -->


<!-- ABOUT SECTION START -->
<section class="et-about py-[130px] xl:py-[80px] md:py-[60px] overflow-hidden relative">
    <div
        class="container mx-auto max-w-[calc(100%-39.1vw)] xxxl:max-w-[calc(100%-350px)] xl:max-w-[calc(100%-170px)] px-[12px] lg:max-w-full">
        <div
            class="flex items-center md:flex-wrap gap-x-[60px] xl:gap-x-[40px] lg:gap-x-[30px] gap-y-[40px] sm:gap-y-[40px] lg:justify-center">
            <!-- left -->
            <div class="et-about-img relative z-[1] md:w-auto max-w-full ml-[124px] md:mr-0 xs:mx-auto">
                @if (isset($event->image))
                    <img src="{{ asset('storage/' . $event->image) }}" alt="image" class="shrink-0 rounded-[50px]" />
                @else
                    <img src="{{asset('frontend/img/about-2-img.png')}}" alt="image" class="shrink-0 rounded-[50px]" />
                @endif
                <img src="{{asset('frontend/img/about-2-img-2.jpg')}}" alt="image"
                    class="et-about-floating-img absolute top-[55px] -left-[124px] shrink-0 rounded-[20px] border-white border-[10px] shadow-[0_4px_40px_0_rgba(0,0,0,0.1)] xs:hidden" />

                <!-- vectors -->
                <div class="et-about-vectors">
                    <img src="{{asset('frontend/img/about-img-vector-4.png')}}" alt="vector"
                        class="et-about-vector-1 absolute -left-[98px] top-[20px] -z-[1] xxs:hidden" />
                    <img src="{{asset('frontend/img/team-vector.png')}}" alt="vector"
                        class="et-about-vector-2 w-[50px] absolute -left-[70px] bottom-[115px] -z-[1] !animate-none" />
                </div>
            </div>

            <!-- right -->
            <div class="et-about__txt max-w-[570px] grow">
                <h6 class="et-section-sub-title anim-text">About Event</h6>
                <h2 class="et-section-title mb-[24px] md:mb-[19px] anim-text">{{ $event->name }}</h2>

                <p class="mb-[30px] text-[16px] font-light text-etGray md:mb-[30px] rev-slide-up">
                {!! $event->description !!}
                </p>

                <!-- about infos -->
                <div class="flex xs:flex-col gap-[30px] pt-[30px] border-t border-[#D9D9D9] mb-[50px] xxs:mb-[30px]">
                    <!-- single info -->
                    <div class="flex items-center gap-[20px] rev-slide-up">
                        <div
                            class="shrink-0 h-[80px] w-[80px] rounded-[6px] shadow-[0_4px_50px_10px_rgba(18,96,254,0.10)] flex items-center justify-center">
                            <svg width="40" height="40" viewBox="0 0 40 40" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M35.625 5H32.5V3.75C32.5 3.08696 32.2366 2.45107 31.7678 1.98223C31.2989 1.51339 30.663 1.25 30 1.25C29.337 1.25 28.7011 1.51339 28.2322 1.98223C27.7634 2.45107 27.5 3.08696 27.5 3.75V5H22.5V3.75C22.5 3.08696 22.2366 2.45107 21.7678 1.98223C21.2989 1.51339 20.663 1.25 20 1.25C19.337 1.25 18.7011 1.51339 18.2322 1.98223C17.7634 2.45107 17.5 3.08696 17.5 3.75V5H12.5V3.75C12.5 3.08696 12.2366 2.45107 11.7678 1.98223C11.2989 1.51339 10.663 1.25 10 1.25C9.33696 1.25 8.70107 1.51339 8.23223 1.98223C7.76339 2.45107 7.5 3.08696 7.5 3.75V5H4.375C3.5462 5 2.75134 5.32924 2.16529 5.91529C1.57924 6.50134 1.25 7.2962 1.25 8.125V33.125C1.25 33.9538 1.57924 34.7487 2.16529 35.3347C2.75134 35.9208 3.5462 36.25 4.375 36.25H21.875C22.0408 36.25 22.1997 36.1842 22.3169 36.0669C22.4342 35.9497 22.5 35.7908 22.5 35.625C22.5 35.4592 22.4342 35.3003 22.3169 35.1831C22.1997 35.0658 22.0408 35 21.875 35H4.375C3.87818 34.9985 3.40212 34.8005 3.05081 34.4492C2.6995 34.0979 2.50148 33.6218 2.5 33.125V13.75H37.5V24.375C37.5 24.5408 37.5658 24.6997 37.6831 24.8169C37.8003 24.9342 37.9592 25 38.125 25C38.2908 25 38.4497 24.9342 38.5669 24.8169C38.6842 24.6997 38.75 24.5408 38.75 24.375V8.125C38.75 7.2962 38.4208 6.50134 37.8347 5.91529C37.2487 5.32924 36.4538 5 35.625 5ZM28.75 3.75C28.75 3.41848 28.8817 3.10054 29.1161 2.86612C29.3505 2.6317 29.6685 2.5 30 2.5C30.3315 2.5 30.6495 2.6317 30.8839 2.86612C31.1183 3.10054 31.25 3.41848 31.25 3.75V7.5C31.25 7.83152 31.1183 8.14946 30.8839 8.38388C30.6495 8.6183 30.3315 8.75 30 8.75C29.6685 8.75 29.3505 8.6183 29.1161 8.38388C28.8817 8.14946 28.75 7.83152 28.75 7.5V3.75ZM18.75 3.75C18.75 3.41848 18.8817 3.10054 19.1161 2.86612C19.3505 2.6317 19.6685 2.5 20 2.5C20.3315 2.5 20.6495 2.6317 20.8839 2.86612C21.1183 3.10054 21.25 3.41848 21.25 3.75V7.5C21.25 7.83152 21.1183 8.14946 20.8839 8.38388C20.6495 8.6183 20.3315 8.75 20 8.75C19.6685 8.75 19.3505 8.6183 19.1161 8.38388C18.8817 8.14946 18.75 7.83152 18.75 7.5V3.75ZM8.75 3.75C8.75 3.41848 8.8817 3.10054 9.11612 2.86612C9.35054 2.6317 9.66848 2.5 10 2.5C10.3315 2.5 10.6495 2.6317 10.8839 2.86612C11.1183 3.10054 11.25 3.41848 11.25 3.75V7.5C11.25 7.83152 11.1183 8.14946 10.8839 8.38388C10.6495 8.6183 10.3315 8.75 10 8.75C9.66848 8.75 9.35054 8.6183 9.11612 8.38388C8.8817 8.14946 8.75 7.83152 8.75 7.5V3.75ZM37.5 12.5H2.5V8.125C2.50148 7.62818 2.6995 7.15212 3.05081 6.80081C3.40212 6.4495 3.87818 6.25148 4.375 6.25H7.5V7.5C7.5 8.16304 7.76339 8.79893 8.23223 9.26777C8.70107 9.73661 9.33696 10 10 10C10.663 10 11.2989 9.73661 11.7678 9.26777C12.2366 8.79893 12.5 8.16304 12.5 7.5V6.25H17.5V7.5C17.5 8.16304 17.7634 8.79893 18.2322 9.26777C18.7011 9.73661 19.337 10 20 10C20.663 10 21.2989 9.73661 21.7678 9.26777C22.2366 8.79893 22.5 8.16304 22.5 7.5V6.25H27.5V7.5C27.5 8.16304 27.7634 8.79893 28.2322 9.26777C28.7011 9.73661 29.337 10 30 10C30.663 10 31.2989 9.73661 31.7678 9.26777C32.2366 8.79893 32.5 8.16304 32.5 7.5V6.25H35.625C36.1218 6.25148 36.5979 6.4495 36.9492 6.80081C37.3005 7.15212 37.4985 7.62818 37.5 8.125V12.5Z"
                                    fill="#1260FE" />
                                <path
                                    d="M18.75 18.125C18.75 17.7935 18.6183 17.4755 18.3839 17.2411C18.1495 17.0067 17.8315 16.875 17.5 16.875H15C14.6685 16.875 14.3505 17.0067 14.1161 17.2411C13.8817 17.4755 13.75 17.7935 13.75 18.125V20C13.75 20.3315 13.8817 20.6495 14.1161 20.8839C14.3505 21.1183 14.6685 21.25 15 21.25H17.5C17.8315 21.25 18.1495 21.1183 18.3839 20.8839C18.6183 20.6495 18.75 20.3315 18.75 20V18.125ZM15 20V18.125H17.5V20H15ZM11.25 18.125C11.25 17.7935 11.1183 17.4755 10.8839 17.2411C10.6495 17.0067 10.3315 16.875 10 16.875H7.5C7.16848 16.875 6.85054 17.0067 6.61612 17.2411C6.3817 17.4755 6.25 17.7935 6.25 18.125V20C6.25 20.3315 6.3817 20.6495 6.61612 20.8839C6.85054 21.1183 7.16848 21.25 7.5 21.25H10C10.3315 21.25 10.6495 21.1183 10.8839 20.8839C11.1183 20.6495 11.25 20.3315 11.25 20V18.125ZM7.5 20V18.125H10V20H7.5ZM32.5 21.25C32.8315 21.25 33.1495 21.1183 33.3839 20.8839C33.6183 20.6495 33.75 20.3315 33.75 20V18.125C33.75 17.7935 33.6183 17.4755 33.3839 17.2411C33.1495 17.0067 32.8315 16.875 32.5 16.875H30C29.6685 16.875 29.3505 17.0067 29.1161 17.2411C28.8817 17.4755 28.75 17.7935 28.75 18.125V20C28.75 20.3315 28.8817 20.6495 29.1161 20.8839C29.3505 21.1183 29.6685 21.25 30 21.25H32.5ZM30 18.125H32.5V20H30V18.125ZM18.75 23.75C18.75 23.4185 18.6183 23.1005 18.3839 22.8661C18.1495 22.6317 17.8315 22.5 17.5 22.5H15C14.6685 22.5 14.3505 22.6317 14.1161 22.8661C13.8817 23.1005 13.75 23.4185 13.75 23.75V25.625C13.75 25.9565 13.8817 26.2745 14.1161 26.5089C14.3505 26.7433 14.6685 26.875 15 26.875H17.5C17.8315 26.875 18.1495 26.7433 18.3839 26.5089C18.6183 26.2745 18.75 25.9565 18.75 25.625V23.75ZM15 25.625V23.75H17.5V25.625H15ZM11.25 23.75C11.25 23.4185 11.1183 23.1005 10.8839 22.8661C10.6495 22.6317 10.3315 22.5 10 22.5H7.5C7.16848 22.5 6.85054 22.6317 6.61612 22.8661C6.3817 23.1005 6.25 23.4185 6.25 23.75V25.625C6.25 25.9565 6.3817 26.2745 6.61612 26.5089C6.85054 26.7433 7.16848 26.875 7.5 26.875H10C10.3315 26.875 10.6495 26.7433 10.8839 26.5089C11.1183 26.2745 11.25 25.9565 11.25 25.625V23.75ZM7.5 25.625V23.75H10V25.625H7.5ZM17.5 28.125H15C14.6685 28.125 14.3505 28.2567 14.1161 28.4911C13.8817 28.7255 13.75 29.0435 13.75 29.375V31.25C13.75 31.5815 13.8817 31.8995 14.1161 32.1339C14.3505 32.3683 14.6685 32.5 15 32.5H17.5C17.8315 32.5 18.1495 32.3683 18.3839 32.1339C18.6183 31.8995 18.75 31.5815 18.75 31.25V29.375C18.75 29.0435 18.6183 28.7255 18.3839 28.4911C18.1495 28.2567 17.8315 28.125 17.5 28.125ZM15 31.25V29.375H17.5V31.25H15ZM22.5 21.25H25C25.3315 21.25 25.6495 21.1183 25.8839 20.8839C26.1183 20.6495 26.25 20.3315 26.25 20V18.125C26.25 17.7935 26.1183 17.4755 25.8839 17.2411C25.6495 17.0067 25.3315 16.875 25 16.875H22.5C22.1685 16.875 21.8505 17.0067 21.6161 17.2411C21.3817 17.4755 21.25 17.7935 21.25 18.125V20C21.25 20.3315 21.3817 20.6495 21.6161 20.8839C21.8505 21.1183 22.1685 21.25 22.5 21.25ZM22.5 18.125H25V20H22.5V18.125ZM21.25 25.625C21.25 25.9565 21.3817 26.2745 21.6161 26.5089C21.8505 26.7433 22.1685 26.875 22.5 26.875C22.6658 26.875 22.8247 26.8092 22.9419 26.6919C23.0592 26.5747 23.125 26.4158 23.125 26.25C23.125 26.0842 23.0592 25.9253 22.9419 25.8081C22.8247 25.6908 22.6658 25.625 22.5 25.625V23.75H25C25.1658 23.75 25.3247 23.6842 25.4419 23.5669C25.5592 23.4497 25.625 23.2908 25.625 23.125C25.625 22.9592 25.5592 22.8003 25.4419 22.6831C25.3247 22.5658 25.1658 22.5 25 22.5H22.5C22.1685 22.5 21.8505 22.6317 21.6161 22.8661C21.3817 23.1005 21.25 23.4185 21.25 23.75V25.625ZM10 28.125H7.5C7.16848 28.125 6.85054 28.2567 6.61612 28.4911C6.3817 28.7255 6.25 29.0435 6.25 29.375V31.25C6.25 31.5815 6.3817 31.8995 6.61612 32.1339C6.85054 32.3683 7.16848 32.5 7.5 32.5H10C10.3315 32.5 10.6495 32.3683 10.8839 32.1339C11.1183 31.8995 11.25 31.5815 11.25 31.25V29.375C11.25 29.0435 11.1183 28.7255 10.8839 28.4911C10.6495 28.2567 10.3315 28.125 10 28.125ZM7.5 31.25V29.375H10V31.25H7.5Z"
                                    fill="#1260FE" />
                                <path
                                    d="M30.625 22.5C29.018 22.5 27.4471 22.9765 26.111 23.8693C24.7748 24.7621 23.7334 26.031 23.1185 27.5157C22.5035 29.0003 22.3426 30.634 22.6561 32.2101C22.9696 33.7862 23.7435 35.2339 24.8798 36.3702C26.0161 37.5065 27.4638 38.2804 29.0399 38.5939C30.616 38.9074 32.2497 38.7465 33.7343 38.1315C35.219 37.5166 36.4879 36.4752 37.3807 35.139C38.2735 33.8029 38.75 32.232 38.75 30.625C38.7475 28.4709 37.8907 26.4057 36.3675 24.8825C34.8443 23.3593 32.7791 22.5025 30.625 22.5ZM30.625 37.5C29.2653 37.5 27.936 37.0968 26.8055 36.3414C25.6749 35.5859 24.7937 34.5122 24.2733 33.2559C23.753 31.9997 23.6168 30.6174 23.8821 29.2838C24.1474 27.9501 24.8022 26.7251 25.7636 25.7636C26.7251 24.8022 27.9501 24.1474 29.2838 23.8821C30.6174 23.6168 31.9997 23.753 33.256 24.2733C34.5122 24.7937 35.5859 25.6749 36.3414 26.8055C37.0968 27.936 37.5 29.2653 37.5 30.625C37.4979 32.4477 36.7728 34.1951 35.484 35.484C34.1951 36.7728 32.4477 37.4978 30.625 37.5Z"
                                    fill="#1260FE" />
                                <path
                                    d="M34.2363 28.0055L29.375 32.8668L27.1656 30.6568C27.0478 30.5429 26.8899 30.4799 26.726 30.4814C26.5621 30.4828 26.4054 30.5485 26.2895 30.6644C26.1736 30.7803 26.1079 30.937 26.1065 31.1009C26.105 31.2648 26.168 31.4226 26.2819 31.5405L28.9331 34.1924C29.0503 34.3096 29.2093 34.3754 29.375 34.3754C29.5407 34.3754 29.6997 34.3096 29.8169 34.1924L35.12 28.8893C35.2339 28.7714 35.2969 28.6135 35.2954 28.4496C35.294 28.2858 35.2283 28.129 35.1124 28.0131C34.9965 27.8973 34.8398 27.8315 34.6759 27.8301C34.512 27.8287 34.3541 27.8917 34.2363 28.0055Z"
                                    fill="#1260FE" />
                            </svg>
                        </div>

                        <!-- txt -->
                        <div>
                            <h6 class="font-medium text-[18px] text-black mb-[8px]">Event Time</h6>
                            <p class="text-[16px] font-light text-etGray">{{ \Carbon\Carbon::parse($event->datetime)->format('d M Y g:i A') }}</p>
                        </div>
                    </div>

                    <div class="flex items-center gap-[20px] rev-slide-up">
                        <div
                            class="shrink-0 h-[80px] w-[80px] rounded-[6px] shadow-[0_4px_50px_10px_rgba(18,96,254,0.10)] flex items-center justify-center">
                            <svg width="28" height="40" viewBox="0 0 28 40" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M14.0762 3.12502C13.6441 3.1219 13.2918 3.46955 13.2887 3.9008C13.2855 4.33205 13.6324 4.6844 14.0644 4.68752C14.4957 4.69065 14.848 4.34377 14.8512 3.91252C14.8543 3.48127 14.5074 3.12893 14.0762 3.12502ZM14.0406 7.81244C11.0241 7.79104 8.55373 10.2246 8.53092 13.2401C8.50819 16.2555 10.943 18.7271 13.9586 18.7498L14.0004 18.7499C16.9968 18.7499 19.4456 16.3237 19.4683 13.3221C19.491 10.3069 17.0562 7.83518 14.0406 7.81244ZM14.0003 17.1875L13.9703 17.1874C11.8163 17.1711 10.0771 15.4056 10.0933 13.2518C10.1095 11.1077 11.8586 9.37471 13.9989 9.37471L14.0289 9.37486C16.1829 9.39111 17.9221 11.1566 17.9058 13.3104C17.8896 15.4546 16.1406 17.1875 14.0003 17.1875ZM17.4083 3.71752C17.0019 3.5733 16.5551 3.78619 16.4108 4.19291C16.2667 4.59963 16.4796 5.04611 16.8862 5.19033C20.3274 6.40994 22.6208 9.68737 22.5933 13.3457C22.5901 13.7771 22.9372 14.1296 23.3687 14.1328H23.3747C23.8033 14.1328 24.1525 13.7869 24.1558 13.3574C24.1883 9.03346 21.4766 5.15947 17.4083 3.71752Z"
                                    fill="#1260FE" />
                                <path
                                    d="M18.7933 29.4095C23.9896 22.7209 27.2371 19.233 27.2809 13.3811C27.3359 6.01836 21.3607 0 13.9986 0C6.7223 0 0.774021 5.89281 0.718709 13.1819C0.674021 19.1924 3.98176 22.6755 9.21394 29.4084C4.00886 30.1863 0.718709 32.1407 0.718709 34.5312C0.718709 36.1326 2.19887 37.5695 4.8866 38.5773C7.33293 39.4947 10.5694 39.9999 13.9998 39.9999C17.4302 39.9999 20.6667 39.4947 23.113 38.5773C25.8007 37.5695 27.2809 36.1325 27.2809 34.5312C27.2809 32.142 23.9938 30.188 18.7933 29.4095ZM2.28113 13.1937C2.32988 6.76172 7.57793 1.5625 13.9987 1.5625C20.4955 1.5625 25.7669 6.87406 25.7185 13.3695C25.6769 18.9268 22.233 22.3516 16.7348 29.519C15.7541 30.7968 14.8535 32.0049 14.001 33.1867C13.151 32.0042 12.2683 30.8177 11.2729 29.5185C5.54746 22.051 2.23879 18.8851 2.28113 13.1937ZM13.9998 38.4375C7.29269 38.4375 2.28113 36.3752 2.28113 34.5312C2.28113 33.1637 5.27707 31.4362 10.3144 30.838C11.4279 32.2991 12.4042 33.6264 13.3617 34.982C13.4338 35.0841 13.5293 35.1673 13.6402 35.2248C13.7511 35.2823 13.8742 35.3124 13.9991 35.3125H13.9998C14.1246 35.3125 14.2476 35.2826 14.3585 35.2253C14.4694 35.1679 14.565 35.0849 14.6371 34.983C15.5856 33.6451 16.5886 32.285 17.6925 30.8389C22.7252 31.4377 25.7185 33.1647 25.7185 34.5313C25.7184 36.3752 20.7069 38.4375 13.9998 38.4375Z"
                                    fill="#1260FE" />
                            </svg>
                        </div>

                        <!-- txt -->
                        <div>
                            <h6 class="font-medium text-[18px] text-black mb-[8px]">Location</h6>
                            <p class="text-[16px] font-light text-etGray">{{ $event->location }}</p>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</section>
<!-- ABOUT SECTION END -->


<!-- EVENT SCHEDULE SECTION START -->
@if ($event_schedule->isNotEmpty())
<div class="bg-[#00339A] relative z-[1] after:absolute after:inset-0 after:bg-no-repeat after:bg-cover after:-z-[2] after:pointer-events-none after:opacity-50 pb-[130px] xl:pb-[80px] md:pb-[60px] pt-[60px] xl:pt-[60px] md:pt-[54px]"
    style="background-image: url('{{asset('frontend/img/features-bg.jpg')}}');">
    <div
        class="container mx-auto max-w-[calc(100%-37.1vw)] xxxl:max-w-[calc(100%-350px)] xl:max-w-[calc(100%-170px)] px-[12px] lg:max-w-full rev-slide-up">
        <!-- heading -->
        <div class="text-center mb-[52px]">
            <h6 class="et-section-sub-title !text-white before:!bg-white anim-text">Event Timetable</h6>
            <h2 class="et-section-title !text-white anim-text">Information Of Event Schedule</h2>
        </div>

        <!-- cards -->
        <div
            class="grid grid-cols-4 md:grid-cols-3 sm:grid-cols-2 xxs:grid-cols-1 gap-[30px] lg:gap-[20px] items-start">
            <!-- single card -->
            @foreach ($event_schedule as $schedule)
            <div class="et-2-feature-card rounded-[30px] overflow-hidden group relative">
                <div class="bg-white p-[30px]">
                    <!-- icon -->
                    <div
                        class="w-[102px] aspect-square border-[10px] bg-etBlue border-[#EDF3FE] rounded-full flex items-center justify-center mb-[20px]">
                        <img src="{{asset('frontend/img/clock.png')}}" alt="Feature icon"
                            class="transition duration-[0.4s] group-hover:-scale-x-100">
                    </div>

                    <!-- text -->
                    <div>
                        <h5 class="font-medium text-[20px] text-etBlack mb-[8px]"> {{ $schedule->time }} </h5>
                        <p class="font-light text-etGray text-[16px]">{!! $schedule->description !!}</p>
                    </div>
                </div>

                <!-- index number -->
                <div style="border-bottom-left-radius: 10px;" class="absolute top-0 right-0 z-[1] w-[60px] aspect-square bg-etBlue font-lato font-semibold text-[20px] text-white flex items-center justify-center">
                    {{ $schedule->sl_no }}
                </div>
            </div>
            @endforeach
        </div>
    </div>

    <!-- vectors -->
    <div>
        <img src="{{asset('frontend/img/stats-vector-2.png')}}" alt="vector"
            class="pointer-events-none absolute top-[85px] right-[67px] -z-[1] opacity-10">
    </div>
</div>
@endif
<!-- EVENT SCHEDULE SECTION END -->


<!-- GALLERY SECTION START -->
<section class="grid grid-cols-4 lg:grid-cols-3 sm:grid-cols-2">
    @if (isset($galleries))
        @foreach ($galleries as $gallery)
        <!-- single gallery item -->
        <div
            class="relative z-[1] group before:absolute before:inset-0 before:bg-etBlack/70 before:z-[0] before:opacity-0 before:transition before:duration-[400ms] hover:before:opacity-100">
            <img src="{{asset('storage/' . $gallery->photo)}}" alt="gallery image">
            <a href="{{asset('storage/' . $gallery->photo)}}" data-fslightbox="gallery"
                class="inline-flex items-center justify-center w-[64px] aspect-square rounded-full bg-white text-[25px] absolute top-[50%] left-[50%] -translate-x-[50%] -translate-y-[50%] opacity-0 group-hover:opacity-100 hover:text-etBlue">
                <i class="fa-plus fa-regular"></i>
            </a>
        </div>
        @endforeach
    @endif
</section>
<!-- GALLERY SECTION END -->

<!-- TESTIMONIAL SECTION START -->
@if ($reviews->isNotEmpty())
<section class="et-testimonial overflow-hidden py-[130px] xl:py-[80px] md:py-[60px]">
    <div class="container mx-auto max-w-[1200px] px-[12px] xl:max-w-full">
        <!-- heading -->
        <div class="et-testimonial-heading text-center mb-[46px] xl:mb-[26px] lg:mb-[16px] gap-[15px]">
            <h6 class="et-section-sub-title anim-text">Testimonials</h6>
            <h2 class="et-section-title anim-text">Talks About The Event</h2>
        </div>

        <!-- slider -->
        <div class="et-2-testimonial-slider swiper overflow-visible">
            <div class="swiper-wrapper">

                @foreach ($reviews as $review)
                <!-- single testimony  -->
                <div class="swiper-slide">
                    <div
                        class="et-testimony relative p-[40px] lg:p-[30px] md:p-[20px] border border-[#D4DCED] rounded-[16px] mt-[60px]">
                        <!-- single testimony heading -->
                        <div
                            class="et-testimony__heading flex items-end justify-center mb-[17px] lg:mb-[12px] -mt-[100px] md:-mt-[80px]">
                            <div class="et-testimony__img rounded-full overflow-hidden border border-etBlue p-[7px] w-max max-w-full">
                                @if (isset($review->photo))
                                    <img src="{{asset('storage/' . $review->photo)}}" alt="reviewer image" class="w-[100px] object-cover sm:w-[80px] h-[100px] sm:h-[80px] rounded-full">
                                @else
                                    <img src="{{asset('frontend/img/user_avatar.png')}}" alt="reviewer image" class="w-[100px]  object-cover sm:w-[80px] h-[100px] sm:h-[80px] rounded-full">
                                @endif
                            </div>
                        </div>

                        <div class="text-center">
                            <h5 class="text-black font-medium text-[20px] mb-[3px]">{{ $review->name }}</h5>
                            @if (isset($review->batch))
                            <h6 class="text-[16px] text-etGray font-normal mb-[20px]">{{ $review->batch }} Batch</h6>
                            @endif
                            <p class="text-[16px] text-etGray font-normal mb-[20px]">{!! $review->message !!}</p>
                        </div>

                        <!-- quotation icon -->
                        <div class="absolute top-[40px] sm:top-[20px] left-[40px] sm:left-[20px]">
                            <img src="{{asset('frontend/img/quotation-blue.svg')}}" alt="quotation mark">
                        </div>
                    </div>
                </div>
                @endforeach

            </div>
            <div class="text-center pt-[54px]">
                <a href="{{ route('event.review') }}" class="bg-etBlue inline-flex items-center justify-center gap-[10px] h-[56px] px-[24px] rounded-[10px] text-white text-[16px] hover:bg-etBlack">Give Your Response <span class="icon"><i class="fa-solid fa-arrow-right-long"></i></span></a>
            </div>
        </div>
    </div>
</section>
@endif
<!-- TESTIMONIAL SECTION END -->

<!-- SPONSORS SECTION START -->
@if ($sponsors->isNotEmpty())
    <section class="et-2-sponsors py-[130px] lg:py-[80px] md:py-[60px] relative z-[1] before:absolute before:inset-0 before:-z-[1] before:opacity-30" style="background-color: #d1e7ff;">
        <div class="container mx-auto max-w-[calc(100%-37.1vw)] xxxl:max-w-[calc(100%-350px)] xl:max-w-[calc(100%-170px)] px-[12px] lg:max-w-full">
            <!-- heading -->
            <div class="text-center mb-[52px] xl:mb-[42px] md:mb-[32px]">
                <h6 class="et-section-sub-title anim-text">Sponsors & Exhibitors</h6>
                <h2 class="et-section-title anim-text">We're Sponsored By</h2>
            </div>

            <!-- sponsors -->
            <div class="flex flex-wrap gap-y-[60px] lg:gap-y-[40px] gap-x-[76px] xxl:gap-x-[56px] xl:gap-x-[46px] lg:gap-x-[36px] mb-[60px]">
                @foreach ($sponsors as $sponsor)
                    <div class="flex items-center">
                        @if (isset($sponsor->photo))
                            <img src="{{ asset('storage/'. $sponsor->photo)}}" alt="sponsor logo" style="height: 80px;">
                        @else
                            <span class="text-[22px] font-kalam font-semibold" style="color: #18377e;">{{ $sponsor->company }}</span>
                        @endif
                    </div>
                @endforeach
            </div>
        </div>
    </section>
@endif
<!-- SPONSORS SECTION END -->

@endsection