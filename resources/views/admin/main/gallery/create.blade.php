@extends('admin.layouts.master')
@section('title', 'নতুন ছবি যুক্ত করুন')
@section('content')
<section class="pc-container">
    <div class="pc-content">
        <div class="row">
            <div class="col-xl-12">
                <div class="card">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <div>
                            <h4>নতুন ছবি যুক্ত করুন</h4>
                        </div>
                        <div>
                            <a href="{{ route('gallery.list') }}" class="btn btn-primary btn-sm"><i class="fas fa-arrow-left mr-2 "></i> ছবি গ্যালারি</a>
                        </div>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('store.gallery') }}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="row mt-3">
                                <label for="photos" class="col-md-4">ছবি যুক্ত করুনঃ <span class="text-danger">*</span></label>
                                <div class="col-md-8">
                                    <input type="file" name="photos[]" class="form-control" accept="image/*" multiple />
                                </div>
                            </div>
                            <div class="row mt-3">
                                <label for="" class="col-md-4"></label>
                                <div class="col-md-4">
                                    <input type="submit" value="আপলোড" class="btn btn-success">
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
