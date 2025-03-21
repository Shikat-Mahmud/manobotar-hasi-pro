@extends('admin.layouts.master')
@section('title', 'নতুন কমিটি সদস্য যোগ')
@section('content')
<section class="pc-container">
    <div class="pc-content">
        <div class="row">
            <div class="col-xl-12">
                <div class="card">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <div>
                            <h4>নতুন কমিটি সদস্য যোগ করুন</h4>
                        </div>
                        <div>
                            <a href="{{ route('committee.list') }}" class="btn btn-primary btn-sm"><i class="fas fa-arrow-left mr-2 "></i> কমিটির সদস্য তালিকা</a>
                        </div>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('committee.store') }}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="row mt-3">
                                <label for="name" class="col-md-4 required">নাম <span class="text-danger">*</span></label>
                                <div class="col-md-8">
                                    <input type="text" name="name" class="form-control" placeholder="নাম" required/>
                                </div>
                            </div>
                            <div class="row mt-3">
                                <label for="position" class="col-md-4 required">পজিশন</label>
                                <div class="col-md-8">
                                    <input type="text" name="position" class="form-control" placeholder="পজিশন"/>
                                </div>
                            </div>
                            <div class="row mt-3">
                                <label for="phone" class="col-md-4 required">মোবাইল</label>
                                <div class="col-md-8">
                                    <input type="text" name="phone" class="form-control" placeholder="মোবাইল"/>
                                </div>
                            </div>
                            <div class="row mt-3">
                                <label for="email" class="col-md-4 required">ইমেইল</label>
                                <div class="col-md-8">
                                    <input type="text" name="email" class="form-control" placeholder="ইমেইল"/>
                                </div>
                            </div>
                            <div class="row mt-3">
                                <label for="blood_group" class="col-md-4 required">রক্তের গ্রুপ</label>
                                <div class="col-md-8">
                                    <select name="blood_group" class="form-control">
                                        <option value="">রক্তের গ্রুপ নির্বাচন করুন</option>
                                        <option value="A+">A+</option>
                                        <option value="A-">A-</option>
                                        <option value="B+">B+</option>
                                        <option value="B-">B-</option>
                                        <option value="AB+">AB+</option>
                                        <option value="AB-">AB-</option>
                                        <option value="O+">O+</option>
                                        <option value="O-">O-</option>
                                    </select>
                                </div>
                            </div>
                            <div class="row mt-3">
                                <label for="photo" class="col-md-4">ছবি </label>
                                <div class="col-md-8">
                                    <input type="file" name="photo" id="photo" class="form-control" accept="image/*" />
                                </div>
                            </div>
                            <div class="row mt-3">
                                <label class="col-md-4"></label>
                                <div class="col-md-8">
                                    <button type="button" class="btn btn-danger me-2" onclick="window.history.back()">বাদ দিন</button>
                                    <input type="submit" value="যোগ করুন" class="btn btn-success">
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