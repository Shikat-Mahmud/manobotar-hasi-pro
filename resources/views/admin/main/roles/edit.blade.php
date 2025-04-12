@extends('admin.layouts.master')
@section('title', 'রোল এডিট করুন')
@section('content')
<section class="pc-container">
    <div class="pc-content">
        <div class="row">
            <div class="col-xl-12">
                <div class="card">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <div>
                            <h4>রোল এডিট করুন</h4>

                        </div>
                        <div>
                            <a href="{{ route('admin.roles.index') }}" class="btn btn-primary btn-sm"><i
                                    class="fas fa-arrow-left mr-2 "></i> রোল তালিকা</a>
                        </div>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('admin.roles.update', $role) }}" method="post">
                            @csrf
                            @method('PUT')
                            <div class="row mt-3">
                                <label for="name" class="col-md-4" required>রোলের নামঃ </label>
                                <div class="col-md-8">
                                    @if ($role->name !== 'super_admin' && $role->name !== 'admin')
                                    <input type="text" name="name" value="{{ $role->name }}" class="form-control" placeholder="রোলের নাম" />
                                    @else
                                    <input type="text" name="name" value="{{ $role->name }}" class="form-control"
                                        readonly />
                                    @endif
                                </div>
                            </div>

                            <div class="row mt-3">
                                <div class="col-md-4 ">
                                    <input type="submit" value="আপডেট" class="btn btn-success">
                                </div>
                            </div>
                        </form>
                    </div>
                </div>

                <div class="card">
                    <div class="card-header">
                        <h3 class="text-center">রোলের পারমিশন সমূহ</h3>
                    </div>

                    <div class="card-body">
                        <div>
                            @if ($role->permissions->isNotEmpty())
                            @foreach ($role->permissions as $role_permission)
                            <div style="display: inline-block; margin: 3px;">
                                <div class="p-2 rounded bg-info">
                                    <span class="text-white">
                                        <i class="fas fa-pencil-alt"></i>
                                        <b>{{ $role_permission->name }}</b>
                                    </span>
                                </div>
                            </div>
                            @endforeach
                            @else
                            <p class="ml-3"> &#128532; এই রোলের কোনো পারমিশন পাওয়া যায়নি! </p>
                            @endif
                        </div>
                    </div>

                    <div class="card-body">
                        <form action="{{ route('admin.roles.permissions', $role->id) }}" method="post">
                            @csrf

                            <div class="card-body table-responsive">
                                <table class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th scope="col">পারমিশনের ধরণ</th>
                                            <th scope="col">ভিউ </th>
                                            <th scope="col">অ্যাড </th>
                                            <th scope="col">এডিট </th>
                                            <th scope="col">ডিলিট </th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                        <tr>
                                            <td>ইউজার </td>
                                            <td>
                                                <input type="checkbox" class="form-check-input" name="permissions[]"
                                                    value="show-user" {{ $role->hasPermissionTo('show-user') ? 'checked'
                                                : '' }}>
                                            </td>
                                            <td>
                                                <input type="checkbox" class="form-check-input" name="permissions[]"
                                                    value="create-user" {{ $role->hasPermissionTo('create-user') ?
                                                'checked' : '' }}>
                                            </td>
                                            <td>
                                                <input type="checkbox" class="form-check-input" name="permissions[]"
                                                    value="set-userRole" {{ $role->hasPermissionTo('set-userRole') ?
                                                'checked' : '' }}>
                                            </td>

                                            <td>
                                                <input type="checkbox" class="form-check-input" name="permissions[]"
                                                    value="delete-user" {{ $role->hasPermissionTo('delete-user') ?
                                                'checked' : '' }}>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>রোল </td>
                                            <td>

                                            </td>
                                            <td>
                                                <input type="checkbox" class="form-check-input" name="permissions[]"
                                                    value="create-role" {{ $role->hasPermissionTo('create-role') ?
                                                'checked' : '' }}>
                                            </td>
                                            <td>
                                                <input type="checkbox" class="form-check-input" name="permissions[]"
                                                    value="edit-role" {{ $role->hasPermissionTo('edit-role') ? 'checked'
                                                : '' }}>
                                            </td>

                                            <td>
                                                <input type="checkbox" class="form-check-input" name="permissions[]"
                                                    value="delete-role" {{ $role->hasPermissionTo('delete-role') ?
                                                'checked' : '' }}>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>সাধারণ সেটিংস </td>
                                            <td>

                                            </td>
                                            <td>

                                            </td>
                                            <td>
                                                <input type="checkbox" class="form-check-input" name="permissions[]"
                                                    value="update-general-setting" {{
                                                    $role->hasPermissionTo('update-general-setting') ? 'checked' : ''
                                                }}>
                                            </td>
                                            <td>

                                            </td>
                                        </tr>
                                        <tr>
                                            <td>ইমেইল সেটিংস </td>
                                            <td>

                                            </td>
                                            <td>

                                            </td>
                                            <td>
                                                <input type="checkbox" class="form-check-input" name="permissions[]"
                                                    value="update-email-setting" {{
                                                    $role->hasPermissionTo('update-email-setting') ? 'checked' : ''
                                                }}>
                                            </td>
                                            <td>

                                            </td>
                                        </tr>
                                        <tr>
                                            <td>এডমিন প্যানেল </td>
                                            <td>
                                                <input type="checkbox" class="form-check-input" name="permissions[]"
                                                    value="admin-panel" {{ $role->hasPermissionTo('admin-panel') ?
                                                'checked' : '' }}>
                                            </td>
                                            <td>

                                            </td>
                                            <td>

                                            </td>
                                            <td>

                                            </td>
                                        </tr>
                                        <tr>
                                            <td>ক্যাশ পরিষ্কার </td>
                                            <td>
                                                <input type="checkbox" class="form-check-input" name="permissions[]"
                                                    value="cache-clear" {{ $role->hasPermissionTo('cache-clear') ?
                                                'checked' : '' }}>
                                            </td>
                                            <td>

                                            </td>
                                            <td>

                                            </td>
                                            <td>

                                            </td>
                                        </tr>

                                    </tbody>
                                </table>
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