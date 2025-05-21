@extends('admin.layouts.master')
@section('title', 'এডমিন ড্যাশবোর্ড')
@section('content')
    <div class="pc-container">
        <div class="pc-content">

            <div class="row">
                <div class="col-md-6 col-xl-3">
                    <div class="card bg-grd-success order-card">
                        <div class="card-body">
                            <h2 class="text-white">মোট প্রজেক্ট</h2>
                            <h2 class="text-end text-white"><i
                                    class="ph ph-kanban float-start"></i><span>{{ $totalProject }}</span>
                            </h2>
                            {{-- <p class="m-b-0">Payment Received<span class="float-end">{{ $totalProject }}</span></p> --}}
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-xl-3">
                    <div class="card bg-grd-danger order-card">
                        <div class="card-body">
                            <h2 class="text-white">মোট রক্তদাতা</h2>
                            <h2 class="text-end text-white"><i
                                    class="ph ph-drop float-start"></i><span>{{ $totalBloodDoner }}</span>
                            </h2>
                            {{-- <p class="m-b-0">Start From<span class="float-end">24</span></p> --}}
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-xl-3">
                    <div class="card bg-grd-warning order-card">
                        <div class="card-body">
                            <h2 class="text-white">মোট সদস্য</h2>
                            <h2 class="text-end text-white"><i
                                    class="ph ph-users-three float-start"></i><span>{{ $totalCommittee }}</span></h2>
                            <!-- <p class="m-b-0">This Month<span class="float-end">$5,032</span></p> -->
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-xl-3">
                    <div class="card bg-grd-secondary order-card">
                        <div class="card-body">
                            <h2 class="text-white">মোট উপদেষ্টা</h2>
                            <h2 class="text-end text-white"><i
                                    class="ph ph-users float-start"></i><span>{{ $totalAdviser }}</span></h2>
                            <!-- <p class="m-b-0">This Month<span class="float-end">$542</span></p> -->
                        </div>
                    </div>
                </div>

                <div class="col-md-6 col-xl-3 col-sm-6">
                    <div class="card statistics-card-1 bg-brand-color-1">
                        <div class="card-body">
                            <img src="{{ asset('images/widget/img-status-6.svg') }}" alt="img"
                                class="img-fluid img-bg">
                            <h5 class="mt-3 text-white mb-3">ডোনেশন থেকে পাওয়া<span
                                    class="float-end text-white">&#2547;{{ $totalDonAmount }}</span></h5>
                            <h5 class="text-white">স্পন্সর থেকে পাওয়া<span
                                    class="float-end text-white">&#2547;{{ $totalSponAmount }}</span></h5>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-xl-3 col-sm-6">
                    <div class="card statistics-card-1" style="background-color: #008375;">
                        <div class="card-body">
                            <img src="{{ asset('images/widget/img-status-6.svg') }}" alt="img"
                                class="img-fluid img-bg">
                            <div class="d-flex align-items-center justify-content-between mb-3 drp-div">
                                <h4 class="mb-0 text-white">মোট কালেকশন</h4>
                            </div>
                            <h2 class="text-end text-white"><i
                                    class="ph ph-money float-start"></i><span>&#2547;{{ $totalAmountReceived }}</span>
                            </h2>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-xl-3 col-sm-6">
                    <div class="card statistics-card-1" style="background-color: #ff4261;">
                        <div class="card-body">
                            <img src="{{ asset('images/widget/img-status-6.svg') }}" alt="img"
                                class="img-fluid img-bg">
                            <div class="d-flex align-items-center justify-content-between mb-3 drp-div">
                                <h4 class="mb-0 text-white">মোট খরচ</h4>
                            </div>
                            <h2 class="text-end text-white"><i
                                    class="ph ph-coins float-start"></i><span>&#2547;{{ $totalInvestment }}</span>
                            </h2>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-xl-3 col-sm-6">
                    <div class="card statistics-card-1" style="background-color: #65467a;">
                        <div class="card-body">
                            <img src="{{ asset('images/widget/img-status-6.svg') }}" alt="img"
                                class="img-fluid img-bg">
                            <div class="d-flex align-items-center justify-content-between mb-3 drp-div">
                                <h4 class="mb-0 text-white">মোট জমা টাকা</h4>
                            </div>
                            <h2 class="text-end text-white"><i
                                    class="ph ph-money float-start"></i><span>&#2547;{{ $totalInHand }}</span>
                            </h2>
                        </div>
                    </div>
                </div>

                <div class="col-sm-12">
                    <div class="card table-card">
                        <div class="card-header">
                            <h5>সর্বশেষ রক্তদাতা রেজিস্ট্রেশন</h5>
                        </div>
                        <div class="card-body p-0">
                            <div class="table-responsive">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th>রক্তদাতার নাম</th>
                                            <th>ছবি</th>
                                            <th>রক্তের গ্রুপ</th>
                                            <th>মোবাইল নম্বর</th>
                                            <th>ঠিকানা</th>
                                            <th>স্ট্যাটাস</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($latestBloodDoner as $member)
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
                                                <td><i class="ph ph-drop" style="color: #E60000"></i>
                                                    {{ $member->blood_group }}</td>
                                                <td><a href="tel:{{ $member->phone }}">{{ $member->phone }}</a></td>
                                                <td>{{ $member->address }}</td>
                                                <td>
                                                    @if ($member->status === 1)
                                                        <span class="badge bg-success">প্রস্তুত</span>
                                                    @elseif($member->status === 0)
                                                        @php
                                                            $donatedDate = \Carbon\Carbon::parse($member->donated_at);
                                                            $daysPassed = $donatedDate->diffInDays(now());
                                                            $daysLeft = max(90 - $daysPassed, 0);

                                                            $bnDigits = [
                                                                '০',
                                                                '১',
                                                                '২',
                                                                '৩',
                                                                '৪',
                                                                '৫',
                                                                '৬',
                                                                '৭',
                                                                '৮',
                                                                '৯',
                                                            ];
                                                            $daysLeftBn = collect(str_split($daysLeft))
                                                                ->map(function ($digit) use ($bnDigits) {
                                                                    return is_numeric($digit)
                                                                        ? $bnDigits[$digit]
                                                                        : $digit;
                                                                })
                                                                ->implode('');
                                                        @endphp

                                                        <span class="badge bg-danger">
                                                            {{ $daysLeftBn }} দিন বাকি
                                                        </span>
                                                    @endif
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
    </div>
@endsection
