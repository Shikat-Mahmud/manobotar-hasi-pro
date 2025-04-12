@extends('admin.layouts.master')
@section('title', 'নতুন ইউজার')
@section('content')
    <section class="pc-container">
        <div class="pc-content">
            <div class="row">
                <div class="col-xl-12">
                    <div class="card">
                        <div class="card-header d-flex justify-content-between align-items-center">
                            <div>
                                <h4>নতুন ইউজার</h4>
                            </div>
                            <div>
                                <a href="{{ route('admin.users.index') }}" class="btn btn-primary btn-sm"><i
                                        class="fas fa-arrow-left mr-2 "></i> ইউজারের তালিকা</a>
                            </div>
                        </div>

                        <div class="card-body">
                            <form action="{{ route('admin.users.store') }}" method="post">
                                @csrf
                                <div class="row mt-3">
                                    <label for="name" class="col-md-4">নামঃ <span class="text-danger">*</span></label>
                                    <div class="col-md-8">
                                        <input type="text" id="name" name="name" class="form-control"
                                            placeholder="নাম" required />
                                        <x-input-error :messages="$errors->get('name')" class="mt-2" style="color: #FF0000;" />
                                    </div>
                                </div>

                                <div class="row mt-3">
                                    <label for="email" class="col-md-4">ইমেইলঃ <span class="text-danger">*</span></label>
                                    <div class="col-md-8">
                                        <input type="email" id="email" name="email" class="form-control"
                                            placeholder="ইমেইল" required />
                                        <x-input-error :messages="$errors->get('email')" class="mt-2" style="color: #FF0000;" />
                                    </div>
                                </div>

                                <div class="row mt-3">
                                    <label for="roles" class="col-md-4">রোলঃ <span class="text-danger">*</span></label>
                                    <div class="col-md-8">
                                        <select name="roles" id="roles" class="form-control">
                                            <option value="" disabled selected>রোল নির্বাচন করুন</option>
                                            @foreach ($roles as $role)
                                                @if ($role->name !== 'super_admin')
                                                    <option value="{{ $role->id }}">{{ $role->name }}</option>
                                                @endif
                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                                <div class="row mt-3">
                                    <label for="password" class="col-md-4">পাসওয়ার্ডঃ <span
                                            class="text-danger">*</span></label>
                                    <div class="col-md-8">
                                        <input type="password" id="password" name="password" class="form-control"
                                            placeholder="পাসওয়ার্ড" required />
                                        <x-input-error :messages="$errors->get('password')" class="mt-2" style="color: #FF0000;" />
                                    </div>
                                </div>

                                <div class="row mt-3">
                                    <label for="password_confirmation" class="col-md-4">পাসওয়ার্ড নিশ্চিত করুনঃ <span
                                            class="text-danger">*</span></label>
                                    <div class="col-md-8">
                                        <input type="password" id="password_confirmation" name="password_confirmation"
                                            class="form-control" placeholder="পাসওয়ার্ড নিশ্চিত করুন" required />
                                        <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" style="color: #FF0000;" />
                                    </div>
                                </div>
                                <br>

                                <div class="row mt-3">
                                    <label for="" class="col-md-4"></label>
                                    <div class="col-md-4 ">
                                        <input type="submit" value="সাবমিট" class="btn btn-success">
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
