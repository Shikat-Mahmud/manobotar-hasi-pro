@extends('admin.layouts.master')
@section('title', 'কমিটির সদস্য তথ্য')
@section('content')
    <section class="pc-container">
        <div class="pc-content">
            <div class="row">
                <div class="col-xl-12">
                    <div class="card">
                        <div class="card-header d-flex justify-content-between align-items-center">
                            <div>
                                <h4>কমিটির সদস্য তথ্য</h4>
                            </div>
                            <div>
                                <a href="{{ route('committee.list') }}" class="btn btn-primary btn-sm"><i
                                        class="fas fa-arrow-left mr-2 "></i> কমিটির সদস্য তালিকা</a>
                            </div>
                        </div>
                        <div class="card-body text-dark">
                            <div class="p-2 text-center">
                                @if (isset($committee->photo))
                                    <img src="{{ asset('storage/' . $committee->photo) }}" alt="Photo"
                                        style="height: 200px; border-radius: 10px;">
                                @else
                                    <img src="{{ asset('assets/images/user/avatar-2.jpg') }}" alt="Student Photo">
                                @endif
                            </div>
                            <br>

                            <div class="row d-flex text-left">
                                <div class="col-md-4">
                                    <b><span>নামঃ </span></b>
                                </div>
                                <div class="col-md-8">
                                    <p class="ml-3">{{ $committee->name }}</p>
                                </div>
                            </div>

                            <div class="row d-flex text-left">
                                <div class="col-md-4">
                                    <b><span>পজিশনঃ </span></b>
                                </div>
                                <div class="col-md-8">
                                    <p class="ml-3">{{ $committee->position ?? '--' }}</p>
                                </div>
                            </div>

                            <div class="row d-flex text-left">
                                <div class="col-md-4">
                                    <b><span>মোবাইল নংঃ </span></b>
                                </div>
                                <div class="col-md-8">
                                    <p class="ml-3"><a href="tel:{{ $committee->phone }}">{{ $committee->phone }}</a></p>
                                </div>
                            </div>

                            <div class="row d-flex text-left">
                                <div class="col-md-4">
                                    <b><span>ইমেইলঃ </span></b>
                                </div>
                                <div class="col-md-8">
                                    <p class="ml-3">{{ $committee->email ?? '--' }}</p>
                                </div>
                            </div>

                            <div class="row d-flex text-left">
                                <div class="col-md-4">
                                    <b><span>রক্তের গ্রুপঃ </span></b>
                                </div>
                                <div class="col-md-8">
                                    @if ($committee->blood_group)
                                        <span class="ml-3 mb-3 badge bg-danger"><i class="ph ph-drop"></i> {{ $committee->blood_group }}</span>
                                    @else
                                        '--'
                                    @endif
                                </div>
                            </div>
                            <br>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
