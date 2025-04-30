@extends('admin.layouts.master')
@section('title', 'প্রজেক্ট বিস্তারিত')
@section('content')
    <section class="pc-container">
        <div class="pc-content">
            <div class="row">
                <div class="col-xl-12">
                    <div class="card">

                        <div class="card-header d-flex justify-content-between align-items-center">
                            <h4>প্রজেক্ট বিস্তারিত</h4>
                            <a href="{{ route('projects') }}" class="btn btn-primary btn-sm">
                                <i class="fas fa-arrow-left mr-2"></i> সব প্রজেক্ট
                            </a>
                        </div>

                        <div class="card-body text-dark">

                            <div class="text-center mb-4">
                                @if ($project->image)
                                    <img src="{{ asset('storage/' . $project->image) }}" alt="Main Image"
                                        style="height: 200px; border-radius: 10px;">
                                @else
                                    <img src="{{ asset('assets/images/user/avatar-2.jpg') }}" alt="No Image"
                                        style="height: 200px;">
                                @endif
                            </div>

                            <div class="row mb-3">
                                <div class="col-md-4"><strong>প্রজেক্টের নামঃ</strong></div>
                                <div class="col-md-8">{{ $project->name }}</div>
                            </div>

                            @if ($project->slogan)
                                <div class="row mb-3">
                                    <div class="col-md-4"><strong>প্রজেক্টের স্লোগানঃ</strong></div>
                                    <div class="col-md-8">{{ $project->slogan }}</div>
                                </div>
                            @endif

                            @if ($project->description)
                                <div class="row mb-3">
                                    <div class="col-md-4"><strong>বিস্তারিত তথ্যঃ</strong></div>
                                    <div class="col-md-8">{!! $project->description !!}</div>
                                </div>
                            @endif

                            @if (!empty($project->project_photos) && is_array($project->project_photos))
                                <hr>
                                <h5 class="text-center mb-3">অতিরিক্ত ছবি</h5>
                                <div class="d-flex flex-wrap">
                                    @foreach ($project->project_photos as $index => $photo)
                                        <div class="position-relative m-2" style="width: 130px; height: 130px;">
                                            <img src="{{ asset('storage/' . $photo) }}" alt="Project Photo"
                                                class="img-thumbnail"
                                                style="width: 100%; height: 100%; object-fit: cover; border-radius: 6px;">
                                            <form
                                                action="{{ route('project.photo.delete', ['project' => $project->id, 'index' => $index]) }}"
                                                method="POST" style="position: absolute; top: 5px; right: 5px;">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger btn-sm"
                                                    onclick="return confirm('আপনি কি নিশ্চিতভাবে মুছে ফেলতে চান?')">
                                                    <i class="ph ph-trash"></i>
                                                </button>
                                            </form>
                                        </div>
                                    @endforeach
                                </div>
                            @endif

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
