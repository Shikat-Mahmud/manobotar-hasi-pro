@extends('admin.layouts.master')
@section('title', 'Donation List')
@section('content')
<section class="pc-container">
    <div class="pc-content">
        <div class="row">
            <div class="col-xl-12">
                <div class="card">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <div>
                            <i class="fas fa-table me-1"></i>
                            Donation List
                        </div>
                        <div>
                            <a href="{{ route('create.donation') }}" class="btn btn-primary btn-sm">Create new donation </a>
                        </div>
                    </div>
                    <div class="card-body table-border-style">
                        <div class="table-responsive">
                            <table class="table" id="example"  style="max-width:100%;">
                                <thead>
                                    <tr>
                                        <th>Doner Name</th>
                                        <th>Photo</th>
                                        <th>Amount</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($donations as $doner)
                                    <tr>
                                        <td>{{ $doner->name }}</td>
                                        <td>
                                            @if ($doner->photo)
                                            <img src="{{ asset('storage/' . $doner->photo) }}" alt="Member photo"
                                                style="height: 50px; border-radius: 6px;">
                                            @else
                                            <img src="{{ asset('/assets/images/user/avatar-2.jpg') }}" alt="Default photo"
                                                style="height: 50px; border-radius: 6px;">
                                            @endif
                                        </td>
                                        <td>&#2547; {{ $doner->amount }}</td>
                                        <td>
                                            <div class="d-flex">
                                                <a class="btn btn-info btn-sm me-2" href="{{ route('edit.donation', $doner->id) }}">Edit</a>
                                                <form class="deleteForm" action="{{ route('destroy.donation', $doner->id) }}" method="post">
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