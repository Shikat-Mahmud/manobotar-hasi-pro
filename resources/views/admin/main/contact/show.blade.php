@extends('admin.layouts.master')
@section('title', 'যোগাযোগের বিস্তারিত')
@section('content')
    <section class="pc-container">
        <div class="pc-content">
            <div class="row">
                <div class="col-xl-12">
                    <div class="card">
                        <div class="card-header d-flex justify-content-between align-items-center">
                            <div>
                                <h4>যোগাযোগের বিস্তারিত</h4>
                            </div>
                            <div>
                                <a href="{{ route('contact.list') }}" class="btn btn-primary btn-sm"><i class="fas fa-arrow-left mr-2 "></i> যোগাযোগের তালিকা</a>
                            </div>
                        </div>
                        <div class="card-body text-dark">
                            <div class="row d-flex text-left">
                                <div class="col-md-4">
                                    <b><span>নামঃ </span></b>
                                </div>
                                <div class="col-md-8">
                                    <p class="ml-3">{{ $contact->name }}</p>
                                </div>
                            </div>
                            <div class="row d-flex text-left">
                                <div class="col-md-4">
                                    <b><span>ইমেইলঃ </span></b>
                                </div>
                                <div class="col-md-8">
                                    <p class="ml-3">{{ $contact->email }}</p>
                                </div>
                            </div>
                            <div class="row d-flex text-left">
                                <div class="col-md-4">
                                    <b><span>মেসেজঃ </span></b>
                                </div>
                                <div class="col-md-8">
                                    <p class="ml-3">{!! $contact->message !!}</p>
                                </div>
                            </div>
                            <br>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </section>
@endsection
