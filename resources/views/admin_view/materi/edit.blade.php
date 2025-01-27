@extends('template.admin.sidebar')
@section('title', 'Edit Course')
@section('content')
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
        <div class="card-header">
            <h4 class="mb-0 text-primary fs-1 fw-bold">Edit Materi</h4>
        </div>
        <form action="{{ route('materi.update', $materi->id_materi) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="mb-3">
                <label for="course_name" class="form-label">Materi Name</label>
                <input type="text" class="form-control" id="course_name" name="name_materi"
                    value="{{ old('name_materi', $materi->name_materi) }}" required>
            </div>

            <div class="mb-3">
                <label for="description" class="form-label">Description</label>
                <textarea class="form-control" id="description" name="desc_materi" rows="4" required>{{ old('desc_course', $materi->desc_materi) }}</textarea>
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

            <button type="submit" class="btn btn-primary">Update Materi</button>
            <a href="{{ route('materi.view') }}" class="btn btn-secondary">Cancel</a>
        </form>
    </div>

    <style>
        .container {
            animation: slideUp 1s ease-in-out;
        }

        @keyframes slideUp {
            from {
                opacity: 0;
                transform: translateY(100%);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

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
