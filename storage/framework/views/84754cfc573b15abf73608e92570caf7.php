<?php $__env->startSection('title', 'Materi List'); ?>

<?php $__env->startSection('content'); ?>
    <link href="<?php echo e(asset('css/admin/view.css')); ?>" rel="stylesheet">
    <div class="container mt-4">
        <div class="card border-0 shadow">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h4 class="mb-0 text-primary fs-1 fw-bold">Materi List</h4>

                <a href="<?php echo e(route('materi.create')); ?>" class="btn btn-primary">
                    Add New Materi
                </a>
            </div>
            <div class="card-body">
                <p class="lead text-muted">Berikut adalah daftar materi yang tersedia:</p>

                <form method="GET" action="<?php echo e(route('materi.view')); ?>" class="mb-4">
                    <div class="d-flex">
                        <input type="text" name="search" class="form-control me-2" placeholder="Search by Materi Name"
                            value="<?php echo e(request()->search); ?>">

                        <select name="course" class="form-select me-2">
                            <option value="">Filter by Course Name</option>
                            <?php $__currentLoopData = $courses; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $course): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <option value="<?php echo e($course->id_course); ?>"
                                    <?php echo e(request()->course == $course->id_course ? 'selected' : ''); ?>>
                                    <?php echo e($course->name_course); ?>

                                </option>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </select>

                        <select name="date_sort" class="form-select me-2">
                            <option value="">Sort by Date</option>
                            <option value="latest" <?php echo e(request()->date_sort == 'latest' ? 'selected' : ''); ?>>Latest</option>
                            <option value="oldest" <?php echo e(request()->date_sort == 'oldest' ? 'selected' : ''); ?>>Oldest</option>
                        </select>
                        <button type="submit" class="btn btn-primary">Filter</button>

                        <a href="<?php echo e(route('materi.view')); ?>" class="btn btn-danger ms-2">Reset</a>
                    </div>
                </form>

                <?php if($materi->count() > 0): ?>
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
                            <?php $__currentLoopData = $materi; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $m): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr>
                                    <td><?php echo e($loop->iteration); ?></td>
                                    <td><?php echo e($m->name_materi); ?></td>
                                    <td><?php echo e($m->course->name_course); ?></td>
                                    <td><?php echo e($m->updated_at); ?></td>
                                    <td>
                                        <button type="button" class="btn btn-sm btn-outline-primary" data-bs-toggle="modal"
                                            data-bs-target="#descriptionModal<?php echo e($m->id_materi); ?>">
                                            View Description
                                        </button>

                                        <div class="modal fade" id="descriptionModal<?php echo e($m->id_materi); ?>" tabindex="-1"
                                            aria-hidden="true">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title text-primary"><?php echo e($m->name_materi); ?></h5>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                            aria-label="Close"></button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <?php echo e($m->desc_materi); ?>

                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary"
                                                            data-bs-dismiss="modal">Close</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <a href="<?php echo e(route('materi.edit', $m->id_materi)); ?>"
                                            class="btn btn-sm btn-outline-primary">Edit</a>
                                        <form action="<?php echo e(route('materi.destroy', $m->id_materi)); ?>" method="POST"
                                            style="display:inline;">
                                            <?php echo csrf_field(); ?>
                                            <button type="submit" class="btn btn-sm btn-outline-danger">Delete</button>
                                        </form>
                                    </td>
                                </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </tbody>
                    </table>
                <?php else: ?>
                    <p class="text-muted">No materi available.</p>
                <?php endif; ?>
            </div>
        </div>
    </div>

    <?php if(session('success')): ?>
        <div class="modal fade" id="successModal" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title text-success">Success</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <?php echo e(session('success')); ?>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-success" data-bs-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>
    <?php endif; ?>

    <script>
        window.onload = function() {
            <?php if(session('success')): ?>
                var myModal = new bootstrap.Modal(document.getElementById('successModal'));
                myModal.show();
            <?php endif; ?>
        };
    </script>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('template.admin.sidebar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\LARAVEL\jobsheet_week11_rizkiarkant\resources\views/admin_view/materi/view.blade.php ENDPATH**/ ?>