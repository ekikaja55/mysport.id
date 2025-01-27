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
            <h4 class="mb-0 text-primary fs-1 fw-bold">Edit Course</h4>
        </div>
        <form action="{{ route('admin.update', $course->id_course) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="mb-3">
                <label for="course_name" class="form-label">Course Name</label>
                <input type="text" class="form-control" id="course_name" name="name_course"
                    value="{{ old('name_course', $course->name_course) }}" required>
            </div>

            <div class="mb-3">
                <label for="description" class="form-label">Description</label>
                <textarea class="form-control" id="description" name="desc_course" rows="4" required>{{ old('desc_course', $course->desc_course) }}</textarea>
            </div>

            <button type="submit" class="btn btn-primary">Update Course</button>
            <a href="{{ route('admin.view') }}" class="btn btn-secondary">Cancel</a>
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
