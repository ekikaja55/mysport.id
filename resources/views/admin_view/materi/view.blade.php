@extends('template.admin.sidebar')

@section('title', 'Materi List')

@section('content')
    <link href="{{ asset('css/admin/view.css') }}" rel="stylesheet">
    <div class="container mt-4">
        <div class="card border-0 shadow">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h4 class="mb-0 text-primary fs-1 fw-bold">Materi List</h4>

                <a href="{{ route('materi.create') }}" class="btn btn-primary">
                    Add New Materi
                </a>
            </div>
            <div class="card-body">
                <p class="lead text-muted">Berikut adalah daftar materi yang tersedia:</p>

                <form method="GET" action="{{ route('materi.view') }}" class="mb-4">
                    <div class="d-flex">
                        <input type="text" name="search" class="form-control me-2" placeholder="Search by Materi Name"
                            value="{{ request()->search }}">

                        <select name="course" class="form-select me-2">
                            <option value="">Filter by Course Name</option>
                            @foreach ($courses as $course)
                                <option value="{{ $course->id_course }}"
                                    {{ request()->course == $course->id_course ? 'selected' : '' }}>
                                    {{ $course->name_course }}
                                </option>
                            @endforeach
                        </select>

                        <select name="date_sort" class="form-select me-2">
                            <option value="">Sort by Date</option>
                            <option value="latest" {{ request()->date_sort == 'latest' ? 'selected' : '' }}>Latest</option>
                            <option value="oldest" {{ request()->date_sort == 'oldest' ? 'selected' : '' }}>Oldest</option>
                        </select>
                        <button type="submit" class="btn btn-primary">Filter</button>

                        <a href="{{ route('materi.view') }}" class="btn btn-danger ms-2">Reset</a>
                    </div>
                </form>

                @if ($materi->count() > 0)
                    <table class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Materi Name</th>
                                <th>Course Name</th>
                                <th>Updated At</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($materi as $m)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $m->name_materi }}</td>
                                    <td>{{ $m->course->name_course }}</td>
                                    <td>{{ $m->updated_at }}</td>
                                    <td>
                                        <button type="button" class="btn btn-sm btn-outline-primary" data-bs-toggle="modal"
                                            data-bs-target="#descriptionModal{{ $m->id_materi }}">
                                            View Description
                                        </button>

                                        <div class="modal fade" id="descriptionModal{{ $m->id_materi }}" tabindex="-1"
                                            aria-hidden="true">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title text-primary">{{ $m->name_materi }}</h5>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                            aria-label="Close"></button>
                                                    </div>
                                                    <div class="modal-body">
                                                        {{ $m->desc_materi }}
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary"
                                                            data-bs-dismiss="modal">Close</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <a href="{{ route('materi.edit', $m->id_materi) }}"
                                            class="btn btn-sm btn-outline-primary">Edit</a>
                                        <form action="{{ route('materi.destroy', $m->id_materi) }}" method="POST"
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
                    <p class="text-muted">No materi available.</p>
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
