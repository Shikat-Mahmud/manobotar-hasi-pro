@extends('frontend.master')
@section('title', 'রক্তদাতা রেজিস্ট্রেশন')
@push('styles')
<style>
    .reg-ul {
        list-style-type: none;
        padding: 0;
    }
    .reg-li {
        display: inline-block;
        margin-right: 10px;
    }
    .reg-li i {
        margin-right: 5px;
    }
</style>
@endpush
@section('content')

<!-- BREADCRUMB SECTION START -->
<section
    class="et-breadcrumb bg-[#000D83] pt-[146px] lg:pt-[146px] sm:pt-[146px] pb-[130px] lg:pb-[110px] sm:pb-[80px] relative z-[1] before:absolute before:inset-0 before:-z-[1] before:opacity-30"
    style="background-image: url('{{asset('frontend/img/upcomng-events-bg.jpg')}}'); background-size: cover; background-position: center; background-repeat: no-repeat;">
    <div class="container mx-auto max-w-[1200px] px-[12px] xl:max-w-full text-center text-white">
        <h1 class="et-breadcrumb-title font-medium text-[56px] md:text-[50px] xs:text-[45px]">রক্তদাতা রেজিস্ট্রেশন</h1>
        <ul class="inline-flex items-center gap-[10px] font-medium text-[16px]">
            <li class="opacity-80"><a href="{{ route('home') }}" class="hover:text-etBlue">হোম</a></li>
            <li><i class="fa-solid fa-angle-right"></i><i class="fa-solid fa-angle-right"></i></li>
            <li class="current-page">রক্তদাতা রেজিস্ট্রেশন</li>
        </ul>
    </div>
</section>
<!-- BREADCRUMB SECTION END -->

<!-- TICKET SECTION START -->
<div class="py-[120px] xl:py-[80px] md:py-[60px]">
    <div class="container mx-auto max-w-[1200px] px-[12px] xl:max-w-full">
        <div class="grid grid-cols-1 justify-items-center gap-[60px] xl:gap-[40px] items-center">
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

                @if (session('warning'))
                    <div class="alert alert-danger font-light text-[16px] mb-[10px] p-[16px]"
                        style="color: #d68917; background-color: #ffdead;">
                        {{ session('warning') }} <i class="fa-solid fa-triangle-exclamation"></i>
                    </div>
                @endif

                <h4 class="text-[24px] md:text-[35px] sm:text-[30px] xxs:text-[28px] font-medium text-etBlack mb-[20px]">রক্তদানের জন্য উক্ত ফর্মটি পূরণ করে রেজিস্ট্রেশন করুন</h4>
                
                <form action="{{ route('donate.blood.post') }}" method="post" class="grid grid-cols-2 xxs:grid-cols-1 gap-[30px] xs:gap-[20px] text-[16px]" enctype="multipart/form-data">
                    @csrf
                    <div>
                        <label for="et-contact-name" class="font-lato font-semibold text-etBlack block mb-[12px]"><span>নামঃ</span> <span style="color: red;">*</span></label>
                        <input type="text" name="name" id="et-contact-name" placeholder="আপনার নাম" class="border border-[#ECECEC] h-[55px] px-[20px] xs:px-[15px] rounded-[4px] w-full focus:outline-none" required>
                    </div>
                    <div>
                        <label for="et-contact-blood-group" class="font-lato font-semibold text-etBlack block mb-[12px]"><span>রক্তের গ্রুপঃ</span> <span style="color: red;">*</span></label>
                        <select name="blood_group" id="et-contact-blood-group" class="border border-[#ECECEC] h-[55px] px-[20px] xs:px-[15px] rounded-[4px] w-full focus:outline-none" required>
                            <option value="">রক্তের গ্রুপ নির্বাচন করুন</option>
                            @foreach ($bloodGroups as $blood_group)
                                <option value="{{ $blood_group }}">{{ $blood_group }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div>
                        <label for="et-contact-phone" class="font-lato font-semibold text-etBlack block mb-[12px]"><span>মোবাইল নম্বরঃ</span> <span style="color: red;">*</span></label>
                        <input type="tel" name="phone" id="et-contact-phone" placeholder="আপনার মোবাইল নম্বর" class="border border-[#ECECEC] h-[55px] px-[20px] xs:px-[15px] rounded-[4px] w-full focus:outline-none" required>
                    </div>
                    <div>
                        <label for="et-contact-email" class="font-lato font-semibold text-etBlack block mb-[12px]"><span>ইমেইলঃ</span> <span class="text-[#707882] text-[12px]">(ঐচ্ছিক)</span></label>
                        <input type="email" name="email" id="et-contact-email" placeholder="আপনার ইমেইল" class="border border-[#ECECEC] h-[55px] px-[20px] xs:px-[15px] rounded-[4px] w-full focus:outline-none">
                    </div>
                    <div class="col-span-2 xxs:col-span-1">
                        <label for="et-contact-address" class="font-lato font-semibold text-etBlack block mb-[12px]"><span>ঠিকানাঃ</span> <span style="color: red;">*</span></label>
                        <input type="text" name="address" id="et-contact-address" placeholder="আপনার ঠিকানা (যেমনঃ বালি মসজিদ, দূর্গাপুর, বেগমগঞ্জ, নোয়াখালী।)" class="border border-[#ECECEC] h-[55px] px-[20px] xs:px-[15px] rounded-[4px] w-full focus:outline-none" row="2" required>
                    </div>
                    <div class="col-span-2 xxs:col-span-1">
                        <label for="et-contact-photo" class="font-lato font-semibold text-etBlack block mb-[12px]"><span>ছবিঃ</span> <span class="text-[#707882] text-[12px]">(সর্বোচ্চ ৫ এমবি)</span></label>
                        <input type="file" name="photo" id="et-contact-photo" accept="image/*" class="border border-[#ECECEC] h-[55px] p-[20px] rounded-[4px] w-full focus:outline-none">
                    </div>
                    <div>
                        <button type="submit" class="bg-etBlue h-[55px] px-[24px] rounded-[10px] text-[16px] font-medium text-white hover:bg-etBlack">সাবমিট করুন <span class="icon pl-[10px]"><i class="fa-solid fa-arrow-right-long"></i></span>
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- TICKET SECTION END -->
@endsection
@push('scripts')
<script>
    $(document).ready(function () {
        // Show/hide batch and guest input based on role selection
        $('input[name="role"]').change(function () {
            if ($(this).val() === 'teacher') {
                $('#batch-input').hide().find('select').prop('required', false);
                $('#guest-input').show();
                $('#et-contact-suggestion').val(''); // Clear suggestion when Teacher is selected
            } else if ($(this).val() === 'staff') {
                $('#batch-input').hide().find('select').prop('required', false);
                $('#guest-input').hide().find('input').val(0);
                $('#et-contact-suggestion').val('staff'); // Set suggestion to 'staff' when Staff is selected
            } else {
                $('#batch-input').show().find('select').prop('required', true);
                $('#guest-input').show();
                $('#et-contact-suggestion').val(''); // Clear suggestion when Student is selected
            }
            updateAmount();
        });

        $('#et-contact-batch').change(function () {
            updateAmount();
        });

        $('#decrease-guest').click(function () {
            let currentValue = parseInt($('#et-contact-guest').val(), 10);
            if (currentValue > 0) {
                $('#et-contact-guest').val(currentValue - 1);
                updateAmount();
            }
        });

        $('#increase-guest').click(function () {
            let currentValue = parseInt($('#et-contact-guest').val(), 10);
            $('#et-contact-guest').val(currentValue + 1);
            updateAmount();
        });

        function updateAmount() {
            let baseAmount = ($('#et-contact-batch').val() <= 2023 && $('#et-contact-batch').val() >= 1999) ? 1000 : 500;
            let guestCount = parseInt($('#et-contact-guest').val(), 10);
            if ($('input[name="role"]:checked').val() === 'staff' || $('input[name="role"]:checked').val() === 'teacher') {
                    baseAmount = 500; // Assuming teacher and staff have base amount 500
                }
            let totalAmount = baseAmount + (guestCount * 500);
            $('#et-contact-amount').val(totalAmount);
        }

        // Initialize form
        $('input[name="role"]:checked').trigger('change');
    });
</script>
@endpush