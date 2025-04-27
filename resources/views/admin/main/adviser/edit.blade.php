@extends('admin.layouts.master')
@section('title', 'উপদেষ্টার তথ্য এডিট')
@section('content')
<section class="pc-container">
    <div class="pc-content">
        <div class="row">
            <div class="col-xl-12">
                <div class="card">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <div>
                            <h4>উপদেষ্টার তথ্য এডিট করুন</h4>
                        </div>
                        <div>
                            <a href="{{ route('adviser.list') }}" class="btn btn-primary btn-sm"><i class="fas fa-arrow-left mr-2 "></i> উপদেষ্টা পরিষদ</a>
                        </div>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('update.adviser', $adviser->id) }}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="row mt-3">
                                <label for="name" class="col-md-4">উপদেষ্টার নামঃ <span class="text-danger">*</span></label>
                                <div class="col-md-8">
                                    <input type="text" id="name" name="name" value="{{ old('name', $adviser->name) }}" class="form-control" placeholder="উপদেষ্টার নাম" required />
                                </div>
                            </div>
                            <div class="row mt-3">
                                <label for="title" class="col-md-4">পদবীঃ</label>
                                <div class="col-md-8">
                                    <input type="text" id="title" name="title" value="{{ old('name', $adviser->title) }}" class="form-control" placeholder="পদবী" />
                                </div>
                            </div>
                            <div class="row mt-3">
                                <label for="phone" class="col-md-4">মোবাইলঃ</label>
                                <div class="col-md-8">
                                    <input type="text" id="phone" name="phone" value="{{ old('name', $adviser->phone) }}" class="form-control" placeholder="মোবাইল" />
                                </div>
                            </div>
                            <div class="row mt-3">
                                <label for="email" class="col-md-4">ইমেইলঃ</label>
                                <div class="col-md-8">
                                    <input type="text" id="email" name="email" value="{{ old('name', $adviser->email) }}" class="form-control" placeholder="ইমেইল" />
                                </div>
                            </div>
                            <div class="row mt-3">
                                <label for="photo" class="col-md-4">ছবিঃ </label>
                                <div class="col-md-8">
                                    <input type="file" id="photo" name="photo" class="form-control" />
                                    @if($adviser->photo)
                                        <img class="p-t-10" src="{{ asset('storage/' . $adviser->photo) }}" alt="{{ $adviser->name }}"
                                            width="100" />
                                    @endif
                                </div>
                            </div>
                            <div class="row mt-3">
                                <label class="col-md-4"></label>
                                <div class="col-md-8">
                                    <button type="button" class="btn btn-danger me-2" onclick="window.history.back()">বাদ দিন</button>
                                    <input type="submit" value="আপডেট" class="btn btn-success">
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