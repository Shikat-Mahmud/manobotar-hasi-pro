@extends('admin.layouts.master')
@section('title', 'প্রজেক্ট তৈরি করুন')
@section('content')
<section class="pc-container">
    <div class="pc-content">
        <div class="row">
            <div class="col-xl-12">
                <div class="card">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <div>
                            <h4>প্রজেক্ট তৈরি করুন</h4>
                        </div>
                        <div>
                            <a href="{{ route('projects') }}" class="btn btn-primary btn-sm"><i
                                    class="fas fa-arrow-left mr-2 "></i> প্রজেক্ট তালিকা</a>
                        </div>
                    </div>
                    <div class="card-body">

                        <form action="{{ route('store.project') }}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="row mt-3">
                                <label for="name" class="col-md-4">প্রজেক্টের নামঃ <span class="text-danger">*</span></label>
                                <div class="col-md-8">
                                    <input type="text" id="name" name="name" class="form-control" placeholder="প্রজেক্টের নাম"
                                        value="{{ old('name') }}" required />
                                </div>
                            </div>
                            <div class="row mt-3">
                                <label for="slogan" class="col-md-4">প্রজেক্টের শ্লোগানঃ </label>
                                <div class="col-md-8">
                                    <input type="text" id="slogan" name="slogan" class="form-control" placeholder="প্রজেক্টের শ্লোগান"
                                        value="{{ old('slogan') }}" />
                                </div>
                            </div>
                            <div class="row mt-3">
                                <label for="image" class="col-md-4">লোগোঃ </label>
                                <div class="col-md-8">
                                    <input type="file" id="image" name="image" class="form-control" />
                                </div>
                            </div>
                            <div class="row mt-3">
                                <label for="project_photos" class="col-md-4">প্রজেক্টের অন্যান্য ছবিঃ </label>
                                <div class="col-md-8">
                                    <input type="file" id="project_photos" name="project_photos[]" class="form-control" accept="image/*" multiple />
                                </div>
                            </div>
                            <div class="row mt-3">
                                <label for="description" class="col-md-4">বিস্তারিত তথ্যঃ </label>
                                <div class="col-md-8">
                                    <textarea id="description" name="description" class="form-control" rows="5" placeholder="বিস্তারিত তথ্য..."></textarea>
                                </div>
                            </div>
                            <div class="row mt-3">
                                <label for="" class="col-md-4"></label>
                                <div class="col-md-4">
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
@push('scripts')
<script>
    document.addEventListener("DOMContentLoaded", function () {
        // List of editor IDs
        const editors = ['description'];

        editors.forEach(id => {
            const el = document.querySelector(`#${id}`);
            if (el && !el.classList.contains('ck-editor-initialized')) {
                ClassicEditor
                    .create(el)
                    .then(editor => {
                        el.classList.add('ck-editor-initialized');
                    })
                    .catch(error => {
                        console.error(`Error initializing ${id}:`, error);
                    });
            }
        });
    });
</script>
@endpush