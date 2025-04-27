@extends('admin.layouts.master')
@section('title', 'সদস্য তালিকা')
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
@php
    $englishNum = [0, 1, 2, 3, 4, 5, 6, 7, 8, 9];
    $banglaNum = ['০', '১', '২', '৩', '৪', '৫', '৬', '৭', '৮', '৯'];
@endphp
@section('content')
    <section class="pc-container">
        <div class="pc-content">
            <div class="row">
                <div class="col-xl-12">
                    <div class="card">
                        <div class="card-header d-flex justify-content-between align-items-center">
                            <div>
                                <i class="fas fa-table me-1"></i>
                                সদস্য তালিকা
                            </div>
                            <div>
                                <a href="{{ route('member.create') }}" class="btn btn-primary btn-sm"> <i
                                        class="ph ph-plus"></i>
                                    নতুন সদস্য</a>
                            </div>
                        </div>
                        <div class="card-body table-border-style">
                            <div class="table-responsive">
                                <table class="table" id="example" style="max-width:100%;">
                                    <thead>
                                        <tr>
                                            <th>ক্রমিক</th>
                                            <th>নাম</th>
                                            <th>মোবাইল</th>
                                            <th>ঠিকানা</th>
                                            <th>রক্তের গ্রুপ</th>
                                            <th>অ্যাকশন</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($members as $item)
                                            <tr>
                                                <td>{{ str_replace($englishNum, $banglaNum, $item->id) }}</td>
                                                <td>{{ $item->name }}</td>
                                                <td>
                                                    <a href="tel:{{ $item->phone }}">{{ $item->phone }}</a>
                                                </td>
                                                <td>{{ $item->address ?? '--' }}</td>
                                                <td>{{ $item->blood_group ?? '--' }}</td>
                                                <td>
                                                    <div class="d-flex align-items-center">
                                                        <a class="btn btn-info btn-sm me-2"
                                                            href="{{ route('member.edit', $item->id) }}"><i
                                                                class="ph ph-pencil"></i> এডিট</a>
                                                        <form class="deleteForm"
                                                            action="{{ route('member.destroy', $item->id) }}"
                                                            method="post">
                                                            @csrf
                                                            <button type="button"
                                                                class="btn btn-danger btn-sm btnDelete"><i
                                                                    class="ph ph-trash"></i> ডিলিট</button>
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
        document.addEventListener('DOMContentLoaded', function() {
            document.querySelector('.table-responsive').addEventListener('click', function(event) {
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
