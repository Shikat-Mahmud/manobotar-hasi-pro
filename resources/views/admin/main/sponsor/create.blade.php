@extends('admin.layouts.master')
@section('title', 'নতুন পার্টনার')
@section('content')
<section class="pc-container">
    <div class="pc-content">
        <div class="row">
            <div class="col-xl-12">
                <div class="card">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <div>
                            <h4>নতুন পার্টনার</h4>
                        </div>
                        <div>
                            <a href="{{ route('sponsors') }}" class="btn btn-primary btn-sm"><i class="fas fa-arrow-left mr-2 "></i> পার্টনার তালিকা</a>
                        </div>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('store.sponsor') }}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="row mt-3">
                                <label for="company" class="col-md-4 required">কোম্পানীর নামঃ <span class="text-danger">*</span></label>
                                <div class="col-md-8">
                                    <input type="text" name="company" id="company" class="form-control" placeholder="কোম্পানীর নাম" required/>
                                </div>
                            </div>
                            <div class="row mt-3">
                                <label for="amount" class="col-md-4 required">পরিমাণঃ <span class="text-danger">*</span></label>
                                <div class="col-md-8">
                                    <input type="text" name="amount" id="amount" class="form-control" placeholder="পরিমাণ" required/>
                                </div>
                            </div>
                            <div class="row mt-3">
                                <label for="photo" class="col-md-4">কোম্পানীর লোগোঃ </label>
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