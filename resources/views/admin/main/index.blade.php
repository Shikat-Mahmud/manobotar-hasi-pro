@extends('admin.layouts.master')
@section('title', 'Admin Panel')
@section('content')
    <div class="pc-container">
        <div class="pc-content">

            <div class="row">
                <div class="col-md-6 col-xl-3">
                    <div class="card bg-grd-secondary order-card">
                        <div class="card-body">
                            <h6 class="text-white">Total User Registration</h6>
                            <h2 class="text-end text-white"><i
                                    class="ph ph-user-plus float-start"></i><span>{{ $totalRegistration }}</span>
                            </h2>
                            <p class="m-b-0">Payment Received<span class="float-end">{{ $totalPayment }}</span></p>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-xl-3">
                    <div class="card bg-grd-success order-card">
                        <div class="card-body">
                            <h6 class="text-white">Event Date</h6>
                            <h2 class="text-end text-white"><i class="ph ph-calendar float-start"></i><span>{{ \Carbon\Carbon::parse($event->datetime)->format('d M Y') }}</span>
                            </h2>
                            <p class="m-b-0">Start From<span class="float-end">{{ \Carbon\Carbon::parse($event->datetime)->format('g:i A') }}</span></p>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-xl-3">
                    <div class="card bg-grd-warning order-card">
                        <div class="card-body">
                            <h6 class="text-white">Total Attendees</h6>
                            <h2 class="text-end text-white"><i
                                    class="ph ph-users-three float-start"></i><span>{{ $totalAttendee }}</span></h2>
                            <!-- <p class="m-b-0">This Month<span class="float-end">$5,032</span></p> -->
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-xl-3">
                    <div class="card bg-grd-danger order-card">
                        <div class="card-body">
                            <h6 class="text-white">Total Team Members</h6>
                            <h2 class="text-end text-white"><i
                                    class="ph ph-users float-start"></i><span>{{ $totalTeamMembers }}</span></h2>
                            <!-- <p class="m-b-0">This Month<span class="float-end">$542</span></p> -->
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-xl-6 col-sm-6">
                    <div class="card statistics-card-1 bg-brand-color-1">
                        <div class="card-body">
                            <img src="{{ asset('/')}}images/widget/img-status-6.svg"
                                alt="img" class="img-fluid img-bg">
                            <h6 class="mb-0 text-white mb-3">Total Students<span class="float-end text-white h4">{{ $totalStudent }}</span></h6>
                            <h6 class="mb-0 text-white mb-3">Total Ex Students<span class="float-end text-white h4">{{ $totalExStudent }}</span></h6>
                            <h6 class="mb-0 text-white mb-3">Total Present Students<span class="float-end text-white h4">{{ $totalPresentStudent }}</span></h6>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-xl-6 col-sm-6">
                    <div class="card statistics-card-1 bg-brand-color-1">
                        <div class="card-body">
                            <img src="{{ asset('/')}}images/widget/img-status-6.svg"
                                alt="img" class="img-fluid img-bg">
                            <h6 class="mb-0 text-white mb-3">Total Teachers<span class="float-end text-white h4">{{ $totalTeachers }}</span></h6>
                            <h6 class="mb-0 text-white mb-3">Total Staffs<span class="float-end text-white h4">{{ $totalStaffs }}</span></h6>
                            <h6 class="mb-0 text-white mb-3">Total Guests<span class="float-end text-white h4">{{ $totalGuest }}</span></h6>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-xl-3 col-sm-6">
                    <div class="card statistics-card-1 bg-brand-color-1">
                        <div class="card-body">
                            <img src="{{ asset('/')}}images/widget/img-status-6.svg"
                                alt="img" class="img-fluid img-bg">
                            <div class="d-flex align-items-center justify-content-between mb-3 drp-div">
                                <h6 class="mb-0 text-white">Amount Received From Registration</h6>
                            </div>
                            <div class="d-flex align-items-center mt-3">
                                <h3 class="text-white f-w-300 d-flex align-items-center m-b-0">&#2547; {{ $totalRegAmount }}</h3>
                            </div>
                            <h6 class="mt-3 text-white mb-3">Ex Students<span class="float-end text-white">{{ $totalRegAmountExStd }}</span></h6>
                            <h6 class="text-white mb-3">Present Students<span class="float-end text-white">{{ $totalRegAmountCurStd }}</span></h6>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-xl-3 col-sm-6">
                    <div class="card statistics-card-1 bg-brand-color-1">
                        <div class="card-body">
                            <img src="{{ asset('/')}}images/widget/img-status-6.svg"
                                alt="img" class="img-fluid img-bg">
                            <div class="d-flex align-items-center justify-content-between mb-3 drp-div">
                                <h6 class="mb-0 text-white">Amount Received From Donation</h6>
                            </div>
                            <div class="d-flex align-items-center mt-3">
                                <h3 class="text-white f-w-300 d-flex align-items-center m-b-0">&#2547; {{ $totalDonAmount }}</h3>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-xl-3 col-sm-6">
                    <div class="card statistics-card-1 bg-brand-color-1">
                        <div class="card-body">
                            <img src="{{ asset('/')}}images/widget/img-status-6.svg"
                                alt="img" class="img-fluid img-bg">
                            <div class="d-flex align-items-center justify-content-between mb-3 drp-div">
                                <h6 class="mb-0 text-white">Amount Received From Sponsor</h6>
                            </div>
                            <div class="d-flex align-items-center mt-3">
                                <h3 class="text-white f-w-300 d-flex align-items-center m-b-0">&#2547; {{ $totalSponAmount }}</h3>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-xl-3 col-sm-6">
                    <div class="card statistics-card-1" style="background-color: #008375;">
                        <div class="card-body">
                            <img src="{{ asset('/')}}images/widget/img-status-6.svg"
                                alt="img" class="img-fluid img-bg">
                            <div class="d-flex align-items-center justify-content-between mb-3 drp-div">
                                <h6 class="mb-0 text-white">Total Amount Received</h6>
                            </div>
                            <h2 class="text-end text-white"><i
                                    class="ph ph-money float-start"></i><span>&#2547; {{ $totalAmountReceived }}</span>
                            </h2>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-xl-3 col-sm-6">
                    <div class="card statistics-card-1" style="background-color: #ff4261;">
                        <div class="card-body">
                            <img src="{{ asset('/')}}images/widget/img-status-6.svg"
                                alt="img" class="img-fluid img-bg">
                            <div class="d-flex align-items-center justify-content-between mb-3 drp-div">
                                <h6 class="mb-0 text-white">Total Investment</h6>
                            </div>
                            <h2 class="text-end text-white"><i
                                    class="ph ph-coins float-start"></i><span>&#2547; {{ $totalInvestment }}</span>
                            </h2>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-xl-3 col-sm-6">
                    <div class="card statistics-card-1 bg-warning">
                        <div class="card-body">
                            <img src="{{ asset('/')}}images/widget/img-status-6.svg"
                                alt="img" class="img-fluid img-bg">
                            <div class="d-flex align-items-center justify-content-between mb-3 drp-div">
                                <h6 class="mb-0 text-white">Total Cash In Hand</h6>
                            </div>
                            <h2 class="text-end text-white"><i
                                    class="ph ph-coins float-start"></i><span>&#2547; {{ $totalInHand }}</span>
                            </h2>
                        </div>
                    </div>
                </div>

                <div class="col-md-6 col-xl-3 col-sm-6">
                    <div class="card statistics-card-1" style="background-color: #65467a;">
                        <div class="card-body">
                            <img src="{{ asset('/')}}images/widget/img-status-6.svg"
                                alt="img" class="img-fluid img-bg">
                            <div class="d-flex align-items-center">
                                <h4 class="text-white f-w-300 d-flex align-items-center">Paid Registrations</h4>
                            </div>
                            <h6 class="mt-3 text-white mb-3">Ex Students<span class="float-end text-white">{{ $totalPaidExStd }}</span></h6>
                            <h6 class="text-white mb-3">Present Students<span class="float-end text-white">{{ $totalPaidPreStd }}</span></h6>
                            <h6 class="text-white mb-3">Teachers<span class="float-end text-white">{{ $totalPaidTchr }}</span></h6>
                            <h6 class="text-white mb-3">Staffs<span class="float-end text-white">{{ $totalPaidStf }}</span></h6>
                            <h6 class="text-white mb-3">Guests<span class="float-end text-white">{{ $totalPaidGst }}</span></h6>
                        </div>
                    </div>
                </div>

                <div class="col-sm-12">
                    <div class="card table-card">
                        <div class="card-header">
                            <h5>Recent Student Registration</h5>
                        </div>
                        <div class="card-body p-0">
                            <div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>Student Name</th>
                                        <th>Photo</th>
                                        <th>Payment Status</th>
                                        <th>Guests</th>
                                        <th>Amount</th>
                                        <th>Phone</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($registrations as $item)
                                        <tr>
                                            <td>{{ $item->name }}</td>
                                            <td>
                                                @if ($item->photo)
                                                    <img src="{{ asset('storage/' . $item->photo) }}" alt="Reviewer Image"
                                                        style="height: 50px; border-radius: 6px;">
                                                @else
                                                    <img src="{{ asset('/assets/images/user/avatar-2.jpg') }}" alt="Default Image"
                                                        style="height: 50px; border-radius: 6px;">
                                                @endif
                                            </td>
                                            <td>
                                                @if ($item->status == '1')
                                                    <span class="badge bg-success">Paid</span>
                                                @elseif($item->status == '0')
                                                    <span class="badge bg-danger">Unpaid</span>
                                                @endif
                                            </td>
                                            <td>{{ $item->guest }}</td>
                                            <td>&#2547; {{ $item->amount }}</td>
                                            <td>{{ $item->phone }}</td>
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
