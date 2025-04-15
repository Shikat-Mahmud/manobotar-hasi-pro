@extends('frontend.master')
@section('title', 'Review Form')
@section('content')

    <!-- BREADCRUMB SECTION START -->
    <section
        class="et-breadcrumb bg-[#000D83] pt-[146px] lg:pt-[146px] sm:pt-[146px] pb-[130px] lg:pb-[110px] sm:pb-[80px] relative z-[1] before:absolute before:inset-0 before:bg-[url('assets/img/breadcrumb-bg.jpg')] before:bg-no-repeat before:bg-cover before:bg-center before:-z-[1] before:opacity-30"
        style="background-image: url('{{ asset('frontend/img/page-bg.jpg') }}'); background-size: cover; background-position: center; background-repeat: no-repeat;">
        <div class="container mx-auto max-w-[1200px] px-[12px] xl:max-w-full text-center text-white">
            <h1 class="et-breadcrumb-title font-medium text-[56px] md:text-[50px] xs:text-[45px]">রিভিউ করুন</h1>
            <ul class="inline-flex items-center gap-[10px] font-medium text-[16px]">
                <li class="opacity-80"><a href="{{ route('home') }}" class="hover:text-etBlue">হোম</a></li>
                <li><i class="fa-solid fa-angle-right"></i><i class="fa-solid fa-angle-right"></i></li>
                <li class="current-page">রিভিউ</li>
            </ul>
        </div>
    </section>
    <!-- BREADCRUMB SECTION END -->

    <!-- REVIEW SECTION START -->
    <div class="py-[120px] xl:py-[80px] md:py-[60px]">
        <div class="container mx-auto max-w-[1200px] px-[12px] xl:max-w-full">
            <div class="grid grid-cols-1 justify-items-center gap-[60px] xl:gap-[40px] items-center">

                <!-- right side review form -->
                <div>

                    @if (session('success'))
                        <div class="alert alert-success font-light text-[16px] mb-[10px] p-[16px]"
                            style="color: #009e5c; background-color: #c4ffdf;">
                            {{ session('success') }} <i class="fa-solid fa-check"></i>
                        </div>
                    @endif

                    @if (session('error'))
                        <div class="alert alert-danger font-light text-[16px] mb-[10px] p-[16px]"
                            style="color: #ad3c3c; background-color: #ffd6d6;">
                            {{ session('error') }} <i class="fa-solid fa-triangle-exclamation"></i>
                        </div>
                    @endif

                    <h2 class="text-[40px] md:text-[35px] sm:text-[30px] xxs:text-[28px] font-medium text-etBlack mb-[7px]">
                        ফাউন্ডেশন সম্পর্কে মন্তব্য বা পরামর্শ
                    </h2>
                    <h6 class="text-etGray font-light text-[16px] mb-[38px]">এই উদ্যোগকে সফল করতে আপনার মূল্যবান মতামত ও
                        পরামর্শ আমাদের জন্য অত্যন্ত গুরুত্বপূর্ণ — অনুগ্রহ করে শেয়ার করুন।</h6>

                    <form action="{{ route('post.review') }}" method="post"
                        class="grid grid-cols-2 xxs:grid-cols-1 gap-[30px] xs:gap-[20px] text-[16px]"
                        enctype="multipart/form-data">
                        @csrf
                        <div>
                            <label for="et-contact-name" class="font-lato font-semibold text-etBlack block mb-[12px]">
                                <span>আপনার নামঃ</span>
                                <span style="color: red;">*</span>
                            </label>
                            <input type="text" name="name" id="et-contact-name" placeholder="আপনার নাম"
                                class="border border-[#ECECEC] h-[55px] px-[20px] xs:px-[15px] rounded-[4px] w-full focus:outline-none"
                                required>
                        </div>
                        <div>
                            <label for="et-contact-photo" class="font-lato font-semibold text-etBlack block mb-[12px]">
                                <span>আপনার ছবিঃ</span>
                            </label>
                            <input type="file" name="photo" id="et-contact-photo" accept="image/*"
                                class="border border-[#ECECEC] h-[55px] p-[20px] rounded-[4px] w-full focus:outline-none">
                        </div>
                        <div class="col-span-2 xxs:col-span-1">
                            <label for="et-contact-message" class="font-lato font-semibold text-etBlack block mb-[12px]">
                                <span>আপনার মেসেজঃ</span>
                                <span style="color: red;">*</span>
                            </label>
                            <textarea name="message" id="et-contact-message" placeholder="আপনার মেসেজ লিখুন..."
                                class="border border-[#ECECEC] h-[145px] p-[20px] rounded-[4px] w-full focus:outline-none" required></textarea>
                        </div>
                        <div>
                            <button type="submit"
                                class="bg-etBlue h-[55px] px-[24px] rounded-[10px] text-[16px] font-medium text-white hover:bg-etBlack">
                                <span>সাবমিট</span>
                                <span class="icon pl-[10px]">
                                    <i class="fa-solid fa-arrow-right-long"></i>
                                </span>
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- REVIEW SECTION END -->
@endsection
