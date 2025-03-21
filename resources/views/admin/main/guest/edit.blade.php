@extends('admin.layouts.master')
@section('title', 'Edit Guest')
@section('content')
<section class="pc-container">
    <div class="pc-content">
        <div class="row">
            <div class="col-xl-12">
                <div class="card">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <div>
                            <h4>Edit Guest</h4>
                        </div>
                        <div>
                            <a href="{{ route('guests') }}" class="btn btn-primary btn-sm"><i class="fas fa-arrow-left mr-2 "></i> Guest List</a>
                        </div>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('update.guest', $guest->id) }}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="row mt-3">
                                <label for="guest-name" class="col-md-4">Guest Name: <span class="text-danger">*</span></label>
                                <div class="col-md-8">
                                    <input type="text" id="guest-name" name="name" value="{{ old('name', $guest->name) }}" class="form-control" placeholder="Guest name" required />
                                </div>
                            </div>
                            <div class="row mt-3">
                                <label for="guest-designation" class="col-md-4">Designation: <span class="text-danger">*</span></label>
                                <div class="col-md-8">
                                    <input type="text" id="guest-designation" name="designation" value="{{ old('designation', $guest->designation) }}" class="form-control" placeholder="Designation" required />
                                </div>
                            </div>
                            <div class="row mt-3">
                                <label for="guest-photo" class="col-md-4">Photo: </label>
                                <div class="col-md-8">
                                    <input type="file" id="guest-photo" name="photo" class="form-control" />
                                    @if($guest->photo)
                                        <img class="p-t-10" src="{{ asset('storage/' . $guest->photo) }}" alt="{{ $guest->name }}"
                                            width="100" />
                                    @endif
                                </div>
                            </div>
                            <div class="row mt-3">
                                <label class="col-md-4"></label>
                                <div class="col-md-4">
                                    <input type="submit" value="Update" class="btn btn-success">
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