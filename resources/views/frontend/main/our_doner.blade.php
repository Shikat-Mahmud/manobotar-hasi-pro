@extends('frontend.master')
@section('title', 'Donations')
@section('content')

<!-- BREADCRUMB SECTION START -->
<section
    class="et-breadcrumb bg-[#000D83] pt-[146px] lg:pt-[146px] sm:pt-[146px] pb-[130px] lg:pb-[110px] sm:pb-[80px] relative z-[1] before:absolute before:inset-0 before:bg-[url('{{ asset('/') }}frontend/img/breadcrumb-bg.jpg')] before:bg-no-repeat before:bg-cover before:bg-center before:-z-[1] before:opacity-30"
    style="background-image: url('{{asset('/')}}frontend/img/upcomng-events-bg.jpg'); background-size: cover; background-position: center; background-repeat: no-repeat;">
    <div class="container mx-auto max-w-[1200px] px-[12px] xl:max-w-full text-center text-white">
        <h1 class="et-breadcrumb-title font-medium text-[56px] md:text-[50px] xs:text-[45px]">Donations</h1>
        <ul class="inline-flex items-center gap-[10px] font-medium text-[16px]">
            <li class="opacity-80"><a href="{{ route('home') }}" class="hover:text-etBlue">Home</a></li>
            <li><i class="fa-solid fa-angle-right"></i><i class="fa-solid fa-angle-right"></i></li>
            <li class="current-page">Donations</li>
        </ul>
    </div>
</section>
<!-- BREADCRUMB SECTION END -->

<!-- main content -->
<div class="et-event-details-content py-[130px] lg:py-[80px] md:py-[60px]">
    <div class="container mx-auto max-w-[1200px] px-[12px] xl:max-w-full">
        <div class=" gap-[30px] lg:gap-[20px] md:flex-col md:items-center">

            <!-- artists -->
            @if ($doners->isNotEmpty())
            <div>
                <h3 class="text-[30px] xs:text-[25px] font-semibold text-etBlack mb-[30px] xs:mb-[15px]">Our Doners</h3>
                <div class="p-[20px] lg:p-[20px] flex flex-wrap justify-start sm:justify-center gap-x-[25px] gap-y-[10px] mb-[30px]">

                    @foreach ($doners as $doner)
                        <!-- single artist -->
                        <div
                            class="gap-[10px] pb-[15px] flex justify-center border border-[#d9d9d9] rounded-[12px] p-[30px]">
                            <div class="w-[168px]">
                                <div class="overflow-hidden">
                                    @if (isset($doner->photo))
                                        <img src="{{ asset('storage/' . $doner->photo) }}" alt="Doner Image" class="rounded-[6px] w-[168px] aspect-square" style="object-fit: cover;">
                                    @else
                                        <img src="{{ asset('/') }}frontend/img/team_member_avatar.jpg" alt="Doner Image" class="rounded-[6px] w-[168px] aspect-square">
                                    @endif
                                </div>
                                <h5 class="font-semibold text-[16px] pt-[10px] text-etBlack">{{ $doner->name }}</h5>
                            </div>
                        </div>
                    @endforeach

                </div>
            </div>
            @else
            <div class="flex flex-col justify-center items-center">
                <h3 class="text-center text-[2.4rem] text-[#757277]">There is no data of doners!</h3>
                <img src="{{ asset('/') }}images/empty.jpg" alt="Photo" class="w-[350px] my-[30px]">
            </div>
            @endif

            <!-- actions -->
            <div class="border-y border-[#d9d9d9] py-[24px] flex items-center xxs:flex-col gap-[20px]">
                <div class="inline-flex items-center h-[50px] rounded-full bg-etBlue px-[20px] text-[17px] font-medium text-white gap-[10px]">You Can Donate <i class="fa-arrow-right-long fa-solid"></i></div>
                <div class="flex gap-[12px]">
                    <span
                        class="icon bg-etBlue w-[50px] aspect-square rounded-full outline-[2px] outline outline-white -outline-offset-[3px] flex items-center justify-center">
                        <img src="{{ asset('/') }}frontend/img/call-icon.svg" alt="call icon">
                    </span>

                    <span class="txt font-semibold text-etBlack">
                        <span class="block text-[14px] mb-[2px]">Call Us Now</span>
                        <a href="tel:{{ $setting->business_number }}"
                            class="text-[18px] hover:text-etBlue">{{ $setting->business_number }}</a>
                    </span>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection