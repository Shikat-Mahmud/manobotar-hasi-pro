@extends('admin.layouts.master')
@section('title', 'Event Schedule')
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
                            Schedule List
                        </div>
                        <div>
                            <a href="{{ route('create.event.schedule') }}" class="btn btn-primary btn-sm">Create new schedule </a>
                        </div>
                    </div>
                    <div class="card-body table-border-style">
                        <div class="table-responsive">
                            <table class="table" id="example" style="max-width:100%;">
                                <thead>
                                    <tr>
                                        <th>Event Name</th>
                                        <th>Sl. No</th>
                                        <th>Time</th>
                                        <th>Description</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($event_schedule as $item)
                                    <tr>
                                        <td>{{ $item->event ? $item->event->name : '' }}</td>
                                        <td>{{ $item->sl_no }}</td>
                                        <td>{{ $item->time }}</td>
                                        <td class="desc-box">{{ $item->description }}</td>
                                        <td>
                                            <div class="d-flex">
                                                <a class="btn btn-info btn-sm me-2"
                                                    href="{{ route('edit.event.schedule', $item->id) }}">Edit</a>

                                                <form class="deleteForm"
                                                    action="{{ route('destroy.event.schedule', $item->id) }}"
                                                    method="post">
                                                    @csrf
                                                    <button type="button"
                                                        class="btn btn-danger btn-sm btnDelete">Delete</button>
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