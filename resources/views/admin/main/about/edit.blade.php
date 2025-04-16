@extends('admin.layouts.master')
@section('title', 'প্রতিষ্ঠানের তথ্য এডিট')
@section('content')
    <section class="pc-container">
        <div class="pc-content">
            <div class="row">
                <div class="col-xl-12">
                    <div class="card">
                        <div class="card-header d-flex justify-content-between align-items-center">
                            <div>
                                <h4>প্রতিষ্ঠানের তথ্য এডিট করুন</h4>
                            </div>
                            <div>
                                <a href="{{ route('show.about') }}" class="btn btn-primary btn-sm"><i
                                        class="fas fa-arrow-left mr-2 "></i> প্রতিষ্ঠানের তথ্য</a>
                            </div>
                        </div>
                        <div class="card-body">
                            <form action="{{ route('update.about', $about->id) }}" method="post"
                                enctype="multipart/form-data">
                                @csrf
                                <div class="row mt-3">
                                    <label for="organization_name" class="col-md-4">প্রতিষ্ঠানের নামঃ <span
                                            class="text-danger">*</span></label>
                                    <div class="col-md-8">
                                        <input type="text" id="organization_name" name="organization_name"
                                            value="{{ old('name', $about->organization_name) }}" class="form-control"
                                            placeholder="প্রতিষ্ঠানের নাম" required />
                                    </div>
                                </div>
                                <div class="row mt-3">
                                    <label for="slogan" class="col-md-4">শ্লোগানঃ <span
                                            class="text-danger">*</span></label>
                                    <div class="col-md-8">
                                        <input type="text" id="slogan" name="slogan"
                                            value="{{ old('name', $about->slogan) }}" class="form-control"
                                            placeholder="শ্লোগান" required />
                                    </div>
                                </div>
                                {{-- <div class="row mt-3">
                                    <label for="description" class="col-md-4">বিস্তারিত তথ্যঃ</label>
                                    <div class="col-md-8">
                                        <textarea id="description" name="description" class="form-control" rows="5" placeholder="বিস্তারিত তথ্য">{{ old('description', $about->description) }}</textarea>
                                    </div>
                                </div>

                                <div class="row mt-3">
                                    <label for="other_info" class="col-md-4">অন্যান্য তথ্যঃ</label>
                                    <div class="col-md-8">
                                        <textarea id="other_info" name="other_info" class="form-control" rows="5" placeholder="অন্যান্য তথ্য">{{ old('other_info', $about->other_info) }}</textarea>
                                    </div>
                                </div> --}}

                                <div class="row mt-3">
                                    <label for="description" class="col-md-4">বিস্তারিত তথ্যঃ</label>
                                    <div class="col-md-8">
                                        <textarea id="description" name="description" class="form-control" rows="5" placeholder="বিস্তারিত তথ্য">{{ old('description', $about->description) }}</textarea>
                                    </div>
                                </div>

                                <div class="row mt-3">
                                    <label for="other_info" class="col-md-4">অন্যান্য তথ্যঃ</label>
                                    <div class="col-md-8">
                                        <textarea id="other_info" name="other_info" class="form-control" rows="5" placeholder="অন্যান্য তথ্য">{{ old('other_info', $about->other_info) }}</textarea>
                                    </div>
                                </div>
                                <div class="row mt-3">
                                    <label for="location" class="col-md-4">ঠিকানাঃ</label>
                                    <div class="col-md-8">
                                        <input type="text" id="location" name="location"
                                            value="{{ old('name', $about->location) }}" class="form-control"
                                            placeholder="ঠিকানা" />
                                    </div>
                                </div>
                                <div class="row mt-3">
                                    <label for="stablished_date" class="col-md-4">প্রতিষ্ঠিত তারিখঃ</label>
                                    <div class="col-md-8">
                                        <input type="date" id="stablished_date" name="stablished_date"
                                            value="{{ old('name', $about->stablished_date) }}" class="form-control"
                                            placeholder="প্রতিষ্ঠিত তারিখ" />
                                    </div>
                                </div>
                                <div class="row mt-3">
                                    <label for="image" class="col-md-4">ছবিঃ </label>
                                    <div class="col-md-8">
                                        <input type="file" id="image" name="image" class="form-control" />
                                        @if ($about->image)
                                            <img class="p-t-10" src="{{ asset('storage/' . $about->image) }}"
                                                alt="{{ $about->organization_name }}" width="100" />
                                        @endif
                                    </div>
                                </div>
                                <div class="row mt-3">
                                    <label for="image2" class="col-md-4">অতিরিক্ত ছবিঃ </label>
                                    <div class="col-md-8">
                                        <input type="file" id="image2" name="image2" class="form-control" />
                                        @if ($about->image2)
                                            <img class="p-t-10" src="{{ asset('storage/' . $about->image2) }}"
                                                alt="{{ $about->organization_name }}" width="100" />
                                        @endif
                                    </div>
                                </div>
                                <div class="row mt-3">
                                    <label class="col-md-4"></label>
                                    <div class="col-md-8">
                                        <button type="button" class="btn btn-danger me-2"
                                            onclick="window.history.back()">বাদ দিন</button>
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
@push('scripts')
    {{-- older version of ckeditor --}}
    {{-- <script src="https://cdn.ckeditor.com/4.21.0/standard/ckeditor.js"></script>
    <script>
        CKEDITOR.replace('description');
        CKEDITOR.replace('other_info');
    </script> --}}

    <!-- Load the latest CKEditor 5 Classic build -->
{{-- <script src="https://cdn.ckeditor.com/ckeditor5/40.0.0/classic/ckeditor.js"></script> --}}

<script>
    document.addEventListener("DOMContentLoaded", function () {
        // List of editor IDs
        const editors = ['description', 'other_info'];

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
