@extends('admin.layouts.master')
@section('title', 'প্রতিষ্ঠানের তথ্য')
@section('content')
    <section class="pc-container">
        <div class="pc-content">
            <div class="row">
                <div class="col-xl-12">
                    <div class="card">
                        <div class="card-header d-flex justify-content-between align-items-center">
                            <div>
                                <h4>প্রতিষ্ঠানের তথ্য</h4>
                            </div>
                            <div>
                                <a href="{{ route('edit.about', $about->id) }}" class="btn btn-primary btn-sm"><i
                                        class="ph ph-pencil mr-2 "></i> এডিট</a>
                            </div>
                        </div>
                        <div class="card-body text-dark">
                            <div class="p-2 text-center mb-4 row justify-content-center">
                                <div class="col-12 col-md-6 mb-3">
                                    @if (isset($about->image))
                                        <img src="{{ asset('storage/' . $about->image) }}" alt="Photo"
                                             class="img-fluid rounded" style="max-height: 400px; object-fit: cover; width: 100%;">
                                    @else
                                        <img src="{{ asset('assets/images/user/avatar-1.jpg') }}" alt="Photo"
                                             class="img-fluid rounded" style="max-height: 400px; object-fit: cover; width: 100%;">
                                    @endif
                                </div>
                            
                                <div class="col-12 col-md-6 mb-3">
                                    @if (isset($about->image2))
                                        <img src="{{ asset('storage/' . $about->image2) }}" alt="Photo"
                                             class="img-fluid rounded" style="max-height: 400px; object-fit: cover; width: 100%;">
                                    @else
                                        <img src="{{ asset('assets/images/user/avatar-2.jpg') }}" alt="Photo"
                                             class="img-fluid rounded" style="max-height: 400px; object-fit: cover; width: 100%;">
                                    @endif
                                </div>
                            </div>                            

                            <div class="row d-flex text-left">
                                <div class="col-md-4">
                                    <b><span>প্রতিষ্ঠানের নামঃ </span></b>
                                </div>
                                <div class="col-md-8">
                                    <p class="ml-3 h4">{{ $about->organization_name }}</p>
                                </div>
                            </div>
                            <div class="row d-flex text-left">
                                <div class="col-md-4">
                                    <b><span>শ্লোগানঃ </span></b>
                                </div>
                                <div class="col-md-8">
                                    <p class="ml-3">{{ $about->slogan ?? '--' }}</p>
                                </div>
                            </div>
                            <div class="row d-flex text-left">
                                <div class="col-md-4">
                                    <b><span>প্রতিষ্ঠানের ঠিকানাঃ </span></b>
                                </div>
                                <div class="col-md-8">
                                    <p class="ml-3">{{ $about->location ?? '--' }}</p>
                                </div>
                            </div>
                            <div class="row d-flex text-left">
                                <div class="col-md-4">
                                    <b><span>প্রতিষ্ঠিত তারিখঃ </span></b>
                                </div>
                                <div class="col-md-8">
                                    <p class="ml-3">{{ $about->stablished_date ? \Carbon\Carbon::parse($about->stablished_date)->format('d M Y') : '--' }}</p>
                                </div>
                            </div>

                            @if(isset($about->description))
                            <hr class="my-4">

                            <div class="row d-flex text-left">
                                <div class="col-md-4">
                                    <b><span>বিস্তারিত তথ্যঃ </span></b>
                                </div>
                                <div class="col-md-8">
                                    <p class="ml-3">{!! $about->description !!}</p>
                                </div>
                            </div>
                            @endif

                            @if (isset($about->other_info))
                                <hr class="my-4">

                                <div class="row d-flex text-left">
                                    <div class="col-md-4">
                                        <b><span>অন্যান্য তথ্যঃ </span></b>
                                    </div>
                                    <div class="col-md-8">
                                        <p class="ml-3">{!! $about->other_info !!}</p>
                                    </div>
                                </div>
                            @endif

                            <br>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
