@extends('admin.layouts.master')
@section('title', 'Reviews')
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
                            All Reviews
                        </div>
                    </div>
                    <div class="card-body table-border-style">
                        <div class="table-responsive">
                            <table class="table" id="example" style="max-width:100%;">
                                <thead>
                                    <tr>
                                        <th>Reviewer Name</th>
                                        <th>Reviewer Photo</th>
                                        <th>Reviewer Batch</th>
                                        <th>Message</th>
                                        <th>Show/Hide</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($reviews as $item)
                                        <tr>
                                            <td>{{ $item->name }}</td>
                                            <td>
                                                @if ($item->photo)
                                                    <img src="{{ asset('storage/' . $item->photo) }}" alt="Reviewer Image"
                                                        style="height: 50px; border-radius: 6px;">
                                                @else
                                                    <img src="https://placehold.co/400" alt="Default Image"
                                                        style="height: 50px; border-radius: 6px;">
                                                @endif
                                            </td>
                                            @if (isset($item->batch))
                                                <td>{{ $item->batch }}</td>
                                            @else
                                                <td>--</td>
                                            @endif
                                            <td class="desc-box">{{ $item->message }}</td>
                                            <td>
                                                <div class="span2">
                                                    @if($item->status==1)
                                                    <a class="btn btn-success" href="{{ url('review-status/' . $item->id) }}">
                                                    <i class="fa fa-eye"></i>
                                                    </a>
                                                    @else
                                                    <a class="btn btn-danger" href="{{ url('review-status/' . $item->id) }}">
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