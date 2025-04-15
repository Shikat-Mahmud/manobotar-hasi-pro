@extends('frontend.master')
@section('title', 'রক্তদাতাগণ')
@push('styles')
    <style>
        /* Style for tab buttons start */
        .tab {
            overflow: hidden;
            border: 1px solid #ccc;
        }

        .tab button {
            background-color: inherit;
            float: left;
            border: none;
            outline: none;
            cursor: pointer;
            padding: 14px 16px;
            transition: 0.3s;
        }

        .tab button:hover {
            background-color: #ddd;
        }

        .tab button.active {
            background-color: #1260FE;
            border-radius: 6px;
            color: #fff;
        }

        .tabcontent {
            display: none;
            padding: 6px 12px;
        }

        /* Style for tab buttons end */
    </style>
@endpush

@section('content')
    @php
        $setting = generalSettings();
    @endphp

    <!-- BREADCRUMB SECTION START -->
    <section
        class="et-breadcrumb bg-[#000D83] pt-[146px] lg:pt-[146px] sm:pt-[146px] pb-[130px] lg:pb-[110px] sm:pb-[80px] relative z-[1] before:absolute before:inset-0 before:-z-[1] before:opacity-30"
        style="background-image: url('{{ asset('frontend/img/page-bg.jpg') }}'); background-size: cover; background-position: center; background-repeat: no-repeat;">
        <div class="container mx-auto max-w-[1200px] px-[12px] xl:max-w-full text-center text-white">
            <h1 class="et-breadcrumb-title font-medium text-[56px] md:text-[50px] xs:text-[45px]">রক্তদাতা</h1>
            <ul class="inline-flex items-center gap-[10px] font-medium text-[16px]">
                <li class="opacity-80"><a href="{{ route('home') }}" class="hover:text-etBlue">হোম</a></li>
                <li><i class="fa-solid fa-angle-right"></i><i class="fa-solid fa-angle-right"></i></li>
                <li class="current-page">রক্তদাতা</li>
            </ul>
        </div>
    </section>
    <!-- BREADCRUMB SECTION END -->

    <!-- REGISTRATION SECTION START -->
    <div class="py-[130px] xl:py-[80px] md:py-[60px] mx-[25px]">
        <!-- actions -->
        <div class="border-y border-[#d9d9d9] py-[24px] flex items-center xxs:flex-col gap-[20px]">
            <div
                class="inline-flex items-center h-[50px] rounded-full bg-etBlue px-[20px] text-[17px] font-medium text-white gap-[10px]">
                জরুরী রক্তের প্রয়োজন?</div>
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

        @if ($doners->isNotEmpty())
            <div class="tab text-[12px]" style="padding: 6px;">
                <button class="tablinks active" onclick="openTab(event, 'all')" id="defaultOpen">সব</button>
                @if (isset($bloodGroups))
                    @foreach ($bloodGroups as $group)
                        <button class="tablinks"
                            onclick="openTab(event, '{{ $group }}')">{{ $group }}</button>
                    @endforeach
                @endif
            </div>

            <div id="all" class="tabcontent" style="display: block;">
                <h3 class="text-[24px] py-[16px]">আমাদের রক্তদাতাগণ (মোটঃ
                    {{ $donersCount }} জন)</h3>
                <div
                    class="p-[20px] lg:p-[20px] flex flex-wrap justify-start sm:justify-center gap-x-[30px] gap-y-[20px] mb-[30px]">
                    @foreach ($doners as $doner)
                        <!-- single artist -->
                        <div class="gap-[10px] pb-[15px] flex justify-center rounded-[12px] p-[30px] relative"
                            style="background-color: #d3deff;">
                            <div class="w-[168px]">
                                <div class="overflow-hidden">
                                    @if (isset($doner->photo))
                                        <img src="{{ asset('storage/' . $doner->photo) }}" alt="Guest Image"
                                            class="rounded-[6px] w-[168px] aspect-square" style="object-fit: cover;">
                                    @else
                                        <img src="{{ asset('frontend/img/team_member_avatar.jpg') }}" alt="Guest Image"
                                            class="rounded-[6px] w-[168px] aspect-square">
                                    @endif
                                </div>
                                <h5 class="font-semibold text-[20px] pt-[10px] text-etBlack">{{ $doner->name }}</h5>
                                <span class="inline-block text-etGray2 text-[16px]"><i class="fa-solid fa-droplet"
                                        style="color: #e60000;"></i> {{ $doner->blood_group }}</span>
                            </div>

                            @php
                                $donatedDate = \Carbon\Carbon::parse($doner->donated_at);
                                $daysPassed = $donatedDate->diffInDays(now());
                                $daysLeft = max(90 - $daysPassed, 0);

                                $bnDigits = ['০', '১', '২', '৩', '৪', '৫', '৬', '৭', '৮', '৯'];
                                $daysLeftBn = collect(str_split($daysLeft))
                                    ->map(function ($digit) use ($bnDigits) {
                                        return is_numeric($digit) ? $bnDigits[$digit] : $digit;
                                    })
                                    ->implode('');
                            @endphp
                            @if ($doner->status === 1)
                                <span style="background-color: #057A55; border-radius: 6px 0 0 6px;"
                                    class="text-white px-[10px] text-[12px] py-[2px] absolute bottom-0 right-0 mb-[15px] mr-[10px]">প্রস্তুত</span>
                            @else
                                <span style="background-color: #4B5563; border-radius: 6px 0 0 6px;"
                                    class="text-white px-[10px] text-[12px] py-[2px] absolute bottom-0 right-0 mb-[15px] mr-[10px]">
                                    {{ $daysLeftBn }} দিন বাকি
                                </span>
                            @endif
                        </div>
                    @endforeach
                </div>

                <!-- Render pagination links for the main registrations -->
                {{-- <div class="font-kanit mt-[10px]" style="text-align: center;">
                    {{ $doners->links('pagination::pagination_view') }}
                </div> --}}
            </div>

            @if (isset($donersByBloodGroup))
                @foreach ($donersByBloodGroup as $group => $doners)
                    <div id="{{ $group }}" class="tabcontent">
                        <h3 class="text-[24px] py-[16px]">{{ $group }} রক্তের রক্তদাতাগণ (মোটঃ
                            {{ $donersByBloodGroupCount[$group] }} জন)</h3>
                        <div
                            class="p-[20px] lg:p-[20px] flex flex-wrap justify-start sm:justify-center gap-x-[30px] gap-y-[20px] mb-[30px]">
                            @if ($doners->isNotEmpty())
                                @foreach ($doners as $doner)
                                    <!-- single doner -->
                                    <div class="gap-[10px] pb-[15px] flex justify-center rounded-[12px] p-[30px] relative"
                                        style="background-color: #d3deff;">
                                        <div class="w-[168px]">
                                            <div class="overflow-hidden">
                                                @if (isset($doner->photo))
                                                    <img src="{{ asset('storage/' . $doner->photo) }}" alt="Students Image"
                                                        class="rounded-[6px] w-[168px] aspect-square"
                                                        style="object-fit: cover;">
                                                @else
                                                    <img src="{{ asset('frontend/img/team_member_avatar.jpg') }}"
                                                        alt="Students Image" class="rounded-[6px] w-[168px] aspect-square">
                                                @endif
                                            </div>
                                            <h5 class="font-semibold text-[20px] pt-[10px] text-etBlack">
                                                {{ $doner->name }}</h5>
                                            <span class="inline-block text-etGray2 text-[16px]"><i
                                                    class="fa-solid fa-droplet" style="color: #e60000;"></i>
                                                {{ $doner->blood_group }}</span>
                                        </div>

                                        @php
                                            $donatedDate = \Carbon\Carbon::parse($doner->donated_at);
                                            $daysPassed = $donatedDate->diffInDays(now());
                                            $daysLeft = max(90 - $daysPassed, 0);

                                            $bnDigits = ['০', '১', '২', '৩', '৪', '৫', '৬', '৭', '৮', '৯'];
                                            $daysLeftBn = collect(str_split($daysLeft))
                                                ->map(function ($digit) use ($bnDigits) {
                                                    return is_numeric($digit) ? $bnDigits[$digit] : $digit;
                                                })
                                                ->implode('');
                                        @endphp
                                        @if ($doner->status === 1)
                                            <span style="background-color: #057A55; border-radius: 6px 0 0 6px;"
                                                class="text-white px-[10px] text-[12px] py-[2px] absolute bottom-0 right-0 mb-[15px] mr-[10px]">প্রস্তুত</span>
                                        @else
                                            <span style="background-color: #4B5563; border-radius: 6px 0 0 6px;"
                                                class="text-white px-[10px] text-[12px] py-[2px] absolute bottom-0 right-0 mb-[15px] mr-[10px]">
                                                {{ $daysLeftBn }} দিন বাকি
                                            </span>
                                        @endif
                                    </div>
                                @endforeach
                            @else
                                <div class="text-center w-full">
                                    <h3 class="text-[16px] text-[#757277]">{{ $group }} রক্তের কোনো রক্তদাতা পাওয়া
                                        যায়নি!!
                                        &#128532;</h3>
                                </div>
                            @endif
                        </div>
                    </div>
                @endforeach
            @endif
        @else
            <div class="flex flex-col justify-center items-center">
                <h3 class="text-center text-[2.4rem] text-[#757277]">কোনো রক্তদাতা পাওয়া যায়নি!</h3>
                <img src="{{ asset('images/empty.jpg') }}" alt="Photo" class="w-[350px] my-[30px]">
            </div>
        @endif
    </div>
    <!-- REGISTRATION SECTION END -->

@endsection
@push('scripts')
    <script>
        function openTab(evt, tabName) {
            // Get all elements with class="tabcontent" and hide them
            var tabcontent = document.getElementsByClassName("tabcontent");
            for (var i = 0; i < tabcontent.length; i++) {
                tabcontent[i].style.display = "none";
            }

            // Get all elements with class="tablinks" and remove the class "active"
            var tablinks = document.getElementsByClassName("tablinks");
            for (var i = 0; i < tablinks.length; i++) {
                tablinks[i].className = tablinks[i].className.replace(" active", "");
            }

            // Show the current tab, and add an "active" class to the button that opened the tab
            document.getElementById(tabName).style.display = "block";
            evt.currentTarget.className += " active";
        }

        // Set the default active tab
        document.getElementById("defaultOpen").click();
    </script>
@endpush
