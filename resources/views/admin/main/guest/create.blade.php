@extends('admin.layouts.master')
@section('title', 'Add Guest')
@section('content')
<section class="pc-container">
    <div class="pc-content">
        <div class="row">
            <div class="col-xl-12">
                <div class="card">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <div>
                            <h4>Add Guest</h4>
                        </div>
                        <div>
                            <a href="{{ route('guests') }}" class="btn btn-primary btn-sm"><i class="fas fa-arrow-left mr-2 "></i> Guest List</a>
                        </div>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('store.guest') }}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="row mt-3">
                                <label for="" class="col-md-4 required">Guest Name <span class="text-danger">*</span></label>
                                <div class="col-md-8">
                                    <input type="text" name="name" class="form-control" placeholder="Guest Name" required/>
                                </div>
                            </div>
                            <div class="row mt-3">
                                <label for="designation" class="col-md-4 required">Designation <span class="text-danger">*</span></label>
                                <div class="col-md-8">
                                    <input type="text" name="designation" id="designation" class="form-control" placeholder="Designation" required/>
                                </div>
                            </div>
                            <div class="row mt-3">
                                <label for="photo" class="col-md-4">Photo </label>
                                <div class="col-md-8">
                                    <input type="file" name="photo" id="photo" class="form-control" accept="image/*" />
                                </div>
                            </div>
                            <div class="row mt-3">
                                <div class="col-md-4 ">
                                    <input type="submit" value="create" class="btn btn-success">
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