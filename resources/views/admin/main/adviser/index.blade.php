@extends('admin.layouts.master')
@section('title', 'উপদেষ্টা তালিকা')
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
                                উপদেষ্টা তালিকা
                            </div>
                            <div>
                                <a href="{{ route('create.adviser') }}" class="btn btn-primary btn-sm"> <i class="ph ph-plus"></i>
                                    নতুন উপদেষ্টা</a>
                            </div>
                        </div>
                        <div class="card-body table-border-style">
                            <div class="table-responsive">
                                <table class="table" id="example" style="max-width:100%;">
                                    <thead>
                                        <tr>
                                            <th>উপদেষ্টার নাম</th>
                                            <th>পদবী</th>
                                            <th>মোবাইল</th>
                                            <th>ইমেইল</th>
                                            <th>ছবি</th>
                                            <th>অ্যাকশন</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($advisers as $member)
                                            <tr>
                                                <td>{{ $member->name }}</td>
                                                <td>{{ $member->title ?? '--' }}</td>
                                                <td>{{ $member->phone ?? '--' }}</td>
                                                <td>{{ $member->email ?? '--' }}</td>
                                                <td>
                                                    @if ($member->photo)
                                                        <img src="{{ asset('storage/' . $member->photo) }}" alt="ছবি"
                                                            style="height: 50px; border-radius: 6px;">
                                                    @else
                                                        <img src="{{ asset('assets/images/user/avatar-2.jpg') }}"
                                                            alt="ছবি" style="height: 50px; border-radius: 6px;">
                                                    @endif
                                                </td>
                                                <td>
                                                    <div class="d-flex">

                                                        <a class="btn btn-info btn-sm me-2"
                                                            href="{{ route('edit.adviser', $member->id) }}"><i class="ph ph-pencil"></i> এডিট</a>

                                                        <form class="deleteForm"
                                                            action="{{ route('destroy.adviser', $member->id) }}"
                                                            method="post">
                                                            @csrf
                                                            <button type="button"
                                                                class="btn btn-danger btn-sm btnDelete"><i class="ph ph-trash"></i> ডিলিট</button>
                                                        </form>
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
