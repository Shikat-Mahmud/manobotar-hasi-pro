@extends('admin.layouts.master')
@section('title', 'রক্তদাতার তথ্য')
@section('content')
    <section class="pc-container">
        <div class="pc-content">
            <div class="row">
                <div class="col-xl-12">
                    <div class="card">
                        <div class="card-header d-flex justify-content-between align-items-center">
                            <div>
                                <h4>রক্তদাতার তথ্য</h4>

                            </div>
                            <div>
                                <a href="{{ route('blood-doner.list') }}" class="btn btn-primary btn-sm"><i
                                        class="fas fa-arrow-left mr-2 "></i> রক্তদাতার তালিকা</a>
                            </div>
                        </div>
                        <div class="card-body text-center">
                            <div class="p-2 mb-3">
                                @if (isset($doner->photo))
                                    <img src="{{ asset('storage/' . $doner->photo) }}" alt="Photo" class="rounded-circle"
                                        style="height: 100px; width: 100px; object-fit: cover; border: 3px solid #23B7E5; padding: 2px;">
                                @else
                                    <img src="{{ asset('assets/images/user/avatar-2.jpg') }}" class="img-radius mb-4"
                                        alt="User-Profile-Image">
                                @endif
                            </div>

                            <div class="d-flex">
                                <div>
                                    <span style="font-size: 18px;">রক্তদাতার নামঃ </span>
                                </div>
                                <div>
                                    <span style="font-size: 18px; margin-left: 5px;"
                                        class="ml-3"><b>{{ $doner->name }}</b></span>
                                </div>
                            </div>
                            <div class="d-flex">
                                <div>
                                    <span style="font-size: 18px;">রক্তের গ্রুপঃ </span>
                                </div>
                                <div>
                                    <span style="font-size: 18px; margin-left: 5px;"
                                        class="ml-3"><b><i class="ph ph-drop" style="color: #E60000"></i> {{ $doner->blood_group }}</b></span>
                                </div>
                            </div>
                            <div class="d-flex">
                                <div>
                                    <span style="font-size: 18px;">মোবাইল নম্বরঃ </span>
                                </div>
                                <div>
                                    <span style="font-size: 18px; margin-left: 5px;"
                                        class="ml-3"><b><a href="tel:{{ $doner->phone }}">{{ $doner->phone }}</a></b></span>
                                </div>
                            </div>
                            <div class="d-flex">
                                <div>
                                    <span style="font-size: 18px;">ইমেইলঃ </span>
                                </div>
                                <div>
                                    <span style="font-size: 18px; margin-left: 5px;"
                                        class="ml-3"><b>{{ $doner->email }}</b></span>
                                </div>
                            </div>
                            <div class="d-flex">
                                <div>
                                    <span style="font-size: 18px;">ঠিকানাঃ </span>
                                </div>
                                <div>
                                    <span style="font-size: 18px; margin-left: 5px;"
                                        class="ml-3"><b>{{ $doner->address }}</b></span>
                                </div>
                            </div>
                            <div class="d-flex">
                                <div>
                                    <span style="font-size: 18px;">স্ট্যাটাসঃ </span>
                                </div>
                                <div>
                                    <span style="font-size: 18px; margin-left: 5px;"
                                        class="ml-3"><b>{{ $doner->status == 1 ? 'প্রস্তুত' : 'অপেক্ষমান' }}</b></span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
