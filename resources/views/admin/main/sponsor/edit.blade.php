@extends('admin.layouts.master')
@section('title', 'Edit Sponsor')
@section('content')
<section class="pc-container">
    <div class="pc-content">
        <div class="row">
            <div class="col-xl-12">
                <div class="card">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <div>
                            <h4>Edit Sponsor</h4>
                        </div>
                        <div>
                            <a href="{{ route('sponsors') }}" class="btn btn-primary btn-sm"><i class="fas fa-arrow-left mr-2 "></i> Sponsor List</a>
                        </div>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('update.sponsor', $sponsor->id) }}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="row mt-3">
                                <label for="sponsor-company" class="col-md-4">Company Name: <span class="text-danger">*</span></label>
                                <div class="col-md-8">
                                    <input type="text" id="sponsor-company" name="company" value="{{ old('company', $sponsor->company) }}" class="form-control" placeholder="Company Name" required />
                                </div>
                            </div>
                            <div class="row mt-3">
                                <label for="sponsor-amount" class="col-md-4">Amount: <span class="text-danger">*</span></label>
                                <div class="col-md-8">
                                    <input type="text" id="sponsor-amount" name="amount" value="{{ old('amount', $sponsor->amount) }}" class="form-control" placeholder="Amount" required />
                                </div>
                            </div>
                            <div class="row mt-3">
                                <label for="sponsor-photo" class="col-md-4">Photo: </label>
                                <div class="col-md-8">
                                    <input type="file" id="sponsor-photo" name="photo" class="form-control" />
                                    @if($sponsor->photo)
                                        <img class="p-t-10" src="{{ asset('storage/' . $sponsor->photo) }}" alt="{{ $sponsor->name }}"
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