@extends('admin.layouts.master')
@section('title', 'Contact Details')
@section('content')
    <section class="pc-container">
        <div class="pc-content">
            <div class="row">
                <div class="col-xl-12">
                    <div class="card">
                        <div class="card-header d-flex justify-content-between align-items-center">
                            <div>
                                <h4>Contact Details</h4>

                            </div>
                            <div>
                                <a href="{{ route('contact.list') }}" class="btn btn-primary btn-sm"><i class="fas fa-arrow-left mr-2 "></i> Contact List</a>
                            </div>
                        </div>
                        <div class="card-body text-dark">
                            <div class="row d-flex text-left">
                                <div class="col-md-4">
                                    <b><span>Name: </span></b>
                                </div>
                                <div class="col-md-8">
                                    <p class="ml-3">{{ $contact->name }}</p>
                                </div>
                            </div>
                            <div class="row d-flex text-left">
                                <div class="col-md-4">
                                    <b><span>Email: </span></b>
                                </div>
                                <div class="col-md-8">
                                    <p class="ml-3">{{ $contact->email }}</p>
                                </div>
                            </div>
                            <div class="row d-flex text-left">
                                <div class="col-md-4">
                                    <b><span>Message: </span></b>
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
