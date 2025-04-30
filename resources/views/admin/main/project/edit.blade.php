@extends('admin.layouts.master')
@section('title', 'প্রজেক্ট এডিট করুন')
@section('content')
    <section class="pc-container">
        <div class="pc-content">
            <div class="row">
                <div class="col-xl-12">
                    <div class="card">
                        <div class="card-header d-flex justify-content-between align-items-center">
                            <div>
                                <h4>প্রজেক্ট এডিট করুন</h4>

                            </div>
                            <div>
                                <a href="{{ route('projects') }}" class="btn btn-primary btn-sm"><i
                                        class="fas fa-arrow-left mr-2 "></i> প্রজেক্ট তালিকা</a>
                            </div>
                        </div>
                        <div class="card-body">
                            <form action="{{ route('update.project', $project->id) }}" method="post"
                                enctype="multipart/form-data">
                                @csrf
                                <div class="row mt-3">
                                    <label for="event-name" class="col-md-4">প্রজেক্টের নামঃ <span
                                            class="text-danger">*</span></label>
                                    <div class="col-md-8">
                                        <input type="text" id="event-name" name="name"
                                            value="{{ old('name', $project->name) }}" class="form-control"
                                            placeholder="প্রজেক্টের নাম" required />
                                    </div>
                                </div>
                                <div class="row mt-3">
                                    <label for="slogan" class="col-md-4">প্রজেক্টের শ্লোগানঃ </label>
                                    <div class="col-md-8">
                                        <input type="text" id="slogan" name="slogan"
                                            value="{{ old('slogan', $project->slogan) }}" class="form-control"
                                            placeholder="প্রজেক্টের শ্লোগান" />
                                    </div>
                                </div>
                                <div class="row mt-3">
                                    <label for="event-image" class="col-md-4">লোগোঃ </label>
                                    <div class="col-md-8">
                                        <input type="file" id="event-image" name="image" class="form-control" />
                                        @if ($project->image)
                                            <img class="p-t-10" src="{{ asset('storage/' . $project->image) }}"
                                                alt="{{ $project->name }}" width="100" />
                                        @endif
                                    </div>
                                </div>
                                <div class="row mt-3">
                                    <label for="project_photos" class="col-md-4">প্রজেক্টের অন্যান্য ছবিঃ </label>
                                    <div class="col-md-8">
                                        <input type="file" id="project_photos" name="project_photos[]"
                                            class="form-control" accept="image/*" multiple />
                                    </div>
                                </div>
                                <div class="row mt-3">
                                    <label for="event-description" class="col-md-4">বিস্তারিত তথ্যঃ </label>
                                    <div class="col-md-8">
                                        <textarea id="description" name="description" class="form-control" rows="5" placeholder="বিস্তারিত তথ্য">{{ old('description', $project->description) }}</textarea>
                                    </div>
                                </div>
                                <div class="row mt-3">
                                    <label class="col-md-4"></label>
                                    <div class="col-md-4">
                                        <input type="submit" value="আপডেট" class="btn btn-success">
                                    </div>
                                </div>
                            </form>

                            <hr class="my-4">
                            <h5 class="text-center mb-3">পুরানো ছবিসমূহ</h5>

                            @if (is_array($project->project_photos) && count($project->project_photos))
                                <div class="row mt-3">
                                    <div class="col-md-12 d-flex flex-wrap">
                                        @foreach ($project->project_photos as $index => $photo)
                                            <div class="position-relative m-2" style="width: 130px; height: 130px;">
                                                <img src="{{ asset('storage/' . $photo) }}" alt="Photo"
                                                    class="img-thumbnail"
                                                    style="width: 100%; height: 100%; object-fit: cover; border-radius: 6px;">
                                                <form
                                                    action="{{ route('project.photo.delete', ['project' => $project->id, 'index' => $index]) }}"
                                                    method="POST">
                                                    @csrf
                                                    <button type="submit" class="btn btn-danger btn-sm"
                                                        style="position: absolute; top: 5px; right: 5px;"
                                                        onclick="return confirm('আপনি কি এই ছবি মুছে ফেলতে চান?')">
                                                        <i class="ph ph-trash"></i>
                                                    </button>
                                                </form>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
@push('scripts')
    <script>
        document.addEventListener("DOMContentLoaded", function() {
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
