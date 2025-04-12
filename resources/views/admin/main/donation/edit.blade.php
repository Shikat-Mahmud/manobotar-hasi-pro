@extends('admin.layouts.master')
@section('title', 'এডিট ডোনেশন')
@section('content')
<section class="pc-container">
    <div class="pc-content">
        <div class="row">
            <div class="col-xl-12">
                <div class="card">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <div>
                            <h4>এডিট ডোনেশন</h4>
                        </div>
                        <div>
                            <a href="{{ route('donations') }}" class="btn btn-primary btn-sm"><i class="fas fa-arrow-left mr-2 "></i> ডোনেশন তালিকা</a>
                        </div>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('update.donation', $donation->id) }}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="row mt-3">
                                <label for="donation-name" class="col-md-4">ডোনারের নামঃ <span class="text-danger">*</span></label>
                                <div class="col-md-8">
                                    <input type="text" id="donation-name" name="name" value="{{ old('name', $donation->name) }}" class="form-control" placeholder="ডোনারের নাম" required />
                                </div>
                            </div>
                            <div class="row mt-3">
                                <label for="donation-amount" class="col-md-4">পরিমাণঃ <span class="text-danger">*</span></label>
                                <div class="col-md-8">
                                    <input type="text" id="donation-amount" name="amount" value="{{ old('amount', $donation->amount) }}" class="form-control" placeholder="পরিমাণ" required />
                                </div>
                            </div>
                            <div class="row mt-3">
                                <label for="donation-photo" class="col-md-4">ছবিঃ </label>
                                <div class="col-md-8">
                                    <input type="file" id="donation-photo" name="photo" class="form-control" />
                                    @if($donation->photo)
                                        <img class="p-t-10" src="{{ asset('storage/' . $donation->photo) }}" alt="{{ $donation->name }}"
                                            width="100" />
                                    @endif
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