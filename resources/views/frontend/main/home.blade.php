@extends('frontend.master')
@section('title', 'মানবতার হাসি ফাউন্ডেশন')
@section('content')
    @php
        $setting = generalSettings();
    @endphp

    <!-- BANNER SECTION START -->
    <section class="et-2-banner relative bg-etBlue max-w-[1920px]"
        style="background-image: url('{{ asset($setting->banner_image ? 'storage/' . $setting->banner_image : 'frontend/img/banner-2-bg-1.jpg') }}');">

        <div class="swiper-wrapper">
            <!-- single slide -->
            <div
                class="bg-no-repeat bg-cover bg-center pt-[clamp(140px,12.7vw,213px)] text-white relative overflow-hidden z-[1] before:content-normal before:absolute before:inset-0 before:bg-gradient-to-r before:from-[#1900B1] before:from-50% before:to-transparent before:-z-[1] before:opacity-50">
                <div class="mx-[15.5em] xxxl:mx-[10em] xxl:mx-[40px] xs:mx-[12px] mb-[132px] xl:mb-[112px] lg:mb-[82px]">
                    <div class="flex md:flex-col items-center justify-between gap-x-[30px] gap-y-[30px] md:grid-cols-1">
                        <div class="left relative z-[20] w-[80%] md:w-full">
                            <h6 class="font-bold text-[2.4rem] mb-[3px]">
                                @if (isset($about->slogan))
                                    {{ $about->slogan }}
                                @else
                                    আপনার আমার একটু প্রচেষ্টা হাসি ফুটাবে অসহায় মানুষদের মুখে ইনশাআল্লাহ!
                                @endif
                            </h6>
                            <h1 class="text-[clamp(42px,6.25vw,12rem)] font-bold leading-[1.1] mb-[36px] md:mb-[36px]">
                                @if (isset($about->organization_name))
                                    {{ $about->organization_name }}
                                @else
                                    মানবতার হাসি ফাউন্ডেশন
                                @endif
                            </h1>

                            <div class="et-banner-btns flex flex-wrap items-center gap-[20px]">
                                <a href="{{ route('donate.blood') }}"
                                    class="et-btn bg-white inline-flex items-center justify-center gap-x-[13px] h-[45px] px-[15px] text-etBlue font-normal text-[17px] rounded-full"><i
                                        class="fa-solid fa-hand-holding-droplet"></i> রক্তদানে ইচ্ছুক?</a>
                            </div>
                        </div>

                    </div>
                </div>

                <!-- counter & video button -->
                <div class="flex gap-[120px] xxxl:gap-[60px] xl:gap-[40px] lg:flex-col-reverse items-center">
                    <div class="flex shrink-0 gap-[30px] items-center">
                        <svg width="123" height="123" viewBox="0 0 123 123" fill="none"
                            xmlns="http://www.w3.org/2000/svg">
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
                    <div class="absolute left-[26px] top-[235px]"><img src="{{ asset('frontend/img/team-vector.png') }}"
                            alt="vector" class="w-[50px] !animate-none !rotate-0 md:hidden"></div>
                    <div class="absolute bottom-[352px] left-[845px]"><img
                            src="{{ asset('frontend/img/banner-vector.png') }}" alt="vector"></div>
                    <div class="absolute top-[214px] right-[190px]"><img
                            src="{{ asset('frontend/img/banner-vector-2.png') }}" alt="vector" class="w-[21px] h-[21px]">
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
                    @if (isset($about->image))
                        <img src="{{ asset('storage/' . $about->image) }}" alt="image" class="shrink-0 rounded-[50px]"
                            style="height: auto; width: 500px;" />
                    @else
                        <img src="{{ asset('frontend/img/about-2-img.png') }}" alt="image"
                            class="shrink-0 rounded-[50px]" />
                    @endif

                    @if (isset($about->image2))
                        <img src="{{ asset('storage/' . $about->image2) }}" alt="image"
                            style="height: 250px; width: auto;"
                            class="et-about-floating-img absolute top-[55px] -left-[124px] shrink-0 rounded-[20px] border-white border-[10px] shadow-[0_4px_40px_0_rgba(0,0,0,0.1)] xs:hidden" />
                    @else
                        <img src="{{ asset('frontend/img/about-2-img-2.jpg') }}" alt="image"
                            class="et-about-floating-img absolute top-[55px] -left-[124px] shrink-0 rounded-[20px] border-white border-[10px] shadow-[0_4px_40px_0_rgba(0,0,0,0.1)] xs:hidden" />
                    @endif

                    <!-- vectors -->
                    <div class="et-about-vectors">
                        <img src="{{ asset('frontend/img/about-img-vector-4.png') }}" alt="vector"
                            class="et-about-vector-1 absolute -left-[98px] top-[20px] -z-[1] xxs:hidden" />
                        <img src="{{ asset('frontend/img/team-vector.png') }}" alt="vector"
                            class="et-about-vector-2 w-[50px] absolute -left-[70px] bottom-[115px] -z-[1] !animate-none" />
                    </div>
                </div>

                <!-- right -->
                <div class="et-about__txt max-w-[570px] grow">
                    <h6 class="et-section-sub-title"><span>আমাদের প্রতিষ্ঠান</span></h6>
                    <h2 class="et-section-title mb-[24px] md:mb-[19px]"><span>{{ $about->organization_name }}</span></h2>

                    <h6 class="mb-[30px] text-[16px] text-etGray md:mb-[30px] rev-slide-up">
                        {{ $shortDescription }}
                    </h6>

                    <div class="et-banner-btns flex flex-wrap items-center gap-[20px]">
                        <a href="{{ route('about') }}"
                            class="inline-flex items-center h-[50px] rounded-full bg-etBlue px-[20px] text-[17px] font-medium text-white gap-[10px] hover:bg-etGray">
                            আরো পড়ুন <i class="fa-solid fa-arrow-right"></i></a>
                    </div>

                </div>
            </div>
        </div>
    </section>
    <!-- ABOUT SECTION END -->


    <!-- GALLERY SECTION START -->
    <section class="grid grid-cols-4 lg:grid-cols-3 sm:grid-cols-2">
        @if (isset($galleries))
            @foreach ($galleries as $gallery)
                <!-- single gallery item -->
                <div
                    class="relative z-[1] group before:absolute before:inset-0 before:bg-etBlack/70 before:z-[0] before:opacity-0 before:transition before:duration-[400ms] hover:before:opacity-100">
                    <img src="{{ asset('storage/' . $gallery->photo) }}" alt="gallery image">
                    <a href="{{ asset('storage/' . $gallery->photo) }}" data-fslightbox="gallery"
                        class="inline-flex items-center justify-center w-[64px] aspect-square rounded-full bg-white text-[25px] absolute top-[50%] left-[50%] -translate-x-[50%] -translate-y-[50%] opacity-0 group-hover:opacity-100 hover:text-etBlue">
                        <i class="fa-plus fa-regular"></i>
                    </a>
                </div>
            @endforeach
        @endif
    </section>
    <!-- GALLERY SECTION END -->


    @if ($doners->isNotEmpty())
        <!-- BLOOD DONER SECTION START -->
        <section class="et-blogs overflow-hidden pt-[130px] xl:py-[80px] md:py-[60px] relative z-[1] after:absolute"
        style="background-image: url('{{ asset('frontend/img/features-bg.png') }}'); background-size: cover; background-position: center; background-repeat: no-repeat;">
            <div class="container mx-auto max-w-[1200px] px-[12px] xl:max-w-full">
                <!-- heading -->
                <div
                    class="et-blogs-heading flex xs:flex-col justify-between items-center mb-[52px] xl:mb-[32px] lg:mb-[22px] gap-[15px]">
                    <div class="left xs:text-center">
                        <h6 class="et-section-sub-title"><span>রক্তদাতা</span></h6>
                        <h2 class="et-section-title"><span>আমাদের রক্তদাতাগণ</span></h2>
                    </div>

                    <div class="right">
                        <div class="et-blogs-slider-nav flex gap-[16px] sm:gap-[12px]">
                            <button
                                class="prev border border-[#D9D9D9] rounded-full w-[60px] sm:w-[50px] h-[60px] sm:h-[50px] text-[18px] text-etBlack hover:bg-etBlue hover:border-etbg-etBlue hover:text-white">
                                <i class="fa-solid fa-arrow-left-long"></i>
                            </button>
                            <button
                                class="next border border-[#D9D9D9] rounded-full w-[60px] sm:w-[50px] h-[60px] sm:h-[50px] text-[18px] text-etBlack hover:bg-etBlue hover:border-etbg-etBlue hover:text-white">
                                <i class="fa-solid fa-arrow-right-long"></i>
                            </button>
                        </div>
                    </div>
                </div>

                <div class="et-2-blogs-slider swiper p-[30px] -m-[30px]">
                    <div class="swiper-wrapper">

                        @foreach ($doners as $doner)
                            <!-- single doner -->
                            <div class="swiper-slide group">
                                <div
                                    class="et-blog bg-white relative group-[.swiper-slide-visible]:shadow-[0_4px_25px_rgba(0,0,0,0.06)] rounded-[12px] overflow-hidden">

                                    {{-- Donor Image --}}
                                    <div class="et-blog__img relative overflow-hidden z-[1]">
                                        @if (isset($doner->photo))
                                            <img src="{{ asset('storage/' . $doner->photo) }}" alt="{{ $doner->name }}"
                                                class="w-full aspect-square object-cover transition duration-[400ms] group-hover:scale-105">
                                        @else
                                            <img src="{{ asset('frontend/img/team_member_avatar.jpg') }}"
                                                alt="Default Image" class="w-full aspect-square object-cover">
                                        @endif
                                    </div>

                                    {{-- Donor Info --}}
                                    <div class="et-blog__txt z-[3] p-[20px] bg-white">
                                        <h4 class="text-[20px] font-semibold text-etBlack mb-[6px]">{{ $doner->name }}
                                        </h4>

                                        <div class="text-etGray2 text-[16px] mb-[10px] flex items-center gap-2">
                                            <i class="fa-solid fa-droplet" style="color: #e60202; margin-right: 5px;"></i>
                                            {{ $doner->blood_group }}
                                        </div>

                                        @php
                                            $donatedDate = \Carbon\Carbon::parse($doner->donated_at);
                                            $daysPassed = $donatedDate->diffInDays(now());
                                            $daysLeft = max(90 - $daysPassed, 0);

                                            $bnDigits = ['০', '১', '২', '৩', '৪', '৫', '৬', '৭', '৮', '৯'];
                                            $daysLeftBn = collect(str_split($daysLeft))
                                                ->map(fn($digit) => is_numeric($digit) ? $bnDigits[$digit] : $digit)
                                                ->implode('');
                                        @endphp

                                        {{-- Status Badge --}}
                                        @if ($doner->status === 1)
                                            <span
                                                class="inline-block  text-white text-[12px] px-[10px] py-[3px] rounded-[4px]"
                                                style="background-color: #057A55;">
                                                রক্তদানে প্রস্তুত
                                            </span>
                                        @else
                                            <span
                                                class="inline-block text-white text-[12px] px-[10px] py-[3px] rounded-[4px]"
                                                style="background-color: #4B5563;">
                                                {{ $daysLeftBn }} দিন বাকি
                                            </span>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        @endforeach

                    </div>
                    <div class="text-center pt-[54px]">
                        <a href="{{ route('blood-doners') }}"
                            class="bg-etBlue inline-flex items-center justify-center gap-[10px] h-[56px] px-[24px] rounded-full text-white text-[16px] hover:bg-etBlack">আরো
                            দেখুন <span class="icon"><i class="fa-solid fa-arrow-right-long"></i></span></a>
                    </div>
                </div>
            </div>

            <!-- vectors -->
            <div>
                <img src="{{ asset('frontend/img/team-vector.png') }}" alt="vector" class="pointer-events-none absolute bottom-[130px] left-[40px] -z-[1]">
                <img src="{{ asset('frontend/img/features-vector-2.png') }}" alt="vector" class="pointer-events-none absolute top-[222px] right-[180px] -z-[1]">
                <img src="{{ asset('frontend/img/features-vector-3.png') }}" alt="vector" class="pointer-events-none absolute bottom-[138px] right-[106px] -z-[1]">
            </div>
        </section>
        <!-- BLOOD DONER SECTION END -->
    @endif


    <!-- TESTIMONIAL SECTION START -->
    @if ($reviews->isNotEmpty())
        <section class="et-testimonial overflow-hidden py-[130px] xl:py-[80px] md:py-[60px]">
            <div class="container mx-auto max-w-[1200px] px-[12px] xl:max-w-full">
                <!-- heading -->
                <div class="et-testimonial-heading text-center mb-[46px] xl:mb-[26px] lg:mb-[16px] gap-[15px]">
                    <h6 class="et-section-sub-title"><span>রিভিউ</span></h6>
                    <h2 class="et-section-title"><span>ফাউন্ডেশন সম্পর্কে রিভিউ সমূহ</span></h2>
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
                                        <div
                                            class="et-testimony__img rounded-full overflow-hidden border border-etBlue p-[7px] w-max max-w-full">
                                            @if (isset($review->photo))
                                                <img src="{{ asset('storage/' . $review->photo) }}" alt="reviewer image"
                                                    class="w-[100px] object-cover sm:w-[80px] h-[100px] sm:h-[80px] rounded-full">
                                            @else
                                                <img src="{{ asset('frontend/img/user_avatar.png') }}"
                                                    alt="reviewer image"
                                                    class="w-[100px]  object-cover sm:w-[80px] h-[100px] sm:h-[80px] rounded-full">
                                            @endif
                                        </div>
                                    </div>

                                    <div class="text-center">
                                        <h5 class="text-black font-medium text-[20px] mb-[3px]">{{ $review->name }}</h5>
                                        <p class="text-[16px] text-etGray font-normal mb-[20px]">{!! $review->message !!}
                                        </p>
                                    </div>

                                    <!-- quotation icon -->
                                    <div class="absolute top-[40px] sm:top-[20px] left-[40px] sm:left-[20px]">
                                        <img src="{{ asset('frontend/img/quotation-blue.svg') }}" alt="quotation mark">
                                    </div>
                                </div>
                            </div>
                        @endforeach

                    </div>
                    <div class="text-center pt-[54px]">
                        <a href="{{ route('event.review') }}"
                            class="bg-etBlue inline-flex items-center justify-center gap-[10px] h-[56px] px-[24px] rounded-full text-white text-[16px] hover:bg-etBlack">রিভিউ
                            করুন <span class="icon"><i class="fa-solid fa-arrow-right-long"></i></span></a>
                    </div>
                </div>
            </div>
        </section>
    @endif
    <!-- TESTIMONIAL SECTION END -->

    <!-- SPONSORS SECTION START -->
    @if ($sponsors->isNotEmpty())
        <section
            class="et-2-sponsors py-[130px] lg:py-[80px] md:py-[60px] relative z-[1] before:absolute before:inset-0 before:-z-[1] before:opacity-30"
            style="background-color: #d1e7ff;">
            <div
                class="container mx-auto max-w-[calc(100%-37.1vw)] xxxl:max-w-[calc(100%-350px)] xl:max-w-[calc(100%-170px)] px-[12px] lg:max-w-full">
                <!-- heading -->
                <div class="text-center mb-[52px] xl:mb-[42px] md:mb-[32px]">
                    <h6 class="et-section-sub-title"><span>পার্টনার</span></h6>
                    <h2 class="et-section-title"><span>আমাদের পার্টনার কোম্পানীসমূহ</span></h2>
                </div>

                <!-- sponsors -->
                <div
                    class="flex flex-wrap gap-y-[60px] lg:gap-y-[40px] gap-x-[76px] xxl:gap-x-[56px] xl:gap-x-[46px] lg:gap-x-[36px] mb-[60px]">
                    @foreach ($sponsors as $sponsor)
                        <div class="flex items-center">
                            @if (isset($sponsor->photo))
                                <img src="{{ asset('storage/' . $sponsor->photo) }}" alt="sponsor logo"
                                    style="height: 80px;">
                            @else
                                <span class="text-[22px] font-kalam font-semibold"
                                    style="color: #18377e;">{{ $sponsor->company }}</span>
                            @endif
                        </div>
                    @endforeach
                </div>
            </div>
        </section>
    @endif
    <!-- SPONSORS SECTION END -->

@endsection
