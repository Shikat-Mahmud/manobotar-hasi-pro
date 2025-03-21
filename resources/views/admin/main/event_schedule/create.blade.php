@extends('admin.layouts.master')
@section('title', 'Add Event Schedule')
@section('content')
<section class="pc-container">
    <div class="pc-content">
        <div class="row">
            <div class="col-xl-12">
                <div class="card">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <div>
                            <h4>Add Event Schedule</h4>
                        </div>
                        <div>
                            <a href="{{ route('event.schedule') }}" class="btn btn-primary btn-sm"><i
                                    class="fas fa-arrow-left mr-2 "></i> Event Schedule List</a>
                        </div>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('store.event.schedule') }}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="row mt-3">
                                <label for="event_id" class="col-md-4 required">Event Name: <span
                                        class="text-danger">*</span></label>
                                <div class="col-md-8">
                                    <select name="event_id" id="event_id" class="form-control">
                                        <option value="" disabled>Select an Event</option>
                                        @foreach ($events as $event)
                                            <option value="{{ $event->id }}"> {{ $event->name }} </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="row mt-3">
                                <label for="sl_no" class="col-md-4 required">Sl. No: <span
                                        class="text-danger">*</span></label>
                                <div class="col-md-8">
                                    <input type="number" name="sl_no" id="sl_no" class="form-control"
                                        placeholder="Sl. no"/>
                                </div>
                            </div>
                            <div class="row mt-3">
                                <label for="time" class="col-md-4 required">Time: <span
                                        class="text-danger">*</span></label>
                                <div class="col-md-8">
                                    <input type="text" name="time" id="time" class="form-control"
                                        placeholder="Scheduled time (eg: 10:00 AM - 12:00 AM)"/>
                                </div>
                            </div>
                            <div class="row mt-3">
                                <label for="description" class="col-md-4">Description</label>
                                <div class="col-md-8">
                                    <textarea name="description" id="description" class="form-control" cols="30"
                                        rows="5" placeholder="Event schedule description here."></textarea>
                                </div>
                            </div>
                            <div class="row mt-3">
                                <label for="" class="col-md-4"></label>
                                <div class="col-md-4 ">
                                    <input type="submit" value="create" class="btn btn-success">
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