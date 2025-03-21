@extends('admin.layouts.master')
@section('title', 'Edit Event')
@section('content')
<section class="pc-container">
    <div class="pc-content">
        <div class="row">
            <div class="col-xl-12">
                <div class="card">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <div>
                            <h4>Edit Event</h4>

                        </div>
                        <div>
                            <a href="{{ route('events') }}" class="btn btn-primary btn-sm"><i
                                    class="fas fa-arrow-left mr-2 "></i> Event List</a>
                        </div>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('update.event', $event->id) }}" method="post"
                            enctype="multipart/form-data">
                            @csrf
                            <div class="row mt-3">
                                <label for="event-name" class="col-md-4">Event Name: <span
                                        class="text-danger">*</span></label>
                                <div class="col-md-8">
                                    <input type="text" id="event-name" name="name"
                                        value="{{ old('name', $event->name) }}" class="form-control"
                                        placeholder="Event name" required />
                                </div>
                            </div>
                            <div class="row mt-3">
                                <label for="event-datetime" class="col-md-4">Date and Time: <span
                                        class="text-danger">*</span></label>
                                <div class="col-md-8">
                                    <input type="datetime-local" id="event-datetime" name="datetime"
                                        value="{{ old('datetime', \Carbon\Carbon::parse($event->datetime)->format('Y-m-d\TH:i')) }}"
                                        class="form-control" required />
                                </div>
                            </div>
                            <div class="row mt-3">
                                <label for="event-location" class="col-md-4">Event Location: </label>
                                <div class="col-md-8">
                                    <input type="text" id="event-location" name="location"
                                        value="{{ old('location', $event->location) }}" class="form-control"
                                        placeholder="Event location" />
                                </div>
                            </div>
                            <div class="row mt-3">
                                <label for="event-image" class="col-md-4">Event Image: </label>
                                <div class="col-md-8">
                                    <input type="file" id="event-image" name="image" class="form-control" />
                                    @if($event->image)
                                        <img class="p-t-10" src="{{ asset('storage/' . $event->image) }}" alt="{{ $event->name }}"
                                            width="100" />
                                    @endif
                                </div>
                            </div>
                            <div class="row mt-3">
                                <label for="event-description" class="col-md-4">Description: </label>
                                <div class="col-md-8">
                                    <textarea name="description" id="event-description" class="form-control" cols="30" rows="10" 
                                        placeholder="Event description here.">{{ old('description', $event->description) }}</textarea>
                                </div>
                            </div>
                            <div class="row mt-3">
                                <label class="col-md-4"></label>
                                <div class="col-md-4">
                                    <input type="submit" value="Update" class="btn btn-success">
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