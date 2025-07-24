@extends('frontend.master')
@section('title', 'কার্যকরী পরিষদ')

@section('content')
    <!-- BREADCRUMB SECTION START -->
    <section
        class="et-breadcrumb bg-[#000D83] pt-[146px] lg:pt-[146px] sm:pt-[146px] pb-[130px] lg:pb-[110px] sm:pb-[80px] relative z-[1] before:absolute before:inset-0 before:-z-[1] before:opacity-30"
        style="background-image: url('{{ asset('frontend/img/page-bg.jpg') }}'); background-size: cover; background-position: center; background-repeat: no-repeat;">
        <div class="container mx-auto max-w-[1200px] px-[12px] xl:max-w-full text-center text-white">
            <h1 class="et-breadcrumb-title font-medium text-[56px] md:text-[50px] xs:text-[45px]">কার্যকরী পরিষদ</h1>
            <ul class="inline-flex items-center gap-[10px] font-medium text-[16px]">
                <li class="opacity-80"><a href="{{ route('home') }}" class="hover:text-etBlue">হোম</a></li>
                <li><i class="fa-solid fa-angle-right"></i><i class="fa-solid fa-angle-right"></i></li>
                <li class="current-page">কার্যকরী পরিষদ</li>
            </ul>
        </div>
    </section>
    <!-- BREADCRUMB SECTION END -->

    <!-- REGISTRATION SECTION START -->
    <div class="py-[130px] xl:py-[80px] md:py-[60px] mx-[25px]">
        @if ($committees->isNotEmpty())
            <div id="all" class="tabcontent" style="display: block;">
                <h3 class="text-[24px] py-[16px]">কার্যকরী পরিষদের সদস্যগণ</h3>
                <div
                    class="p-[20px] lg:p-[20px] flex flex-wrap justify-start sm:justify-center gap-x-[30px] gap-y-[20px] mb-[30px]">
                    @foreach ($committees as $member)
                        <!-- single artist -->
                        <div class="gap-[10px] flex justify-center rounded-[12px] p-[15px] pb-[12px] relative"
                            style="background-color: #d3deff;">
                            <div class="w-[100px] xs:w-[120px] sm:w-[168px]">
                                <div class="overflow-hidden">
                                    @if (isset($member->photo))
                                        <img src="{{ asset('storage/' . $member->photo) }}" alt="Guest Image"
                                            class="rounded-[6px] w-full aspect-square object-cover">
                                    @else
                                        <img src="{{ asset('frontend/img/team_member_avatar.jpg') }}" alt="Guest Image"
                                            class="rounded-[6px] w-full aspect-square object-cover">
                                    @endif
                                </div>
                                <h5 class="text-[12px] sm:text-[20px] pt-[10px] text-etBlack text-start font-bold">
                                    {{ $member->name }}
                                </h5>
                                <span class="text-etGray text-[10px] sm:text-[16px]">{{ $member->position }}</span>
                            </div>
                        </div>
                    @endforeach
                </div>

                <!-- Render pagination links for the main registrations -->
                <div class="font-kanit mt-[10px]" style="text-align: center;">
                    {{ $committees->links('pagination::et-pagination') }}
                </div>
            </div>
        @else
            <div class="flex flex-col justify-center items-center">
                <h3 class="text-center text-[2.4rem] text-[#757277]">কোনো কার্যকরী পরিষদ সদস্য পাওয়া যায়নি!</h3>
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