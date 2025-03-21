@extends('frontend.master')
@section('title', 'Mobile App')
@section('content')

<!-- APP SECTION START -->
<div class="py-[120px] xl:py-[80px] md:py-[60px]">
    <div class="container mx-auto max-w-[1200px] px-[12px] xl:max-w-full">
        <div class="text-center my-[30px] pt-[20px]">
            <div class="flex justify-center mb-[25px]">
                <img style="height: 300px; width: auto;" src="{{asset('/')}}frontend/img/cca-app-mockup.png" alt="App">
            </div>

            <div
                class="inline-flex items-center h-[50px] rounded-full bg-etBlue px-[20px] text-[17px] font-medium text-white gap-[10px]">
                <a href="{{asset('/')}}assets/app/ex-students-cca.apk" download="ex-students-cca.apk">
                    <i class="fa fa-download"></i> Download Now</a></div>
        </div>
    </div>
</div>
<!-- APP SECTION END -->
@endsection