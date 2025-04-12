@extends('admin.layouts.master')
@section('title', 'রোল সমূহ')
@section('content')
<section class="pc-container">
    <div class="pc-content">
        <div class="row">
            <div class="col-xl-12">
                <div class="card">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <div>
                            <i class="fas fa-table me-1"></i>
                            রোল সমূহ
                        </div>
                        @if (auth()->check() && auth()->user()->hasPermissionTo('create-role'))
                        <div>
                            <a href="{{ route('admin.roles.create') }}" class="btn btn-primary btn-sm"><i class="fas fa-plus ml-2 "></i> নতুন রোল</a>
                        </div>
                        @endif
                    </div>
                    <div class="card-body table-responsive">
                        <table id="example" class="table table-striped" style="width:100%">

                            <thead>
                                <tr>
                                    <th>নাম</th>
                                    <th>একশন</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($roles as $item)
                                @if($item && $item->name !== 'super_admin')
                                <tr>
                                    <td>{{ $item->name }}</td>

                                    <td>
                                        <div class="d-flex justify-content-end">

                                            @if (auth()->check() && auth()->user()->hasPermissionTo('edit-role'))
                                            <a class="btn btn-info btn-sm me-2"
                                                href="{{ route('admin.roles.edit', $item->id) }}"><i class="ph ph-pencil"></i> এডিট</a>
                                            @endif

                                            @if (auth()->check() && auth()->user()->hasPermissionTo('delete-role'))
                                            @if (auth()->user()->hasRole('super_admin'))
                                            <form class="deleteForm"
                                                action="{{ route('admin.roles.destroy', $item->id) }}" method="post">
                                                @csrf
                                                @method('DELETE')
                                                <button type="button"
                                                    class="btn btn-danger btn-sm btnDelete"><i class="ph ph-trash"></i> ডিলিট</button>
                                            </form>
                                            @elseif ($item->name !== 'admin')
                                            <form class="deleteForm"
                                                action="{{ route('admin.roles.destroy', $item->id) }}" method="post">
                                                @csrf
                                                @method('DELETE')
                                                <button type="button"
                                                    class="btn btn-danger btn-sm btnDelete"><i class="ph ph-trash"></i> ডিলিট</button>
                                            </form>
                                            @endif
                                            @endif

                                        </div>
                                    </td>
                                </tr>
                                @endif
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

        </div>

    </div>
</section>
@endsection