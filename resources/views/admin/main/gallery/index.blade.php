@extends('admin.layouts.master')
@section('title', 'Gallery Images')
@section('content')
<section class="pc-container">
    <div class="pc-content">
        <div class="row">
            <div class="col-xl-12">
                <div class="card">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <div>
                            <i class="fas fa-table me-1"></i>
                            Gallery Images
                        </div>
                        <div>
                            <a href="{{ route('create.gallery') }}" class="btn btn-primary btn-sm"><i class="fas fa-plus ml-2 "></i> Add new photo</a>
                        </div>
                    </div>
                    <div class="card-body">
                        @if (isset($galleries) && count($galleries) > 0)
                            <div class="d-flex flex-wrap justify-content-start">
                                @foreach ($galleries as $gallery)
                                    <div class="position-relative m-2" style="width: 130px; height: 130px;">
                                        <img src="{{ asset('storage/' . $gallery->photo) }}" alt="Photo" class="img-thumbnail" style="width: 100%; height: 100%; object-fit: cover; border-radius: 6px;">
                                        <form class="deleteForm" action="{{ route('destroy.gallery', $gallery->id) }}" method="post" style="position: absolute; top: 5px; right: 5px;">
                                            @csrf
                                            <button type="button" class="btn btn-danger btn-sm btnDelete"><i class="ph ph-trash"></i></button>
                                        </form>
                                    </div>
                                @endforeach
                            </div>
                            @else
                            <div class="d-flex align-items-center justify-content-center flex-column">
                                <img src="{{ asset('/') }}images/empty.jpg" alt="Photo" style="height: 200px;">
                                <h5 class="mt-5 mb-5 text-center text-secondary">There is no image in your gallery!</h5>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
