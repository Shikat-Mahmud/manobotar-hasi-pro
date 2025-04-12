@extends('admin.layouts.master')
@section('title', 'নতুন ডোনেশন')
@section('content')
<section class="pc-container">
    <div class="pc-content">
        <div class="row">
            <div class="col-xl-12">
                <div class="card">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <div>
                            <h4>নতুন ডোনেশন</h4>
                        </div>
                        <div>
                            <a href="{{ route('donations') }}" class="btn btn-primary btn-sm"><i class="fas fa-arrow-left mr-2 "></i> ডোনেশন তালিকা</a>
                        </div>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('store.donation') }}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="row mt-3">
                                <label for="name" class="col-md-4 required">ডোনারের নামঃ <span class="text-danger">*</span></label>
                                <div class="col-md-8">
                                    <input type="text" name="name" id="name" class="form-control" placeholder="ডোনারের নাম" required/>
                                </div>
                            </div>
                            <div class="row mt-3">
                                <label for="amount" class="col-md-4 required">পরিমাণঃ <span class="text-danger">*</span></label>
                                <div class="col-md-8">
                                    <input type="text" name="amount" id="amount" class="form-control" placeholder="পরিমাণ" required/>
                                </div>
                            </div>
                            <div class="row mt-3">
                                <label for="photo" class="col-md-4">ছবিঃ </label>
                                <div class="col-md-8">
                                    <input type="file" name="photo" id="photo" class="form-control" accept="image/*" />
                                </div>
                            </div>
                            <div class="row mt-3">
                                <div class="col-md-4 ">
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