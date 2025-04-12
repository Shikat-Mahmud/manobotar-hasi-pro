@extends('admin.layouts.master')
@section('title', 'উদ্যোগ সমূহ')
@push('styles')
    <style>
        .desc-box {
            max-width: 250px; overflow: hidden; text-overflow: ellipsis; white-space: nowrap;
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
                            উদ্যোগ সমূহ
                        </div>
                        <div>
                            <a href="{{ route('create.event') }}" class="btn btn-primary btn-sm"><i class="fas fa-plus ml-2 "></i> নতুন উদ্যোগ</a>
                        </div>
                    </div>
                    <div class="card-body table-border-style">
                        <div class="table-responsive">
                            <table class="table" id="example" style="max-width:100%;">
                                <thead>
                                    <tr>
                                        <th>উদ্যোগের নাম</th>
                                        {{-- <th>লোগো</th> --}}
                                        <th>ছবি</th>
                                        <th>বিস্তারিত তথ্য</th>
                                        <th>একশন</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($events as $item)
                                        <tr>
                                            <td>{{ $item->name }}</td>
                                            <td>
                                                @if ($item->image)
                                                    <img src="{{ asset('storage/' . $item->image) }}" alt="Event Image"
                                                        style="height: 50px; border-radius: 6px;">
                                                @else
                                                    <img src="https://placehold.co/400" alt="Default Image"
                                                        style="height: 50px; border-radius: 6px;">
                                                @endif
                                            </td>
                                            <td class="desc-box">{{ $item->description }}</td>
                                            <td>
                                                <div class="d-flex">
                                                    <a class="btn btn-info btn-sm me-2"
                                                        href="{{ route('edit.event', $item->id) }}"><i class="ph ph-pencil"></i> এডিট</a>
                                                    <form class="deleteForm"
                                                        action="{{ route('destroy.event', $item->id) }}" method="post">
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