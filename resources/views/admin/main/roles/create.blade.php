@extends('admin.layouts.master')
@section('title', 'নতুন রোল')
@section('content')
<section class="pc-container">
    <div class="pc-content">
        <div class="row">
            <div class="col-xl-12">
                <div class="card">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <div>
                            <h4>নতুন রোল</h4>

                        </div>
                        <div>
                            <a href="{{ route('admin.roles.index') }}" class="btn btn-primary btn-sm"><i
                                    class="fas fa-arrow-left mr-2 "></i> রোলের তালিকা</a>
                        </div>
                    </div>

                    <div class="card-body">
                        <form action="{{ route('admin.roles.store') }}" method="post">
                            @csrf
                            <div class="row mt-3">
                                <label for="" class="col-md-4" required>রোলের নামঃ <span
                                        class="text-danger">*</span></label>
                                <div class="col-md-8">
                                    <input type="text" name="name" class="form-control" placeholder="রোলের নাম"/>
                                </div>
                            </div>

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
                                                <input type="checkbox" name="permissions[]" value="show-user"
                                                    class="form-check-input">
                                            </td>
                                            <td>
                                            <input type="checkbox" name="permissions[]" value="create-user"
                                                    class="form-check-input">
                                            </td>
                                            <td>
                                                <input type="checkbox" name="permissions[]" value="set-userRole"
                                                    class="form-check-input">
                                            </td>

                                            <td>
                                                <input type="checkbox" name="permissions[]" value="delete-user"
                                                    class="form-check-input">
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>রোল </td>
                                            <td>

                                            </td>
                                            <td>
                                                <input type="checkbox" name="permissions[]" value="create-role"
                                                    class="form-check-input">
                                            </td>
                                            <td>
                                                <input type="checkbox" name="permissions[]" value="edit-role"
                                                    class="form-check-input">
                                            </td>

                                            <td>
                                                <input type="checkbox" name="permissions[]" value="delete-role"
                                                    class="form-check-input">
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>সাধারণ সেটিংস </td>
                                            <td>

                                            </td>
                                            <td>

                                            </td>
                                            <td>
                                                <input type="checkbox" name="permissions[]"
                                                    value="update-general-setting" class="form-check-input">
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
                                                <input type="checkbox" name="permissions[]" value="update-email-setting"
                                                    class="form-check-input">
                                            </td>
                                            <td>

                                            </td>
                                        </tr>
                                        <tr>
                                            <td>এডমিন প্যানেল <span class="text-danger">*</span></td>
                                            <td>
                                                <input type="checkbox" name="permissions[]" value="admin-panel"
                                                    class="form-check-input" checked required >
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
                                                <input type="checkbox" name="permissions[]" value="cache-clear"
                                                    class="form-check-input">
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