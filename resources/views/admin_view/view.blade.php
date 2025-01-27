@extends('template.admin.sidebar')

@section('title', 'Course List')

@section('content')
    <link href="{{ asset('css/admin/view.css') }}" rel="stylesheet">
    <div class="container mt-4">
        <div class="card border-0 shadow">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h4 class="mb-0 text-primary fs-1 fw-bold">Course List</h4>

                <a href="{{ route('admin.create') }}" class="btn btn-primary">
                    Add New Course
                </a>
            </div>
            <div class="card-body">
                <p class="lead text-muted">Berikut adalah daftar kursus yang tersedia:</p>

                @if ($course->count() > 0)
                    <table class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Name</th>
                                <th>Created At</th>
                                <th>Updated At</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($course as $c)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $c->name_course }}</td>
                                    <td>{{ $c->created_at }}</td>
                                    <td>{{ $c->updated_at }}</td>
                                    <td>
                                        <button type="button" class="btn btn-sm btn-outline-primary" data-bs-toggle="modal"
                                            data-bs-target="#descriptionModal{{ $c->id_course }}">
                                            View Description
                                        </button>

                                        <div class="modal fade" id="descriptionModal{{ $c->id_course }}" tabindex="-1"
                                            aria-hidden="true">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title text-primary">{{ $c->name_course }}</h5>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                            aria-label="Close"></button>
                                                    </div>
                                                    <div class="modal-body">
                                                        {{ $c->desc_course }}
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary"
                                                            data-bs-dismiss="modal">Close</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <a href="{{ route('admin.edit', $c->id_course) }}"
                                            class="btn btn-sm btn-outline-primary">Edit</a>
                                        <form action="{{ route('admin.destroy', $c->id_course) }}" method="POST"
                                            style="display:inline;">
                                            @csrf
                                            <button type="submit" class="btn btn-sm btn-outline-danger">Delete</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                @else
                    <p class="text-muted">No courses available.</p>
                @endif
            </div>
        </div>
    </div>


    @if (session('success'))
        <div class="modal fade" id="successModal" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title text-success">Success</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        {{ session('success') }}
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-success" data-bs-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>
    @endif

    <script>
        window.onload = function() {
            @if (session('success'))
                var myModal = new bootstrap.Modal(document.getElementById('successModal'));
                myModal.show();
            @endif
        };
    </script>

@endsection
