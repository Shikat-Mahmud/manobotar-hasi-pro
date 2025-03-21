@extends('admin.layouts.master')
@section('title', 'Investment List')
@section('content')
<section class="pc-container">
    <div class="pc-content">
        <div class="row">
            <div class="col-xl-12">
                <div class="card">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <div>
                            <i class="fas fa-table me-1"></i>
                            Invest List
                        </div>
                        <div>
                            <a href="{{ route('create.investment') }}" class="btn btn-primary btn-sm">Add investment</a>
                        </div>
                    </div>
                    <div class="card-body table-border-style">
                        <div class="table-responsive">
                            <table class="table" id="example"  style="max-width:100%;">
                                <thead>
                                    <tr>
                                        <th>investment Sector</th>
                                        <th>Invested By Person</th>
                                        <th>Invested Amount</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($invests as $invest)
                                    <tr>
                                        <td>{{ $invest->sector }}</td>
                                        <td>{{ $invest->name }}</td>
                                        <td>&#2547; {{ $invest->amount }}</td>
                                        <td>
                                            <div class="d-flex">
                                                <a class="btn btn-info btn-sm me-2" href="{{ route('edit.investment', $invest->id) }}">Edit</a>
                                                <form class="deleteForm" action="{{ route('destroy.investment', $invest->id) }}" method="post">
                                                    @csrf
                                                    <button type="button" class="btn btn-danger btn-sm btnDelete">Delete</button>
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