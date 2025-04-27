@extends('admin.layouts.master')
@section('title', 'সদস্যের তথ্য এডিট')
@section('content')
<section class="pc-container">
    <div class="pc-content">
        <div class="row">
            <div class="col-xl-12">
                <div class="card">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <div>
                            <h4>সদস্যের তথ্য এডিট করুন</h4>
                        </div>
                        <div>
                            <a href="{{ route('member.list') }}" class="btn btn-primary btn-sm"><i class="fas fa-arrow-left mr-2 "></i> সদস্য তালিকা</a>
                        </div>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('member.update', $member->id) }}" method="post" enctype="multipart/form-data" class="mt-3">
                            @csrf
                            <div class="row mt-3">
                                <label for="name" class="col-md-4 font-lato font-semibold text-etBlack">নামঃ <span class="text-danger">*</span></label>
                                <div class="col-md-8">
                                    <input type="text" name="name" id="name" placeholder="নাম" value="{{ old('name', $member->name) }}" class="form-control" required>
                                </div>
                            </div>
                            <div class="row mt-3">
                                <label for="phone" class="col-md-4 font-lato font-semibold text-etBlack">মোবাইলঃ </label>
                                <div class="col-md-8">
                                    <input type="tel" name="phone" id="phone" placeholder="মোবাইল" value="{{ old('phone', $member->phone) }}" class="form-control">
                                </div>
                            </div>
                            <div class="row mt-3">
                                <label for="address" class="col-md-4 font-lato font-semibold text-etBlack">ঠিকানাঃ </label>
                                <div class="col-md-8">
                                    <input type="tel" name="address" id="address" placeholder="ঠিকানা" value="{{ old('address', $member->address) }}" class="form-control">
                                </div>
                            </div>
                            <div class="row mt-3">
                                <label for="blood_group" class="col-md-4 required">রক্তের গ্রুপ</label>
                                <div class="col-md-8">
                                    <select name="blood_group" id="blood_group" class="form-control">
                                        <option value="">রক্তের গ্রুপ নির্বাচন করুন</option>
                                        <option value="A+" {{ old('blood_group', $member->blood_group) == "A+" ? 'selected' : '' }}>A+</option>
                                        <option value="A-" {{ old('blood_group', $member->blood_group) == "A-" ? 'selected' : '' }}>A-</option>
                                        <option value="B+" {{ old('blood_group', $member->blood_group) == "B+" ? 'selected' : '' }}>B+</option>
                                        <option value="B-" {{ old('blood_group', $member->blood_group) == "B-" ? 'selected' : '' }}>B-</option>
                                        <option value="AB+" {{ old('blood_group', $member->blood_group) == "AB+" ? 'selected' : '' }}>AB+</option>
                                        <option value="AB-" {{ old('blood_group', $member->blood_group) == "AB-" ? 'selected' : '' }}>AB-</option>
                                        <option value="O+" {{ old('blood_group', $member->blood_group) == "O+" ? 'selected' : '' }}>O+</option>
                                        <option value="O-" {{ old('blood_group', $member->blood_group) == "O-" ? 'selected' : '' }}>O-</option>
                                    </select>
                                </div>
                            </div>
                            <div class="row mt-3">
                                <label class="col-md-4"></label>
                                <div class="col-md-8">
                                    <button type="button" class="btn btn-danger me-2" onclick="window.history.back()">বাদ দিন</button>
                                    <input type="submit" value="আপডেট" class="btn btn-success">
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
@push('scripts')
    <script>
        $(document).ready(function () {
            const batchSelect = $('#et-contact-batch');
            const guestSelect = $('#et-contact-guest');
            const amountInput = $('#et-contact-amount');

            function updateAmount() {
                const selectedBatch = parseInt(batchSelect.val(), 10);
                const guestCount = parseInt(guestSelect.val(), 10);
                let baseAmount = 500;

                if (selectedBatch <= 2024 && selectedBatch >= 1999) {
                    baseAmount = 1000;
                }

                const totalAmount = baseAmount + guestCount * 500;
                amountInput.val(totalAmount);
            }

            batchSelect.on('change', updateAmount);
            guestSelect.on('change', updateAmount);

            updateAmount();
        });
    </script>
@endpush