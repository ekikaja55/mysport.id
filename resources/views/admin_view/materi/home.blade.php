@extends('template.admin.sidebar')

@section('title', 'Home')

@section('content')
    <link rel="stylesheet" href="{{ asset('css/admin/home.css') }}">
    <div class="container mt-4">
        <div class="card border-0 shadow">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h4 class="mb-0 text-primary fs-1 fw-bold">Welcome to MySports.id</h4>
            </div>
            <div class="card-body">
                <p class="lead text-muted">
                    Selamat datang, Admin! Di sini Anda dapat mengelola data dan memantau aktivitas aplikasi MySports.id.
                </p>
                <div class="row">
                    <div class="col-md-6 mb-4">
                        <div class="card card-hover bg-secondary text-light border-0">
                            <div class="card-body text-center">
                                <h5 class="card-title"><i class="fas fa-database"></i> Master Data</h5>
                                <p class="card-text">Kelola data utama seperti menambah, mengedit, dan menghapus data.</p>
                                <a href="{{ route('admin.view') }}" class="btn btn-outline-light">Manage Data</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 mb-4">
                        <div class="card card-hover bg-danger text-light border-0">
                            <div class="card-body text-center">
                                <h5 class="card-title"><i class="fas fa-chart-line"></i> Analytics</h5>
                                <p class="card-text">
                                    Lihat laporan dan analisis aktivitas aplikasi secara menyeluruh.</p>
                                <a href="#" class="btn btn-outline-light">View Analytics</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
