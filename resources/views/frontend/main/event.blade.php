@extends('frontend.master')
@section('title', 'Event')
@section('content')

<!-- BREADCRUMB SECTION START -->
<section class="et-breadcrumb bg-[#000D83] pt-[146px] lg:pt-[146px] sm:pt-[146px] pb-[130px] lg:pb-[110px] sm:pb-[80px] relative z-[1] before:absolute before:inset-0 before:bg-[url('{{ asset('/') }}frontend/img/breadcrumb-bg.jpg')] before:bg-no-repeat before:bg-cover before:bg-center before:-z-[1] before:opacity-30" 
style="background-image: url('{{asset('/')}}frontend/img/upcomng-events-bg.jpg'); background-size: cover; background-position: center; background-repeat: no-repeat;">
    <div class="container mx-auto max-w-[1200px] px-[12px] xl:max-w-full text-center text-white">
        <h1 class="et-breadcrumb-title font-medium text-[56px] md:text-[50px] xs:text-[45px]">Event Details</h1>
        <ul class="inline-flex items-center gap-[10px] font-medium text-[16px]">
            <li class="opacity-80"><a href="{{ route('home') }}" class="hover:text-etBlue">Home</a></li>
            <li><i class="fa-solid fa-angle-right"></i><i class="fa-solid fa-angle-right"></i></li>
            <li class="current-page">Event Details</li>
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

                @if (isset($event))
                <!-- img -->
                <div class="relative flex justify-center overflow-hidden">
                    @if (isset($event->image))
                        <img src="{{ asset('storage/' . $event->image) }}" alt="event-details-img" class="max-h-[398px] rounded-[8px]">
                    @else
                        <img src="{{ asset('/') }}frontend/img/event-details-img.jpg" alt="event-details-img">
                    @endif
                </div>

                <!-- txt -->
                <div class="mb-[50px] mt-[50px]">
                    <h4 class="text-[30px] xs:text-[25px] xxs:text-[22px] font-medium text-etBlack mb-[11px] mt-[27px]">{{ $event->name }}</h4>
                    <p class="font-light text-[16px] text-etGray mb-[15px]">{!! $event->description !!}</p>
                </div>
                @endif

                @if ($event_schedule->isNotEmpty())
                <div class="p-[50px]" style="background-image: url('{{asset('/')}}frontend/img/footer-bg.jpg'); background-size: cover; background-position: center; background-repeat: no-repeat;">
                    <!-- heading -->
                    <div class="text-center mb-[52px]">
                        <h6 class="et-section-sub-title !text-white before:!bg-white anim-text">Event Timetable</h6>
                        <h2 class="et-section-title !text-white anim-text">Information Of Event Schedule</h2>
                    </div>
                    <!-- cards -->
                    <div class="grid grid-cols-4 md:grid-cols-3 sm:grid-cols-2 xxs:grid-cols-1 gap-[30px] lg:gap-[20px] items-start">
                        <!-- single card -->
                        @foreach ($event_schedule as $schedule)
                            <div class="et-2-feature-card rounded-[30px] overflow-hidden group relative">
                                <div class="bg-white p-[30px]">
                                    <!-- icon -->
                                    <div
                                        class="w-[102px] aspect-square border-[10px] bg-etBlue border-[#EDF3FE] rounded-full flex items-center justify-center mb-[20px]">
                                        <img src="{{asset('/')}}frontend/img/clock.png" alt="Feature icon"
                                            class="transition duration-[0.4s] group-hover:-scale-x-100">
                                    </div>

                                    <!-- text -->
                                    <div>
                                        <h5 class="font-medium text-[20px] text-etBlack mb-[8px]"> {{ $schedule->time }} </h5>
                                        <p class="font-light text-etGray text-[16px]">{!! $schedule->description !!}</p>
                                    </div>
                                </div>

                                <!-- index number -->
                                <div style="border-bottom-left-radius: 10px;"
                                    class="absolute top-0 right-0 z-[1] w-[60px] aspect-square bg-etBlue font-lato font-semibold text-[20px] text-white flex items-center justify-center">
                                    {{ $schedule->sl_no }}
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>                
                @endif

                <!-- actions -->
                <div class="border-y border-[#d9d9d9] py-[24px] flex items-center xxs:flex-col gap-[20px]">
                    <a href="{{ route('ticket') }}" class="inline-flex items-center h-[50px] rounded-full bg-etBlue px-[20px] text-[17px] font-medium text-white gap-[10px] hover:bg-etGray">Register Yourself <i class="fa-arrow-right-long fa-solid"></i></a>
                    <div class="flex gap-[12px]">
                        <span class="icon bg-etBlue w-[50px] aspect-square rounded-full outline-[2px] outline outline-white -outline-offset-[3px] flex items-center justify-center">
                            <img src="{{ asset('/') }}frontend/img/call-icon.svg" alt="call icon">
                        </span>

                        <span class="txt font-semibold text-etBlack">
                            <span class="block text-[14px] mb-[2px]">Call Us Now</span>
                            <a href="tel:{{ $setting->business_number }}" class="text-[18px] hover:text-etBlue">{{ $setting->business_number }}</a>
                        </span>
                    </div>
                </div>

                <!-- artists -->
                @if($guests->isNotEmpty())
                <div class="mt-[50px]">
                    <h3 class="text-[30px] xs:text-[25px] font-semibold text-etBlack mb-[30px] xs:mb-[15px]">Our Guests</h3>
                    <div class="p-[20px] lg:p-[20px] flex flex-wrap justify-start sm:justify-center gap-x-[25px] gap-y-[10px] mb-[30px]">

                        @foreach ($guests as $guest)
                            <!-- single artist -->
                            <div class="gap-[10px] pb-[15px] flex justify-center border border-[#d9d9d9] rounded-[12px] p-[30px]">
                                <div class="w-[168px]">
                                    <div class="overflow-hidden">
                                        @if (isset($guest->photo))
                                            <img src="{{ asset('storage/' . $guest->photo) }}" alt="Guest Image" class="rounded-[6px] w-[168px] aspect-square" style="object-fit: cover;">
                                        @else
                                            <img src="{{ asset('/') }}frontend/img/team_member_avatar.jpg" alt="Guest Image" class="rounded-[6px] w-[168px] aspect-square">
                                        @endif
                                    </div>
                                    <h5 class="font-semibold text-[20px] pt-[10px] text-etBlack">{{ $guest->name }}</h5>
                                    <span class="inline-block text-etGray2 text-[16px]">{{ $guest->designation }}</span>
                                </div>
                            </div>
                        @endforeach
                        
                    </div>
                </div>
                @endif

            </div>
        </div>
    </div>
</div>

@endsection