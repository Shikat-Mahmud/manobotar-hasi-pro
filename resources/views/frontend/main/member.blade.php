@extends('frontend.master')
@section('title', 'ফাউন্ডেশনের সদস্যগণ')

@section('content')
    <!-- BREADCRUMB SECTION START -->
    <section
        class="et-breadcrumb bg-[#000D83] pt-[146px] lg:pt-[146px] sm:pt-[146px] pb-[130px] lg:pb-[110px] sm:pb-[80px] relative z-[1] before:absolute before:inset-0 before:-z-[1] before:opacity-30"
        style="background-image: url('{{ asset('frontend/img/page-bg.jpg') }}'); background-size: cover; background-position: center; background-repeat: no-repeat;">
        <div class="container mx-auto max-w-[1200px] px-[12px] xl:max-w-full text-center text-white">
            <h1 class="et-breadcrumb-title font-medium text-[56px] md:text-[50px] xs:text-[45px]">ফাউন্ডেশনের সদস্যগণ</h1>
            <ul class="inline-flex items-center gap-[10px] font-medium text-[16px]">
                <li class="opacity-80"><a href="{{ route('home') }}" class="hover:text-etBlue">হোম</a></li>
                <li><i class="fa-solid fa-angle-right"></i><i class="fa-solid fa-angle-right"></i></li>
                <li class="current-page">ফাউন্ডেশনের সদস্যগণ</li>
            </ul>
        </div>
    </section>
    <!-- BREADCRUMB SECTION END -->

    <!-- REGISTRATION SECTION START -->
    <div class="py-[130px] xl:py-[80px] md:py-[60px] mx-[25px]">
        @if ($members->isNotEmpty())
            <div id="all" class="tabcontent" style="display: block;">
                <h3 class="text-[24px] py-[16px]">প্রবাসী পরিষদের সদস্যগণ</h3>
                <div class="relative flex justify-center overflow-hidden mb-[50px]">
                    <div class="overflow-auto sm:max-w-full mx-auto">
                        <table class="w-full table-auto">
                            <thead>
                                <tr class="bg-[#000D83] text-white text-etBlack">
                                    <th class="text-left p-[10px] font-semibold text-[18px]">নাম</th>
                                    <th class="text-left p-[10px] font-semibold text-[18px]">ঠিকানা</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($members as $member)
                                    <tr class="border-b bg-[#d3deff] rounded-[12px]">
                                        <td class="p-[10px] text-[16px]">{{ $member->name }}</td>
                                        <td class="p-[10px] text-[16px]">{{ $member->address }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
                

                <!-- Render pagination links for the main registrations -->
                <div class="font-kanit mt-[10px]" style="text-align: center;">
                    {{ $members->links('pagination::et-pagination') }}
                </div>
            </div>
        @else
            <div class="flex flex-col justify-center items-center">
                <h3 class="text-center text-[2.4rem] text-[#757277]">কোনো কমিটি সদস্য পাওয়া যায়নি!</h3>
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
