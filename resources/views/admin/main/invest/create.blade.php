@extends('admin.layouts.master')
@section('title', 'Add Investment')
@section('content')
<section class="pc-container">
    <div class="pc-content">
        <div class="row">
            <div class="col-xl-12">
                <div class="card">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <div>
                            <h4>Add Investment</h4>
                        </div>
                        <div>
                            <a href="{{ route('invests') }}" class="btn btn-primary btn-sm"><i class="fas fa-arrow-left mr-2 "></i> Investment List</a>
                        </div>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('store.investment') }}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="row mt-3">
                                <label for="sector" class="col-md-4 required">Investment Sector: <span class="text-danger">*</span></label>
                                <div class="col-md-8">
                                    <input type="text" name="sector" id="sector" class="form-control" placeholder="Investment Sector" required/>
                                </div>
                            </div>
                            <div class="row mt-3">
                                <label for="name" class="col-md-4 required">Invested By Person: <span class="text-danger">*</span></label>
                                <div class="col-md-8">
                                    <input type="text" name="name" id="name" class="form-control" placeholder="Invested By Person" required/>
                                </div>
                            </div>
                            <div class="row mt-3">
                                <label for="amount" class="col-md-4 required">Invested Amount: <span class="text-danger">*</span></label>
                                <div class="col-md-8">
                                    <input type="text" name="amount" id="amount" class="form-control" placeholder="Invested Amount" required/>
                                </div>
                            </div>
                            <div class="row mt-3">
                                <div class="col-md-4 ">
                                    <input type="submit" value="Add" class="btn btn-success">
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