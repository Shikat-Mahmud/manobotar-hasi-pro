@extends('admin.layouts.master')
@section('title', 'নতুন রক্তদাতা')
@section('content')
    <section class="pc-container">
        <div class="pc-content">
            <div class="row">
                <div class="col-xl-12">
                    <div class="card">
                        <div class="card-header d-flex justify-content-between align-items-center">
                            <div>
                                <h4>নতুন রক্তদাতা</h4>
                            </div>
                            <div>
                                <a href="{{ route('blood-doner.list') }}" class="btn btn-primary btn-sm"><i
                                        class="fas fa-arrow-left mr-2 "></i> রক্তদাতা তালিকা</a>
                            </div>
                        </div>
                        <div class="card-body">
                            <form action="{{ route('store.blood-doner') }}" method="post" enctype="multipart/form-data">
                                @csrf
                                <div class="row mt-3">
                                    <label for="name" class="col-md-4 required">রক্তদাতার নামঃ <span
                                            class="text-danger">*</span></label>
                                    <div class="col-md-8">
                                        <input type="text" name="name" id="name" class="form-control"
                                            placeholder="রক্তদাতার নাম" required />
                                    </div>
                                </div>
                                <div class="row mt-3">
                                    <label for="blood_group" class="col-md-4 required">রক্তের গ্রুপঃ <span
                                            class="text-danger">*</span></label>
                                    <div class="col-md-8">
                                        <select name="blood_group" id="blood_group" class="form-control" required>
                                            <option value="">-- রক্তের গ্রুপ --</option>
                                            @foreach ($bloodGroups as $blood_group)
                                                <option value="{{ $blood_group }}">{{ $blood_group }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="row mt-3">
                                    <label for="phone" class="col-md-4 required">মোবাইল নম্বরঃ <span
                                            class="text-danger">*</span></label>
                                    <div class="col-md-8">
                                        <input type="text" name="phone" id="phone" class="form-control"
                                            placeholder="মোবাইল নম্বর" required />
                                    </div>
                                </div>
                                <div class="row mt-3">
                                    <label for="email" class="col-md-4">ইমেইলঃ </label>
                                    <div class="col-md-8">
                                        <input type="email" name="email" id="email" class="form-control"
                                            placeholder="ইমেইল" />
                                    </div>
                                </div>
                                <div class="row mt-3">
                                    <label for="address" class="col-md-4 required">ঠিকানাঃ </label>
                                    <div class="col-md-8">
                                        <input type="text" name="address" id="address" class="form-control"
                                            placeholder="ঠিকানা..." />
                                    </div>
                                </div>
                                <div class="row mt-3">
                                    <label for="photo" class="col-md-4">ছবিঃ </label>
                                    <div class="col-md-8">
                                        <input type="file" name="photo" id="photo" class="form-control"
                                            accept="image/*" />
                                    </div>
                                </div>
                                <div class="row mt-3">
                                    <div class="col-md-4">
                                    </div>
                                    <div class="col-md-8">
                                        <input type="submit" value="সাবমিট" class="btn btn-success">
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
