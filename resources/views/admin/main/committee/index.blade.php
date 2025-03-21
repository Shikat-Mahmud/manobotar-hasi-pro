@extends('admin.layouts.master')
@section('title', 'কমিটির সদস্য তালিকা')
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
                            কমিটির সদস্য তালিকা
                        </div>
                        <div>
                            <a href="{{ route('committee.create') }}" class="btn btn-primary btn-sm"> <i class="ph ph-plus"></i>
                                নতুন সদস্য</a>
                        </div>
                    </div>
                    <div class="card-body table-border-style">
                        <div class="table-responsive">
                            <table class="table" id="example" style="max-width:100%;">
                                <thead>
                                    <tr>
                                        <th>নাম</th>
                                        <th>ছবি</th>
                                        <th>পজিশন</th>
                                        <th>মোবাইল</th>
                                        <th>ইমেইল</th>
                                        <th>রক্তের গ্রুপ</th>
                                        <th>অ্যাকশন</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($committees as $item)
                                        <tr>
                                            <td>{{ $item->name }}</td>
                                            <td>
                                                @if ($item->photo)
                                                    <img src="{{ asset('storage/' . $item->photo) }}" alt="ছবি"
                                                        style="height: 50px; border-radius: 6px;">
                                                @else
                                                    <img src="{{ asset('assets/images/user/avatar-2.jpg') }}" alt="ছবি"
                                                        style="height: 50px; border-radius: 6px;">
                                                @endif
                                            </td>
                                            <td>{{ $item->position }}</td>
                                            <td>{{ $item->phone }}</td>
                                            <td>{{ $item->email ?? '--' }}</td>
                                            <td>{{ $item->blood_group ?? '--' }}</td>
                                            <td>
                                                <div class="d-flex align-items-center">
                                                    <a class="btn btn-secondary btn-sm me-2" href="{{ route('committee.show', $item->id) }}"><i class="ph ph-eye"></i> দেখুন</a>
                                                    <a class="btn btn-info btn-sm me-2" href="{{ route('committee.edit', $item->id) }}"><i class="ph ph-pencil"></i> এডিট</a>
                                                    <form class="deleteForm"
                                                            action="{{ route('committee.destroy', $item->id) }}"
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

@push('scripts')
<script>
document.addEventListener('DOMContentLoaded', function () {
    document.querySelector('.table-responsive').addEventListener('click', function (event) {
        if (event.target.classList.contains('btnPaymentChange')) {
            swal({
                title: "Are you sure?",
                text: "Do you want to change the payment status?",
                icon: "warning",
                buttons: {
                    cancel: {
                        text: "Cancel",
                        value: null,
                        visible: true,
                        className: "btn btn-secondary",
                        closeModal: true,
                    },
                    confirm: {
                        text: "Change",
                        value: true,
                        visible: true,
                        className: "btn btn-primary",
                    }
                },
                dangerMode: true
            }).then((willChange) => {
                if (willChange) {
                    event.target.closest('.changeStatusForm').submit();
                }
            });
        }
    });
});
</script>
@endpush
