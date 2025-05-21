@extends('frontend.master')
@section('title', 'যোগাযোগ')
@section('content')

    <!-- BREADCRUMB SECTION START -->
    <section
        class="et-breadcrumb bg-[#000D83] pt-[146px] lg:pt-[146px] sm:pt-[146px] pb-[130px] lg:pb-[110px] sm:pb-[80px] relative z-[1] before:absolute before:inset-0 before:-z-[1] before:opacity-30"
        style="background-image: url('{{ asset('frontend/img/page-bg.jpg') }}'); background-size: cover; background-position: center; background-repeat: no-repeat;">
        <div class="container mx-auto max-w-[1200px] px-[12px] xl:max-w-full text-center text-white">
            <h1 class="et-breadcrumb-title font-medium text-[56px] md:text-[50px] xs:text-[45px]">আমাদের সাথে যোগাযোগ করুন
            </h1>
            <ul class="inline-flex items-center gap-[10px] font-medium text-[16px]">
                <li class="opacity-80"><a href="{{ route('home') }}" class="hover:text-etBlue">হোম</a></li>
                <li><i class="fa-solid fa-angle-right"></i><i class="fa-solid fa-angle-right"></i></li>
                <li class="current-page">যোগাযোগ</li>
            </ul>
        </div>
    </section>
    <!-- BREADCRUMB SECTION END -->

    <!-- CONTACT SECTION START -->
    <div class="py-[120px] xl:py-[80px] md:py-[60px]">
        <div class="container mx-auto max-w-[1200px] px-[12px] xl:max-w-full">
            <div class="grid grid-cols-2 md:grid-cols-1 gap-[60px] xl:gap-[40px] items-center">
                <!-- left side contact infos -->
                <div>

                    @if (isset($settings))
                        <div class="bg-etBlue p-[40px] sm:p-[30px] space-y-[24px] text-[16px]">
                            <!-- single contact info -->
                            <div
                                class="flex flex-wrap items-center gap-[20px] pb-[20px] text-white border-b border-white/30 last:border-0 last:pb-0">
                                <span
                                    class="icon shrink-0 border border-dashed border-white rounded-full h-[62px] w-[62px] flex items-center justify-center">
                                    <img src="{{ asset('frontend/img/call-msg.svg') }}" alt="icon">
                                </span>

                                <div class="txt">
                                    <span class="font-light">কল করুন ৭/২৪</span>
                                    <h4 class="font-semibold text-[24px]"><a
                                            href="tel:{{ $settings->business_number }}">{{ $settings->business_number }}</a>
                                    </h4>
                                </div>
                            </div>

                            <!-- single contact info -->
                            <div
                                class="flex flex-wrap items-center gap-[20px] pb-[20px] text-white border-b border-white/30 last:border-0 last:pb-0">
                                <span
                                    class="icon shrink-0 border border-dashed border-white rounded-full h-[62px] w-[62px] flex items-center justify-center">
                                    <img src="{{ asset('frontend/img/mail.svg') }}" alt="icon">
                                </span>

                                <div class="txt">
                                    <span class="font-light">ইমেইল</span>
                                    <h4 class="font-semibold text-[24px]"><a
                                            href="mailto:{{ $settings->business_email }}">{{ $settings->business_email }}</a>
                                    </h4>
                                </div>
                            </div>
                    @endif

                    <!-- single contact info -->
                    <div
                        class="flex flex-wrap items-center gap-[20px] pb-[20px] text-white border-b border-white/30 last:border-0 last:pb-0">
                        <span
                            class="icon shrink-0 border border-dashed border-white rounded-full h-[62px] w-[62px] flex items-center justify-center">
                            <img src="{{ asset('frontend/img/location-dot-circle.svg') }}" alt="icon">
                        </span>

                        <div class="txt">
                            <span class="font-light">হেড অফিস</span>
                            @if (isset($settings->business_address))
                                <h4 class="font-semibold text-[24px]">{{ $settings->business_address }}</h4>
                            @else
                                <h4 class="font-semibold text-[24px]">বালি মসজিদ, দুর্গাপুর, বেগমগঞ্জ, নোয়াখালী।</h4>
                            @endif
                        </div>
                    </div>
                </div>

                <!-- photo cover -->
                <div class="relative">
                    @if (isset($about->image))
                        <img src="{{ asset('storage/' . $about->image) }}" alt="image cover" class="w-full">
                    @else
                        <img src="{{ asset('frontend/img/contact-video-cover.jpg') }}" alt="image cover"
                            class="w-full">
                    @endif
                </div>
            </div>

            <!-- right side contact form -->
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

                <h2 class="text-[40px] md:text-[35px] sm:text-[30px] xxs:text-[28px] font-medium text-etBlack mb-[7px]">কোনো
                    জিজ্ঞাসা বা পরামর্শ আছে?</h2>
                <p class="text-etGray font-light text-[16px] mb-[38px]">এটি সফল করতে আমাদের সাহায্য করার জন্য আপনার
                    প্রত্যাশা এবং যেকোনো পরামর্শ শেয়ার করুন।</p>

                <form action="{{ route('post.contact') }}" method="post"
                    class="grid grid-cols-2 xxs:grid-cols-1 gap-[30px] xs:gap-[20px] text-[16px]">
                    @csrf
                    <div>
                        <label for="et-contact-name" class="font-lato font-semibold text-etBlack block mb-[12px]"><span
                                class="font-bold">আপনার নামঃ</span> <span style="color: red;">*</span></label>
                        <input type="text" name="name" id="et-contact-name" placeholder="আপনার নাম"
                            class="border border-[#ECECEC] h-[55px] px-[20px] xs:px-[15px] rounded-[4px] w-full focus:outline-none"
                            required>
                    </div>
                    <div>
                        <label for="et-contact-email" class="font-lato font-semibold text-etBlack block mb-[12px]"><span
                                class="font-bold">আপনার ইমেইলঃ</span> </label>
                        <input type="email" name="email" id="et-contact-email" placeholder="আপনার ইমেইল"
                            class="border border-[#ECECEC] h-[55px] px-[20px] xs:px-[15px] rounded-[4px] w-full focus:outline-none">
                    </div>
                    <div class="col-span-2 xxs:col-span-1">
                        <label for="et-contact-message" class="font-lato font-semibold text-etBlack block mb-[12px]"><span
                                class="font-bold">মেসেজঃ</span> <span style="color: red;">*</span></label>
                        <textarea name="message" id="et-contact-message" placeholder="আপনার মেসেজ লিখুন..."
                            class="border border-[#ECECEC] h-[145px] p-[20px] rounded-[4px] w-full focus:outline-none" required></textarea>
                    </div>
                    <div>
                        <button type="submit"
                            class="bg-etBlue h-[55px] px-[24px] rounded-[10px] text-[16px] font-medium text-white hover:bg-etBlack">সাবমিট
                            করুন <span class="icon pl-[10px]"><i class="fa-solid fa-arrow-right-long"></i></span></button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    </div>
    <!-- CONTACT SECTION END -->
@endsection
