@extends('admin.layouts.master')
@section('title', 'রক্তদাতার তথ্য এডিট')
@section('content')
<section class="pc-container">
    <div class="pc-content">
        <div class="row">
            <div class="col-xl-12">
                <div class="card">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <div>
                            <h4>রক্তদাতার তথ্য এডিট</h4>
                        </div>
                        <div>
                            <a href="{{ route('blood-doner.list') }}" class="btn btn-primary btn-sm"><i class="fas fa-arrow-left mr-2 "></i> রক্তদাতা তালিকা</a>
                        </div>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('update.blood-doner', $doner->id) }}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="row mt-3">
                                <label for="name" class="col-md-4">রক্তদাতার নামঃ <span class="text-danger">*</span></label>
                                <div class="col-md-8">
                                    <input type="text" id="name" name="name" value="{{ old('name', $doner->name) }}" class="form-control" placeholder="রক্তদাতার নাম" required />
                                </div>
                            </div>

                            <div class="row mt-3">
                                <label for="blood_group" class="col-md-4">রক্তের গ্রুপঃ <span class="text-danger">*</span></label>
                                <div class="col-md-8">
                                    <select name="blood_group" id="blood_group" class="form-control" required>
                                        <option value="">-- রক্তের গ্রুপ --</option>
                                        @foreach ($bloodGroups as $blood_group)
                                            <option value="{{ $blood_group }}" {{ $doner->blood_group == $blood_group ? 'selected' : '' }}>{{ $blood_group }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="row mt-3">
                                <label for="phone" class="col-md-4">মোবাইল নম্বরঃ <span class="text-danger">*</span></label>
                                <div class="col-md-8">
                                    <input type="text" id="phone" name="phone" value="{{ old('phone', $doner->phone) }}" class="form-control" placeholder="মোবাইল নম্বর" required />
                                </div>
                            </div>
                            <div class="row mt-3">
                                <label for="email" class="col-md-4">ইমেইলঃ </label>
                                <div class="col-md-8">
                                    <input type="email" id="email" name="email" value="{{ old('email', $doner->email) }}" class="form-control" placeholder="ইমেইল" />
                                </div>
                            </div>
                            <div class="row mt-3">
                                <label for="address" class="col-md-4">ঠিকানাঃ </label>
                                <div class="col-md-8">
                                    <input type="text" id="address" name="address" value="{{ old('address', $doner->address) }}" class="form-control" placeholder="ঠিকানা..." />
                                </div>
                            </div>
                            <div class="row mt-3">
                                <label for="status" class="col-md-4">স্ট্যাটাসঃ </label>
                                <div class="col-md-8">
                                    <select name="status" id="status" class="form-control">
                                        <option value="1" {{ $doner->status == 1 ? 'selected' : '' }}>প্রস্তুত</option>
                                        <option value="0" {{ $doner->status == 0 ? 'selected' : '' }}>অপেক্ষমান</option>
                                    </select>
                                </div>
                            </div>
                            <div class="row mt-3">
                                <label for="photo" class="col-md-4">ছবিঃ </label>
                                <div class="col-md-8">
                                    <input type="file" id="photo" name="photo" class="form-control" />
                                    @if($doner->photo)
                                        <img class="p-t-10" src="{{ asset('storage/' . $doner->photo) }}" alt="{{ $doner->name }}"
                                            width="100" />
                                    @endif
                                </div>
                            </div>
                            <div class="row mt-3">
                                <label class="col-md-4"></label>
                                <div class="col-md-4">
                                    <input type="submit" value="Update" class="btn btn-success">
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