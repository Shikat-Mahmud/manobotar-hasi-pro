@extends('admin.layouts.master')
@section('title', 'রক্তদাতা তালিকা')
@push('styles')
    <style>
        .desc-box {
            max-width: 250px;
            overflow: hidden;
            text-overflow: ellipsis;
            white-space: nowrap;
        }
    </style>
@endpush
@section('content')
    <section class="pc-container">
        <div class="pc-content">
            <div class="row">
                <div class="col-xl-12">
                    <div class="card">
                        <div class="card-header d-flex justify-content-between align-items-center">
                            <div>
                                <i class="fas fa-table me-1"></i>
                                রক্তদাতা তালিকা
                            </div>
                            <div>
                                <a href="{{ route('create.blood-doner') }}" class="btn btn-primary btn-sm"><i
                                        class="fas fa-plus ml-2 "></i> নতুন রক্তদাতা </a>
                            </div>
                        </div>
                        <div class="card-body table-border-style">
                            <div class="table-responsive">
                                <table class="table" id="example" style="max-width:100%;">
                                    <thead>
                                        <tr>
                                            <th>রক্তদাতার নাম</th>
                                            <th>ছবি</th>
                                            <th>রক্তের গ্রুপ</th>
                                            <th>মোবাইল নম্বর</th>
                                            <th>ঠিকানা</th>
                                            <th>স্ট্যাটাস</th>
                                            <th>একশন</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($doners as $member)
                                            <tr>
                                                <td>{{ $member->name }}</td>
                                                <td>
                                                    @if ($member->photo)
                                                        <img src="{{ asset('storage/' . $member->photo) }}"
                                                            alt="Member photo" style="height: 50px; border-radius: 6px;">
                                                    @else
                                                        <img src="{{ asset('assets/images/user/avatar-2.jpg') }}"
                                                            alt="Default photo" style="height: 50px; border-radius: 6px;">
                                                    @endif
                                                </td>
                                                <td>{{ $member->blood_group }}</td>
                                                <td>{{ $member->phone }}</td>
                                                <td>{{ $member->address }}</td>
                                                <td>
                                                    @if ($member->status === 1)
                                                        <span class="badge bg-success">সক্রিয়</span>
                                                    @elseif($member->status === 0)
                                                        <span class="badge bg-warning">অপেক্ষমান</span>
                                                    @endif
                                                </td>
                                                <td>
                                                    <div class="d-flex">
                                                        <a class="btn btn-primary btn-sm me-2"
                                                            href="{{ route('show.blood-doner', $member->id) }}"><i
                                                                class="ph ph-eye"></i> দেখুন</a>
                                                        <a class="btn btn-info btn-sm me-2"
                                                            href="{{ route('edit.blood-doner', $member->id) }}"><i
                                                                class="ph ph-pencil"></i> এডিট</a>
                                                        <form class="deleteForm me-2"
                                                            action="{{ route('destroy.blood-doner', $member->id) }}"
                                                            method="post">
                                                            @csrf
                                                            <button type="button"
                                                                class="btn btn-danger btn-sm btnDelete"><i
                                                                    class="ph ph-trash"></i> ডিলিট</button>
                                                        </form>

                                                        @if ($member->status == 1)
                                                            <a class="btn btn-success btn-sm"
                                                                href="{{ route('blood-doner.status', $member->id) }}">
                                                                <i class="ph ph-drop"></i>
                                                            </a>
                                                        @else
                                                            <a class="btn btn-warning btn-sm"
                                                                href="{{ route('blood-doner.status', $member->id) }}">
                                                                <i class="ph ph-drop"></i>
                                                            </a>
                                                        @endif
                                                    </div>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </div>
    </section>
@endsection
