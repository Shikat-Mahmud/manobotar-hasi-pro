@extends('admin.layouts.master')
@section('title', 'নতুন খরচ')
@section('content')
<section class="pc-container">
    <div class="pc-content">
        <div class="row">
            <div class="col-xl-12">
                <div class="card">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <div>
                            <h4>নতুন খরচ</h4>
                        </div>
                        <div>
                            <a href="{{ route('invests') }}" class="btn btn-primary btn-sm"><i class="fas fa-arrow-left mr-2 "></i> খরচের তালিকা</a>
                        </div>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('store.investment') }}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="row mt-3">
                                <label for="sector" class="col-md-4 required">খরচের খাতঃ <span class="text-danger">*</span></label>
                                <div class="col-md-8">
                                    <input type="text" name="sector" id="sector" class="form-control" placeholder="খরচের খাত" required/>
                                </div>
                            </div>
                            <div class="row mt-3">
                                <label for="name" class="col-md-4 required">খরচকারীর নামঃ <span class="text-danger">*</span></label>
                                <div class="col-md-8">
                                    <input type="text" name="name" id="name" class="form-control" placeholder="খরচকারীর নাম" required/>
                                </div>
                            </div>
                            <div class="row mt-3">
                                <label for="amount" class="col-md-4 required">খরচের পরিমাণঃ <span class="text-danger">*</span></label>
                                <div class="col-md-8">
                                    <input type="text" name="amount" id="amount" class="form-control" placeholder="খরচের পরিমাণ" required/>
                                </div>
                            </div>
                            <div class="row mt-3">
                                <div class="col-md-4 ">
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