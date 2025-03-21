@extends('frontend.master')
@section('title', 'Get Ticket')
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
    style="background-image: url('{{asset('/')}}frontend/img/upcomng-events-bg.jpg'); background-size: cover; background-position: center; background-repeat: no-repeat;">
    <div class="container mx-auto max-w-[1200px] px-[12px] xl:max-w-full text-center text-white">
        <h1 class="et-breadcrumb-title font-medium text-[56px] md:text-[50px] xs:text-[45px]">Get Ticket</h1>
        <ul class="inline-flex items-center gap-[10px] font-medium text-[16px]">
            <li class="opacity-80"><a href="{{ route('home') }}" class="hover:text-etBlue">Home</a></li>
            <li><i class="fa-solid fa-angle-right"></i><i class="fa-solid fa-angle-right"></i></li>
            <li class="current-page">Get Ticket</li>
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

                <h2 class="text-[40px] md:text-[35px] sm:text-[30px] xxs:text-[28px] font-medium text-etBlack mb-[7px]">
                    Register For The Event </h2>
                <p class="text-etGray font-light text-[16px] font-semibold">Registration fees:</p>
                
                <ul class="mt-[10px] text-[12px] font-light text-etGray reg-ul">
                    <li class="reg-li"><i class="fas fa-check-circle text-etBlue"></i> Ex-students: 1000/-</li>
                    <li class="reg-li"><i class="fas fa-check-circle text-etBlue"></i> Students & Teachers: 500/-</li>
                    <li class="reg-li"><i class="fas fa-check-circle text-etBlue"></i> Guest: 500/-</li>
                    <li class="reg-li"><i class="fas fa-check-circle text-etBlue"></i> Bkash/Nagad: 01648099070 (personal)</li>
                </ul>
                <p class="mb-[38px] text-etGray font-light text-[10px]" style="margin-top: 5px;"><span style="color: red;">*</span> Note: Only family members or close friends of students are allowed as guest. Children above 3 years old will be counted as guest.</p>
                
                <form action="{{ route('ticket.post') }}" method="post" class="grid grid-cols-2 xxs:grid-cols-1 gap-[30px] xs:gap-[20px] text-[16px]" enctype="multipart/form-data">
                    @csrf
                    <div class="col-span-2 xxs:col-span-1">
                        <label class="font-lato font-semibold text-etBlack block mb-[12px]">Registration Type: <span style="color: red;">*</span></label>
                        <label for="role-student" class="mr-[20px]"><input type="radio" name="role" value="student" id="role-student" checked> Student</label>
                        <label for="role-teacher" class="ml-[28px]"><input type="radio" name="role" value="teacher" id="role-teacher"> Teacher</label>
                        <label for="role-staff" class="ml-[28px]"><input type="radio" name="role" value="staff" id="role-staff"> Staff</label>
                    </div>
                    <div>
                        <label for="et-contact-name" class="font-lato font-semibold text-etBlack block mb-[12px]">Your Name: <span style="color: red;">*</span></label>
                        <input type="text" name="name" id="et-contact-name" placeholder="Your Name" class="border border-[#ECECEC] h-[55px] px-[20px] xs:px-[15px] rounded-[4px] w-full focus:outline-none" required>
                    </div>
                    <div id="batch-input" class="hidden">
                        <label for="et-contact-batch" class="font-lato font-semibold text-etBlack block mb-[12px]">Your Batch: <span style="color: red;">*</span></label>
                        <select name="batch" id="et-contact-batch" class="border border-[#ECECEC] h-[55px] px-[20px] xs:px-[15px] rounded-[4px] w-full focus:outline-none">
                            <option value="" disabled selected>Your Batch</option>
                            @foreach ($batchs as $batch)
                                <option value="{{ $batch }}">{{ $batch }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div>
                        <label for="et-contact-email" class="font-lato font-semibold text-etBlack block mb-[12px]">Email: <span class="text-[#707882] text-[12px]">(optional)</span></label>
                        <input type="email" name="email" id="et-contact-email" placeholder="Your Email" class="border border-[#ECECEC] h-[55px] px-[20px] xs:px-[15px] rounded-[4px] w-full focus:outline-none">
                    </div>
                    <div>
                        <label for="et-contact-phone" class="font-lato font-semibold text-etBlack block mb-[12px]">Phone: <span style="color: red;">*</span></label>
                        <input type="tel" name="phone" id="et-contact-phone" placeholder="Your Phone No" class="border border-[#ECECEC] h-[55px] px-[20px] xs:px-[15px] rounded-[4px] w-full focus:outline-none" required>
                    </div>
                    <div id="guest-input">
                        <label for="et-contact-guest" class="font-lato font-semibold text-etBlack block mb-[12px]">No of Guest: <span class="text-[#707882] text-[12px]">(optional)</span></label>
                        <div class="flex items-center">
                            <button type="button" id="decrease-guest" class="border border-[#ECECEC] h-[55px] px-[20px] xs:px-[15px] rounded-[4px] focus:outline-none bg-etBlue text-[30px] text-white">-</button>
                            <input type="number" name="guest" id="et-contact-guest" value="0" min="0" readonly class="border border-[#ECECEC] h-[55px] px-[20px] xs:px-[15px] rounded-[4px] w-full focus:outline-none text-center">
                            <button type="button" id="increase-guest" class="border border-[#ECECEC] h-[55px] px-[20px] xs:px-[15px] rounded-[4px] focus:outline-none bg-etBlue text-[30px] text-white">+</button>
                        </div>
                    </div>
                    <div>
                        <label for="et-contact-amount" class="font-lato font-semibold text-etBlack block mb-[12px]">Total Amount: </label>
                        <input type="text" name="amount" id="et-contact-amount" value="1000" readonly class="border border-[#ECECEC] h-[55px] px-[20px] xs:px-[15px] rounded-[4px] w-full focus:outline-none">
                    </div>
                    <div class="col-span-2 xxs:col-span-1">
                        <label for="et-contact-photo" class="font-lato font-semibold text-etBlack block mb-[12px]">Your Photo: <span style="color: red;">*</span> <span class="text-[#707882] text-[12px]">(for id card | max size: 5MB)</span></label>
                        <input type="file" name="photo" id="et-contact-photo" accept="image/*" class="border border-[#ECECEC] h-[55px] p-[20px] rounded-[4px] w-full focus:outline-none" required>
                    </div>
                    <div class="col-span-2 xxs:col-span-1">
                        <label for="et-contact-suggestion" class="font-lato font-semibold text-etBlack block mb-[12px]">Your Suggestion: <span class="text-[#707882] text-[12px]">(optional)</span></label>
                        <textarea name="suggestion" id="et-contact-suggestion" placeholder="Write your suggestion here." class="border border-[#ECECEC] h-[145px] p-[20px] rounded-[4px] w-full focus:outline-none"></textarea>
                    </div>
                    <div>
                        <button type="submit" class="bg-etBlue h-[55px] px-[24px] rounded-[10px] text-[16px] font-medium text-white hover:bg-etBlack">Submit <span class="icon pl-[10px]"><i class="fa-solid fa-arrow-right-long"></i></span>
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