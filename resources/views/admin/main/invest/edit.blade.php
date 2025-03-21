@extends('admin.layouts.master')
@section('title', 'Edit Investment')
@section('content')
<section class="pc-container">
    <div class="pc-content">
        <div class="row">
            <div class="col-xl-12">
                <div class="card">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <div>
                            <h4>Edit Investment</h4>
                        </div>
                        <div>
                            <a href="{{ route('invests') }}" class="btn btn-primary btn-sm"><i class="fas fa-arrow-left mr-2 "></i> Investment List</a>
                        </div>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('update.investment', $invest->id) }}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="row mt-3">
                                <label for="sector" class="col-md-4">Investment Sector: <span class="text-danger">*</span></label>
                                <div class="col-md-8">
                                    <input type="text" id="sector" name="sector" value="{{ old('sector', $invest->sector) }}" class="form-control" placeholder="Investment Sector" required />
                                </div>
                            </div>
                            <div class="row mt-3">
                                <label for="donation-name" class="col-md-4">Invested By Person: <span class="text-danger">*</span></label>
                                <div class="col-md-8">
                                    <input type="text" id="donation-name" name="name" value="{{ old('name', $invest->name) }}" class="form-control" placeholder="Invested By Person" required />
                                </div>
                            </div>
                            <div class="row mt-3">
                                <label for="donation-amount" class="col-md-4">Invested Amount: <span class="text-danger">*</span></label>
                                <div class="col-md-8">
                                    <input type="text" id="donation-amount" name="amount" value="{{ old('amount', $invest->amount) }}" class="form-control" placeholder="Invested Amount" required />
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