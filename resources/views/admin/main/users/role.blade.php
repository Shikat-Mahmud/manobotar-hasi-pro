@extends('admin.layouts.master')
@section('title', 'ইউজারের রোল')
@section('content')
<section class="pc-container">
    <div class="pc-content">
        <div class="row">
            <div class="col-xl-12">
                <div class="card">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <div>
                            <h4>ইউজারের তথ্য</h4>

                        </div>
                        <div>
                            <a href="{{ route('admin.users.index') }}" class="btn btn-primary btn-sm"><i
                                    class="fas fa-arrow-left mr-2 "></i> ইউজারের তালিকা</a>
                        </div>
                    </div>

                    <div class="card-body text-center">
                        <div class="p-2">
                            @if (isset($user->photo))
                            <img src="{{ asset('storage/' . $user->photo) }}" alt="Photo" class="rounded-circle"
                                style="height: 100px; width: 100px; object-fit: cover; border: 3px solid #23B7E5; padding: 2px;">
                            @else
                            <img src="{{ asset('/assets/images/user/avatar-2.jpg') }}" class="img-radius mb-4"
                                alt="User-Profile-Image">
                            @endif
                        </div>
                        <div class="d-flex justify-content-center">
                            <div>
                                <span style="font-size: 18px;">নামঃ </span>
                            </div>
                            <div>
                                <span style="font-size: 18px; margin-left: 5px;" class="ml-3"><b>{{ $user->name
                                        }}</b></span>
                            </div>
                        </div>
                        <div class="d-flex justify-content-center">
                            <div>
                                <span style="font-size: 18px;">ইমেইলঃ </span>
                            </div>
                            <div>
                                <span style="font-size: 18px; margin-left: 5px;" class="ml-3"><b>{{ $user->email
                                        }}</b></span>
                            </div>
                        </div>
                        <br>
                    </div>

                </div>

                <div class="card">
                    <div class="card-header">
                        <h3 class="text-center">ইউজারের রোল সমূহ</h3>
                    </div>

                    <div class="card-body">
                        <div class="">
                            @if ($user->roles->isNotEmpty())
                            @foreach ($user->roles as $user_role)
                            <div style="display: inline-block; margin-right: 5px;">
                                <div class="p-2 rounded bg-info">
                                    <span class="text-white">
                                        <i class="fas fa-pencil-alt"></i>
                                        <b>{{ $user_role->name }}</b>
                                    </span>
                                </div>
                            </div>
                            @endforeach
                            @else()
                            <p class="ml-3"> &#128532; এই ইউজারের কোনো রোল পাওয়া যায়নি!</p>
                            @endif
                        </div>
                    </div>

                    <div class="card-body">
                        <form action="{{ route('admin.users.roles', $user->id) }}" method="post">
                            @csrf
                            <div class="row mt-3">
                                <label class="col-md-4">রোল সমূহঃ </label>
                                <div class="col-md-8">
                                    @foreach ($roles as $role)
                                    @if($role->name !== 'super_admin')
                                    <div class="form-check">

                                        <input type="checkbox" name="roles[]" value="{{ $role->name }}"
                                            class="form-check-input" id="{{ $role->name }}" {{
                                            $user->hasRole($role->name) ? 'checked' : '' }}>

                                        <label class="form-check-label" for="{{ $role->name }}">{{ $role->name
                                            }}</label>
                                    </div>
                                    @endif
                                    @endforeach
                                </div>
                            </div>

                            <div class="row mt-3">
                                <div class="col-md-4">
                                    <input type="submit" value="প্রদান করুন" class="btn btn-success">
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