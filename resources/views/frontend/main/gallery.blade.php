@extends('frontend.master')
@section('title', 'Gallery')
@section('content')

<!-- BREADCRUMB SECTION START -->
<section
    class="et-breadcrumb bg-[#000D83] pt-[146px] lg:pt-[146px] sm:pt-[146px] pb-[130px] lg:pb-[110px] sm:pb-[80px] relative z-[1] before:absolute before:inset-0 before:-z-[1] before:opacity-30"
    style="background-image: url('{{asset('/')}}frontend/img/banner-bg-3.jpg'); background-size: cover; background-position: center; background-repeat: no-repeat;">
    <div class="container mx-auto max-w-[1200px] px-[12px] xl:max-w-full text-center text-white">
        <h1 class="et-breadcrumb-title font-medium text-[56px] md:text-[50px] xs:text-[45px]">Our Gallery</h1>
        <ul class="inline-flex items-center gap-[10px] font-medium text-[16px]">
            <li class="opacity-80"><a href="{{ route('home') }}" class="hover:text-etBlue">Home</a></li>
            <li><i class="fa-solid fa-angle-right"></i><i class="fa-solid fa-angle-right"></i></li>
            <li class="current-page">Our Gallery</li>
        </ul>
    </div>
</section>
<!-- BREADCRUMB SECTION END -->

<!-- GALLERY SECTION START -->
<div class="py-[130px] xl:py-[80px] md:py-[60px]">
    <div
        class="container mx-auto max-w-[calc(100%-37.1vw)] xxxl:max-w-[calc(100%-350px)] xl:max-w-[calc(100%-170px)] px-[12px] lg:max-w-full">
        @if ($galleries->isNotEmpty())
            <div class="grid grid-cols-3 sm:grid-cols-2 xxs:grid-cols-1 gap-[30px] lg:gap-[20px]">
                @foreach ($galleries as $gallery)
                    <div
                        class="relative z-[1] group before:absolute before:inset-0 before:bg-etBlack/70 before:z-[0] before:opacity-0 before:transition before:duration-[400ms] hover:before:opacity-100">
                        <img src="{{asset('storage/' . $gallery->photo)}}" alt="gallery image">
                        <a href="{{asset('storage/' . $gallery->photo)}}" data-fslightbox="gallery"
                            class="inline-flex items-center justify-center w-[64px] aspect-square rounded-full bg-white text-[25px] absolute top-[50%] left-[50%] -translate-x-[50%] -translate-y-[50%] opacity-0 group-hover:opacity-100 hover:text-etBlue">
                            <i class="fa-plus fa-regular"></i>
                        </a>
                    </div>
                @endforeach
            </div>
        @else
            <div class="flex flex-col justify-center items-center">
                <h3 class="text-center text-[2.4rem] text-[#757277]">There is no image in your gallery!</h3>
                <img src="{{ asset('/') }}images/empty.jpg" alt="Photo" class="w-[350px] my-[30px]">
            </div>
        @endif
    </div>
</div>
<!-- GALLERY SECTION END -->

@endsection