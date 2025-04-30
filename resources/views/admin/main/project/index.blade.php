@extends('admin.layouts.master')
@section('title', 'প্রজেক্ট সমূহ')
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
                                প্রজেক্ট সমূহ
                            </div>
                            <div>
                                <a href="{{ route('create.project') }}" class="btn btn-primary btn-sm"><i
                                        class="fas fa-plus ml-2 "></i> নতুন প্রজেক্ট</a>
                            </div>
                        </div>
                        <div class="card-body table-border-style">
                            <div class="table-responsive">
                                <table class="table" id="example" style="max-width:100%;">
                                    <thead>
                                        <tr>
                                            <th>প্রজেক্টের নাম</th>
                                            <th>ছবি</th>
                                            <th>বিস্তারিত তথ্য</th>
                                            <th>একশন</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($projects as $item)
                                            <tr>
                                                <td>{{ $item->name }}</td>
                                                <td>
                                                    @if ($item->image)
                                                        <img src="{{ asset('storage/' . $item->image) }}" alt="Image"
                                                            style="height: 50px; border-radius: 6px;">
                                                    @else
                                                        <img src="https://placehold.co/400" alt="Default Image"
                                                            style="height: 50px; border-radius: 6px;">
                                                    @endif
                                                </td>
                                                <td class="desc-box">{{ $item->shortDescription }}</td>
                                                <td>
                                                    <div class="d-flex">
                                                        <a class="btn btn-secondary btn-sm me-2"
                                                            href="{{ route('show.project', $item->id) }}"><i
                                                                class="ph ph-eye"></i> দেখুন</a>
                                                        <a class="btn btn-info btn-sm me-2"
                                                            href="{{ route('edit.project', $item->id) }}"><i
                                                                class="ph ph-pencil"></i> এডিট</a>
                                                        <form class="deleteForm"
                                                            action="{{ route('destroy.project', $item->id) }}"
                                                            method="post">
                                                            @csrf
                                                            <button type="button"
                                                                class="btn btn-danger btn-sm btnDelete me-2"><i
                                                                    class="ph ph-trash"></i> ডিলিট</button>
                                                        </form>
                                                        @if ($item->status == 1)
                                                            <a class="btn btn-sm btn-success"
                                                                href="{{ route('project.change.status', $item->id) }}">
                                                                <i class="fa fa-eye"></i>
                                                            </a>
                                                        @else
                                                            <a class="btn btn-sm btn-danger"
                                                                href="{{ route('project.change.status', $item->id) }}">
                                                                <i class="fa fa-eye-slash"></i>
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
