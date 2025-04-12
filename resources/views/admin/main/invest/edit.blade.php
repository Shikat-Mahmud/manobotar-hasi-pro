@extends('admin.layouts.master')
@section('title', 'এডিট খরচ')
@section('content')
<section class="pc-container">
    <div class="pc-content">
        <div class="row">
            <div class="col-xl-12">
                <div class="card">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <div>
                            <h4>খরচের তথ্য এডিট</h4>
                        </div>
                        <div>
                            <a href="{{ route('invests') }}" class="btn btn-primary btn-sm"><i class="fas fa-arrow-left mr-2 "></i> খরচের তালিকা</a>
                        </div>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('update.investment', $invest->id) }}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="row mt-3">
                                <label for="sector" class="col-md-4">খরচের খাতঃ <span class="text-danger">*</span></label>
                                <div class="col-md-8">
                                    <input type="text" id="sector" name="sector" value="{{ old('sector', $invest->sector) }}" class="form-control" placeholder="খরচের খাত" required />
                                </div>
                            </div>
                            <div class="row mt-3">
                                <label for="donation-name" class="col-md-4">খরচকারীর নামঃ <span class="text-danger">*</span></label>
                                <div class="col-md-8">
                                    <input type="text" id="donation-name" name="name" value="{{ old('name', $invest->name) }}" class="form-control" placeholder="খরচকারীর নাম" required />
                                </div>
                            </div>
                            <div class="row mt-3">
                                <label for="donation-amount" class="col-md-4">খরচের পরিমাণঃ <span class="text-danger">*</span></label>
                                <div class="col-md-8">
                                    <input type="text" id="donation-amount" name="amount" value="{{ old('amount', $invest->amount) }}" class="form-control" placeholder="খরচের পরিমাণ" required />
                                </div>
                            </div>
                            <div class="row mt-3">
                                <label class="col-md-4"></label>
                                <div class="col-md-4">
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