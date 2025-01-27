<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    <link href="{{ asset('css/admin/sidebar.css') }}" rel="stylesheet">
</head>

<body>
    <div class="d-flex" id="wrapper">
        <div class="bg-dark text-white" id="sidebar-wrapper">
            <div class="text-center py-4">
                <div class="sidebar-heading mb-3">MySports.id</div>
                <img src="https://static-00.iconduck.com/assets.00/profile-default-icon-2048x2045-u3j7s5nj.png"
                    alt="Profile" class="rounded-circle mb-2" style="width: 80px; height: 80px;">
                <p class="mb-0">Admin</p>
                <hr class="text-white">
            </div>
            <div class="list-group list-group-flush">

                <a href="{{ route('admin.home') }}" class="list-group-item list-group-item-action bg-dark text-white">
                    <i class="fas fa-home"></i> Home
                </a>
                <a href="#masterDataCourseMenu" class="list-group-item list-group-item-action bg-dark text-white"
                    data-bs-toggle="collapse">
                    <i class="fas fa-database"></i> Master Data Course
                </a>
                <div class="collapse" id="masterDataCourseMenu">
                    <a href="{{ route('admin.view') }}"
                        class="list-group-item list-group-item-action bg-dark text-white ps-5">
                        <i class="fas fa-eye"></i> View Data
                    </a>
                    <a href="{{ route('admin.create') }}"
                        class="list-group-item list-group-item-action bg-dark text-white ps-5">
                        <i class="fas fa-plus-circle"></i> Add Data
                    </a>
                </div>

                <a href="#masterDataMateriMenu" class="list-group-item list-group-item-action bg-dark text-white"
                    data-bs-toggle="collapse">
                    <i class="fas fa-database"></i> Master Data Materi
                </a>
                <div class="collapse" id="masterDataMateriMenu">
                    <a href="{{ route('materi.view') }}"
                        class="list-group-item list-group-item-action bg-dark text-white ps-5">
                        <i class="fas fa-eye"></i> View Data
                    </a>
                    <a href="{{ route('materi.create') }}"
                        class="list-group-item list-group-item-action bg-dark text-white ps-5">
                        <i class="fas fa-plus-circle"></i> Add Data
                    </a>
                </div>

                <a href="#" id="back-button" class="list-group-item list-group-item-action bg-dark text-white">
                    <i class="fas fa-arrow-left"></i> Back
                </a>
            </div>
        </div>

        <div id="page-content-wrapper">
            <nav class="navbar navbar-expand-lg navbar-light bg-light border-bottom">
                <div class="container-fluid">
                    <button class="btn btn-dark" id="menu-toggle">
                        <i class="fas fa-bars"></i>
                    </button>
                </div>
            </nav>

            <div class="container-fluid py-4">
                @yield('content')
            </div>
        </div>

    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/js/all.min.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            document.getElementById('wrapper').classList.remove('toggled');
        });
        const toggleButton = document.getElementById('menu-toggle');
        const backButton = document.getElementById('back-button');
        const wrapper = document.getElementById('wrapper');
        toggleButton.addEventListener('click', () => {
            wrapper.classList.toggle('toggled');
        });
        backButton.addEventListener('click', () => {
            wrapper.classList.remove('toggled');
        });
    </script>
</body>

</html>
