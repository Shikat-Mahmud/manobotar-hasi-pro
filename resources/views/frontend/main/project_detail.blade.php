@extends('frontend.master')
@section('title', 'প্রজেক্ট' . ' - ' . $project->name)
@section('content')
    @php
        $setting = generalSettings();
    @endphp

    <!-- BREADCRUMB SECTION START -->
    <section
        class="et-breadcrumb bg-[#000D83] pt-[146px] lg:pt-[146px] sm:pt-[146px] pb-[130px] lg:pb-[110px] sm:pb-[80px] relative z-[1] before:absolute before:inset-0 before:bg-[url('{{ asset('frontend/img/breadcrumb-bg.jpg') }}')] before:bg-no-repeat before:bg-cover before:bg-center before:-z-[1] before:opacity-30"
        style="background-image: url('{{ asset('frontend/img/page-bg.jpg') }}'); background-size: cover; background-position: center; background-repeat: no-repeat;">
        <div class="container mx-auto max-w-[1200px] px-[12px] xl:max-w-full text-center text-white">
            <h1 class="et-breadcrumb-title font-medium text-[56px] md:text-[50px] xs:text-[45px]">{{ $project->name }}</h1>
            <ul class="inline-flex items-center gap-[10px] font-medium text-[16px]">
                <li class="opacity-80"><a href="{{ route('home') }}" class="hover:text-etBlue">হোম</a></li>
                <li><i class="fa-solid fa-angle-right"></i><i class="fa-solid fa-angle-right"></i></li>
                <li class="current-page">প্রজেক্টের বিস্তারিত</li>
            </ul>
        </div>
    </section>
    <!-- BREADCRUMB SECTION END -->

    <!-- main content -->
    <div class="et-event-details-content py-[130px] lg:py-[80px] md:py-[60px]">
        <div class="container mx-auto max-w-[1200px] px-[12px] xl:max-w-full">
            <div class=" gap-[30px] lg:gap-[20px] md:flex-col md:items-center">
                <!-- left content -->
                <div class="left">

                    @if (isset($project))
                        <!-- img -->
                        <div class="relative flex justify-center overflow-hidden">
                            @if (isset($project->image))
                                <img src="{{ asset('storage/' . $project->image) }}" alt="img"
                                    class="max-h-[398px] rounded-[8px]">
                            @else
                                <img src="{{ asset('frontend/img/event-details-img.jpg') }}" alt="event-details-img">
                            @endif
                        </div>

                        <!-- txt -->
                        <div class="mb-[50px] mt-[50px]">
                            <h4
                                class="text-[30px] xs:text-[25px] xxs:text-[22px] font-medium text-etBlack mb-[11px] mt-[27px]">
                                {{ $project->name }}</h4>

                            @if (isset($project->description))
                                <h6 class="font-light text-[16px] text-etGray mb-[15px]">{!! $project->description !!}</h6>
                            @endif
                        </div>
                    @endif

                    <div
                        class="et-blogs overflow-hidden pt-[30px] xl:py-[30px] md:py-[30px] relative z-[1] after:absolute">
                        <div class="container mx-auto max-w-[1200px] px-[12px] xl:max-w-full">
                            <!-- heading -->
                            <div
                                class="et-blogs-heading flex xs:flex-col justify-between items-center mb-[52px] xl:mb-[32px] lg:mb-[22px] gap-[15px]">
                                <div class="left xs:text-center">
                                    <h4
                                        class="text-[30px] xs:text-[20px] xxs:text-[20px] text-etBlack">
                                        <span>প্রজেক্টের ছবি সমূহ</span>
                                    </h4>
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

                            <div class="et-2-blogs-slider swiper p-[30px]">
                                <div class="swiper-wrapper">

                                    @foreach ($project->project_photos as $index => $photo)
                                        <div class="swiper-slide group">
                                            <div
                                                class="et-blog bg-white relative group-[.swiper-slide-visible]:shadow-[0_4px_25px_rgba(0,0,0,0.06)] rounded-[12px] overflow-hidden">
                                                <div class="et-blog__img relative overflow-hidden z-[1]">
                                                    <img src="{{ asset('storage/' . $photo) }}" alt="Photo"
                                                        class="w-full rounded-[12px] aspect-square object-cover transition duration-[400ms] group-hover:scale-105">
                                                    <a href="{{ asset('storage/' . $photo) }}" data-fslightbox="gallery"
                                                        class="inline-flex items-center justify-center w-[64px] aspect-square rounded-full bg-white text-[25px] absolute top-[50%] left-[50%] -translate-x-[50%] -translate-y-[50%] opacity-0 group-hover:opacity-100 hover:text-etBlue">
                                                        <i class="fa-plus fa-regular"></i>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>

                    @if (isset($otherProjects) && $otherProjects->count() > 0)
                        <div class="mb-[50px] mt-[50px]">
                            <h4
                                class="text-[30px] xs:text-[25px] xxs:text-[22px] font-medium text-etBlack mb-[11px] mt-[27px]">
                                আমাদের অন্যান্য প্রজেক্ট সমূহ
                            </h4>

                            <div
                                class="p-[20px] lg:p-[20px] flex flex-wrap justify-start sm:justify-center gap-x-[30px] gap-y-[20px] mb-[30px]">
                                @foreach ($otherProjects as $project)
                                    <!-- single project card -->
                                    <div class="gap-[10px] pb-[15px] flex justify-center rounded-[12px] p-[20px] relative group"
                                        style="background-color: #f0f4ff;">
                                        <div class="w-[180px]">
                                            <div class="overflow-hidden rounded-[6px]">
                                                @if (isset($project->image))
                                                    <img src="{{ asset('storage/' . $project->image) }}"
                                                        alt="{{ $project->name }}"
                                                        class="rounded-[6px] w-[180px] aspect-square transition-transform duration-300 group-hover:scale-105"
                                                        style="object-fit: cover;">
                                                @else
                                                    <img src="{{ asset('frontend/img/team_member_avatar.jpg') }}"
                                                        alt="Default Image" class="rounded-[6px] w-[180px] aspect-square">
                                                @endif
                                            </div>
                                            <h5 class="font-bold text-[18px] pt-[10px] text-etBlack text-center">
                                                {{ $project->name }}
                                            </h5>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    @endif


                    <!-- actions -->
                    <div class="border-y border-[#d9d9d9] py-[24px] flex items-center xxs:flex-col gap-[20px]">
                        <span
                            class="inline-flex items-center h-[50px] rounded-full bg-etBlue px-[20px] text-[17px] font-medium text-white gap-[10px] hover:bg-etGray">সাহায্য
                            পাঠাতে চান?</span>
                        <div class="flex gap-[12px]">
                            <span
                                class="icon bg-etBlue w-[50px] aspect-square rounded-full outline-[2px] outline outline-white -outline-offset-[3px] flex items-center justify-center">
                                <img src="{{ asset('frontend/img/call-icon.svg') }}" alt="call icon">
                            </span>

                            <span class="txt font-semibold text-etBlack">
                                <span class="block text-[14px] mb-[2px]">কল করুন</span>
                                <a href="tel:{{ $setting->business_number }}"
                                    class="text-[18px] hover:text-etBlue">{{ $setting->business_number }}</a>
                            </span>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>

@endsection
