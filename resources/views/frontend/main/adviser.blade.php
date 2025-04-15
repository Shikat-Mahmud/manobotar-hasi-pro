@extends('frontend.master')
@section('title', 'উপদেষ্টা মণ্ডলী')
@section('content')

<!-- BREADCRUMB SECTION START -->
<section
    class="et-breadcrumb bg-[#000D83] pt-[146px] lg:pt-[146px] sm:pt-[146px] pb-[130px] lg:pb-[110px] sm:pb-[80px] relative z-[1] before:absolute before:inset-0 before:-z-[1] before:opacity-30"
    style="background-image: url('{{asset('frontend/img/page-bg.jpg')}}'); background-size: cover; background-position: center; background-repeat: no-repeat;">
    <div class="container mx-auto max-w-[1200px] px-[12px] xl:max-w-full text-center text-white">
        <h1 class="et-breadcrumb-title font-medium text-[56px] md:text-[50px] xs:text-[45px]">উপদেষ্টা মণ্ডলী</h1>
        <ul class="inline-flex items-center gap-[10px] font-medium text-[16px]">
            <li class="opacity-80"><a href="{{ route('home') }}" class="hover:text-etBlue">হোম</a></li>
            <li><i class="fa-solid fa-angle-right"></i><i class="fa-solid fa-angle-right"></i></li>
            <li class="current-page">উপদেষ্টা মণ্ডলী</li>
        </ul>
    </div>
</section>
<!-- BREADCRUMB SECTION END -->

<div class="py-[130px] lg:py-[80px] md:py-[60px]">
    <!-- TEAM MEMBER SECTION START -->
    @if ($advisers->isNotEmpty())
    <section class="et-team">
        <div class="container mx-auto max-w-[1200px] px-[12px] xl:max-w-full">
            <!-- cards -->
            <div class="grid grid-cols-3 md:grid-cols-3 sm:grid-cols-2 xxs:grid-cols-1 justify-center gap-[30px] lg:gap-[20px]">

                @foreach ($advisers as $adviser)
                <!-- single team member -->
                <div class="et-member group">
                    <div class="et-member__img rounded-[16px] overflow-hidden">
                        @if (isset($adviser->photo))
                            <img src="{{ asset('storage/' . $adviser->photo) }}" alt="Team Member Image" class="w-full duration-[400ms] group-hover:scale-110">
                        @else
                            <img src="{{ asset('frontend/img/team_member_avatar.jpg') }}" alt="Team Member Image" class="w-full duration-[400ms] group-hover:scale-110">
                        @endif
                    </div>

                    <div
                        class="et-member__txt bg-white relative z-[1] mx-[25px] md:mx-[15px] xs:mx-[5px] -mt-[44px] md:-mt-[15px] xs:mt-0 rounded-[16px] shadow-[0_4px_60px_rgba(18,96,254,0.12)] px-[25px] md:px-[15px] pb-[30px] md:pb-[20px] before:w-full before:absolute before:-z-[1] before:h-full before:bg-white before:left-0 before:rounded-[16px] before:-top-[33px] before:skew-y-[4deg]">
                        <h5 class="font-semibold text-[22px] md:text-[20px] text-etBlack mb-[4px]">{{ $adviser->name }}</h5>
                        <span class="text-etGray text-[16px]">{{ $adviser->title }}</span>
                    </div>
                </div> 
                @endforeach            

            </div>
        </div>
    </section>
    @else
    <div class="flex flex-col justify-center items-center">
        <h3 class="text-center text-[2.4rem] text-[#757277]">কোনো উপদেষ্টা পাওয়া যায়নি!</h3>
        <img src="{{ asset('images/empty.jpg') }}" alt="Photo" class="w-[350px] my-[30px]">
    </div>
    @endif
    <!-- TEAM MEMBER SECTION END -->
</div>

@endsection