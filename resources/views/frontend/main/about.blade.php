@extends('frontend.master')
@section('title', 'আমাদের মিশন')
@section('content')
    @php
        $setting = generalSettings();
    @endphp

    <!-- BREADCRUMB SECTION START -->
    <section
        class="et-breadcrumb bg-[#000D83] pt-[146px] lg:pt-[146px] sm:pt-[146px] pb-[130px] lg:pb-[110px] sm:pb-[80px] relative z-[1] before:absolute before:inset-0 before:bg-[url('{{ asset('frontend/img/breadcrumb-bg.jpg') }}')] before:bg-no-repeat before:bg-cover before:bg-center before:-z-[1] before:opacity-30"
        style="background-image: url('{{ asset('frontend/img/page-bg.jpg') }}'); background-size: cover; background-position: center; background-repeat: no-repeat;">
        <div class="container mx-auto max-w-[1200px] px-[12px] xl:max-w-full text-center text-white">
            <h1 class="et-breadcrumb-title font-medium text-[56px] md:text-[50px] xs:text-[45px]">আমাদের মিশন</h1>
            <ul class="inline-flex items-center gap-[10px] font-medium text-[16px]">
                <li class="opacity-80"><a href="{{ route('home') }}" class="hover:text-etBlue">হোম</a></li>
                <li><i class="fa-solid fa-angle-right"></i><i class="fa-solid fa-angle-right"></i></li>
                <li class="current-page">আমাদের মিশন</li>
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

                    @if (isset($about))
                        <!-- img -->
                        <div class="relative flex justify-center overflow-hidden">
                            @if (isset($about->image))
                                <img src="{{ asset('storage/' . $about->image) }}" alt="event-details-img"
                                    class="max-h-[398px] rounded-[8px]">
                            @else
                                <img src="{{ asset('frontend/img/event-details-img.jpg') }}" alt="event-details-img">
                            @endif
                        </div>

                        <!-- txt -->
                        <div class="mb-[50px] mt-[50px]">
                            <h4
                                class="text-[30px] xs:text-[25px] xxs:text-[22px] font-medium text-etBlack mb-[11px] mt-[27px]">
                                {{ $about->organization_name }}</h4>
                            <h6 class="font-light text-[16px] text-etGray mb-[15px]">{!! $about->description !!}</h6>

                            @if (isset($about->other_info))
                                <h6 class="font-light text-[16px] text-etGray mb-[15px] mt-[50px]">{!! $about->other_info !!}
                                </h6>
                            @endif
                        </div>
                    @endif

                    @if (isset($projects) && $projects->count() > 0)
                        <div class="mb-[50px] mt-[50px]">
                            <h4
                                class="text-[30px] xs:text-[25px] xxs:text-[22px] font-medium text-etBlack mb-[11px] mt-[27px]">
                                আমাদের প্রজেক্ট সমূহ
                            </h4>

                            <div
                                class="p-[20px] lg:p-[20px] flex flex-wrap justify-start sm:justify-center gap-x-[30px] gap-y-[20px] mb-[30px]">
                                @foreach ($projects as $project)
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
