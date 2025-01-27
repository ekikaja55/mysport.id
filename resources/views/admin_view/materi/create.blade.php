@extends('template.admin.sidebar')

@section('title', 'Add New Course')

@section('content')
    <link rel="stylesheet" href="{{ asset('css/admin/home.css') }}">
    @if ($errors->any())
        <div id="error-message" class="alert alert-danger" role="alert">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <div class="container mt-4">
        <div class="card border-0 shadow">
            <div class="card-header">
                <h4 class="mb-0 text-primary fs-1 fw-bold">Add New Materi</h4>
            </div>
            <div class="card-body">


                <form action="{{ route('materi.store') }}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label for="name_materi" class="form-label">Materi Name</label>
                        <input type="text" class="form-control" id="name_materi" name="name_materi" required>
                    </div>
                    <div class="mb-3">
                        <label for="desc_materi" class="form-label">Materi Description</label>
                        <textarea class="form-control" id="desc_materi" name="desc_materi" rows="3" required></textarea>
                    </div>
                    <div class="mb-3">
                        <label for="id_course" class="form-label">Select Course</label>
                        <select class="form-control" id="id_course" name="id_course" required>
                            <option value="" disabled selected>-- Choose a Course --</option>
                            @foreach ($courses as $course)
                                <option value="{{ $course->id_course }}">{{ $course->name_course }}</option>
                            @endforeach
                        </select>
                    </div>

                    <button type="submit" class="btn btn-primary">Save Materi</button>
                    <a href="{{ route('materi.view') }}" class="btn btn-secondary">Cancel</a>
                </form>
            </div>
        </div>
    </div>

    <style>
        #error-message {
            left: 0;
            right: 0;
            z-index: -9999;
            animation: slideInDown 0.5s ease-out forwards;
        }

        @keyframes slideInDown {
            0% {
                transform: translateY(-100%);
            }

            100% {
                transform: translateY(0);
            }
        }
    </style>
@endsection
