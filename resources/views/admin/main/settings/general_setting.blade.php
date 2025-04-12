@extends('admin.layouts.master')
@section('title', 'General Setting')
@section('content')
    <section class="pc-container">
        <div class="pc-content">
            <form action="{{ route('setting.update') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="text-center">
                                    <img style=" height: 50px; margin: 15px;"
                                        src="https://cdn-icons-png.flaticon.com/512/563/563541.png" alt="General Settings">
                                    <h5 class="mb-4"><b>সাধারণ সেটিংস</b></h5>
                                    <p class="mt-1 text-sm text-gray-600">
                                        আপনার ওয়েবসাইটের সাধারণ সেটিংস আপডেট করুন।
                                    </p>
                                </div>

                                <div class="row mb-3 mt-3">
                                    <label for="inputText" class="col-sm-12 col-form-label">কোম্পানীর নামঃ <span
                                            class="text-danger">*</span></label>
                                    <div class="col-sm-12">
                                        <input type="text" placeholder="কোম্পানীর নাম" class="form-control"
                                            name="business_name" required="" value="{{ $general->business_name ?? '' }}">
                                    </div>
                                </div>

                                <div class="row mb-3 mt-3">
                                    <label for="inputText" class="col-sm-12 col-form-label">কোম্পানীর ঠিকানাঃ <span
                                            class="text-danger">*</span></label>
                                    <div class="col-sm-12">
                                        <input type="address" placeholder="কোম্পানীর ঠিকানা" class="form-control"
                                            name="business_address" required=""
                                            value="{{ $general->business_address ?? '' }}">
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label for="inputPassword" class="col-sm-12 col-form-label">মোবাইল নম্বরঃ <span class="text-danger">*</span> </label>
                                    <div class="col-sm-12">
                                        <input type="tel" placeholder="মোবাইল নম্বর" class="form-control"
                                            name="business_number" required=""
                                            value="{{ $general->business_number ?? '' }}">
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label for="inputPassword" class="col-sm-12 col-form-label">হোয়াটসঅ্যাপ নম্বরঃ </label>
                                    <div class="col-sm-12">
                                        <input type="tel" placeholder="হোয়াটসঅ্যাপ নম্বর" class="form-control"
                                            name="business_whatsapp" value="{{ $general->business_whatsapp ?? '' }}">
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label for="inputPassword" class="col-sm-12 col-form-label">কোম্পানীর ইমেইলঃ <span
                                            class="text-danger">*</span></label>
                                    <div class="col-sm-12">
                                        <input type="email" placeholder="কোম্পানীর ইমেইল" class="form-control"
                                            name="business_email" required=""
                                            value="{{ $general->business_email ?? '' }}">
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>

                    <div class="col-md-12 mt-3">
                        <div class="card">
                            <div class="card-body">
                                <div class="row mb-5 mt-3">
                                    <label class="col-sm-4 col-form-label"> লোগোঃ </label>
                                    <div class="col-sm-8">
                                        <div class="row">
                                            <div class="col-md-12 mb-3">
                                                <div class="input-group">
                                                    <input type="file" name="logo"
                                                        accept="image/png, image/jpg, image/gif, image/jpeg"
                                                        class="form-control">
                                                </div>
                                            </div>
                                            <div class="col-md-12 mb-3">
                                                @if (isset($general->logo))
                                                    <img src="{{ asset('storage/' . $general->logo) }}" alt="Logo"
                                                        style="height: 50px; border-radius: 6px;">
                                                @else
                                                    <p>কোনো লোগো আপলোড করা হয়নি। নতুন লোগো আপলোড করুন।</p>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="row mb-5 mt-3">
                                    <label class="col-sm-4 col-form-label"> সাইট আইকনঃ </label>
                                    <div class="col-sm-8">
                                        <div class="row">
                                            <div class="col-md-12 mb-3">
                                                <div class="input-group">
                                                    <input type="file" name="favicon"
                                                        accept="image/png, image/jpg, image/gif, image/jpeg"
                                                        class="form-control">
                                                </div>
                                            </div>
                                            <div class="col-md-12 mb-3">
                                                @if (isset($general->favicon))
                                                    <img src="{{ asset('storage/' . $general->favicon) }}" alt="FabIcon"
                                                        style="height: 50px; border-radius: 6px;">
                                                @else
                                                    <p>কোনো সাইট আইকন আপলোড করা হয়নি। নতুন সাইট আইকন আপলোড করুন।</p>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="row mb-5 mt-3">
                                    <label class="col-sm-4 col-form-label"> ব্যানারের ছবিঃ </label>
                                    <div class="col-sm-8">
                                        <div class="row">
                                            <div class="col-md-12 mb-3">
                                                <div class="input-group">
                                                    <input type="file" name="banner_image"
                                                        accept="image/png, image/jpg, image/gif, image/jpeg"
                                                        class="form-control">
                                                </div>
                                            </div>
                                            <div class="col-md-12 mb-3">
                                                @if (isset($general->banner_image))
                                                    <img src="{{ asset('storage/' . $general->banner_image) }}"
                                                        alt="Banner Image" style="height: 80px; border-radius: 6px;">
                                                @else
                                                    <p>কোনো ব্যানারের ছবি আপলোড করা হয়নি। নতুন ব্যানারের ছবি আপলোড করুন।</p>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-sm-12">
                                    <div class="flex items-center gap-4">
                                        <a class="btn btn-danger" href="{{ route('admin.index') }}">বাতিল</a>
                                        <button class="btn btn-info" type="submit">সংরক্ষণ</button>
                                    </div>
                                </div>

                            </div>
                        </div>

                    </div>
                </div>
            </form>
        </div>
    </section>
@endsection
