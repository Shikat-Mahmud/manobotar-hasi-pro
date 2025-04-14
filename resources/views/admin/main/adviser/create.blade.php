@extends('admin.layouts.master')
@section('title', 'নতুন উপদেষ্টা যোগ')
@section('content')
<section class="pc-container">
    <div class="pc-content">
        <div class="row">
            <div class="col-xl-12">
                <div class="card">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <div>
                            <h4>নতুন উপদেষ্টা যোগ করুন</h4>
                        </div>
                        <div>
                            <a href="{{ route('adviser.list') }}" class="btn btn-primary btn-sm"><i class="fas fa-arrow-left mr-2 "></i> উপদেষ্টা তালিকা</a>
                        </div>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('store.adviser') }}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="row mt-3">
                                <label for="name" class="col-md-4 required">উপদেষ্টার নামঃ <span class="text-danger">*</span></label>
                                <div class="col-md-8">
                                    <input type="text" name="name" class="form-control" placeholder="উপদেষ্টার নাম" required/>
                                </div>
                            </div>
                            <div class="row mt-3">
                                <label for="title" class="col-md-4 required">পদবীঃ</label>
                                <div class="col-md-8">
                                    <input type="text" name="title" class="form-control" placeholder="পদবী"/>
                                </div>
                            </div>
                            <div class="row mt-3">
                                <label for="phone" class="col-md-4 required">মোবাইলঃ</label>
                                <div class="col-md-8">
                                    <input type="text" name="phone" class="form-control" placeholder="মোবাইল"/>
                                </div>
                            </div>
                            <div class="row mt-3">
                                <label for="email" class="col-md-4 required">ইমেইলঃ</label>
                                <div class="col-md-8">
                                    <input type="text" name="email" class="form-control" placeholder="ইমেইল"/>
                                </div>
                            </div>
                            <div class="row mt-3">
                                <label for="photo" class="col-md-4">ছবিঃ</label>
                                <div class="col-md-8">
                                    <input type="file" name="photo" id="photo" class="form-control" accept="image/*" />
                                </div>
                            </div>
                            <div class="row mt-3">
                                <label class="col-md-4"></label>
                                <div class="col-md-8">
                                    <button type="button" class="btn btn-danger me-2" onclick="window.history.back()">বাদ দিন</button>
                                    <input type="submit" value="যোগ করুন" class="btn btn-success">
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